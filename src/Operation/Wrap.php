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

/**
 * @immutable
 *
 * @template TKey
 * @template T
 */
final class Wrap
{
    /**
     * @pure
     *
     * @return Closure(Iterator<TKey, T>): Generator<int, array<TKey, T>>
     */
    public function __invoke(): Closure
    {
        $mapCallback =
            /**
             * @param T $value
             * @param TKey $key
             *
             * @return array<TKey, T>
             */
            static fn ($value, $key): array => [$key => $value];

        /** @var Closure(Iterator<TKey, T>): Generator<int, array<TKey, T>> $pipe */
        $pipe = (new Pipe())()(
            (new Map())()($mapCallback),
            (new Normalize())()
        );

        // Point free style.
        return $pipe;
    }
}
