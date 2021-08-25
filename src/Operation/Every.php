<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\collection\Operation;

use Closure;
use Generator;
use Iterator;
use loophp\collection\Contract\Operation;
use loophp\collection\Utils\CallbacksArrayReducer;

/**
 * @immutable
 *
 * @template TKey
 * @template T
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Every implements Operation
{
    /**
     * @pure
     *
     * @param callable(T=, TKey=, Iterator<TKey, T>=): bool ...$matchers
     *
     * @return Closure(callable(T, TKey, Iterator<TKey, T>...): bool): Closure(Iterator<TKey, T>): Generator<TKey, bool>
     */
    public function __invoke(callable ...$matchers): Closure
    {
        return
            /**
             * @param callable(T=, TKey=, Iterator<TKey, T>=): bool ...$callbacks
             *
             * @return Closure(Iterator<TKey, T>): Generator<TKey, bool>
             */
            static function (callable ...$callbacks) use ($matchers): Closure {
                $callbackReducer =
                    /**
                     * @param list<callable(T=, TKey=, Iterator<TKey, T>=): bool> $callbacks
                     *
                     * @return Closure(T, TKey, Iterator<TKey, T>): bool
                     */
                    static fn (array $callbacks): Closure =>
                        /**
                         * @param T $current
                         * @param TKey $key
                         * @param Iterator<TKey, T> $iterator
                         */
                        static fn ($current, $key, Iterator $iterator): bool => CallbacksArrayReducer::or()($callbacks, $current, $key, $iterator);

                $mapCallback =
                    /**
                     * @param callable(T=, TKey=, Iterator<TKey, T>=): mixed $reducer1
                     *
                     * @return Closure(callable(T=, TKey=, Iterator<TKey, T>=)): Closure(T, TKey, Iterator<TKey, T>): bool
                     */
                    static fn (callable $reducer1): Closure =>
                        /**
                         * @param callable(T=, TKey=, Iterator<TKey, T>=): mixed $reducer2
                         *
                         * @return Closure(T, TKey, Iterator<TKey, T>): bool
                         */
                        static fn (callable $reducer2): Closure =>
                            /**
                             * @param T $value
                             * @param TKey $key
                             * @param Iterator<TKey, T> $iterator
                             */
                            static fn ($value, $key, Iterator $iterator): bool => $reducer1($value, $key, $iterator) !== $reducer2($value, $key, $iterator);

                $pipe = (new Pipe())(
                    (new Map())($mapCallback($callbackReducer($callbacks))($callbackReducer($matchers))),
                    (new DropWhile())(static fn (bool $value): bool => true === $value),
                    (new Append())(true),
                    (new Head()),
                );

                // Point free style.
                return $pipe;
            };
    }
}
