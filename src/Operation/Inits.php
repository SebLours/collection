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

/**
 * @immutable
 *
 * @template TKey
 * @template T
 */
final class Inits implements Operation
{
    /**
     * @pure
     *
     * @return Closure(Iterator<TKey, T>): Generator<int, list<T>>
     */
    public function __invoke(): Closure
    {
        $scanLeftCallback =
            /**
             * @param array<TKey, T> $carry
             * @param T $value
             * @param TKey $key
             *
             * @return array<TKey, T>
             */
            static function (array $carry, $value, $key): array {
                // TODO: Use Pack ?
                $carry[$key] = $value;

                return $carry;
            };

        $inits = (new Pipe())(
            (new ScanLeft())($scanLeftCallback)([]),
            (new Normalize())
        );

        // Point free style.
        return $inits;
    }
}
