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
final class Inits
{
    /**
     * @pure
     *
     * @return Closure(Iterator<TKey, T>): Generator<int, list<array{0: TKey, 1: T}>>
     */
    public function __invoke(): Closure
    {
        $scanLeftCallback =
            /**
             * @param list<array{0: TKey, 1: T}> $carry
             * @param array{0: TKey, 1: T} $value
             *
             * @return list<array{0: TKey, 1: T}>
             */
            static function (array $carry, array $value): array {
                $carry[] = $value;

                return $carry;
            };

        /** @var Closure(Iterator<TKey, T>): Generator<int, list<array{0: TKey, 1: T}>> $inits */
        $inits = (new Pipe())()(
            (new Pack())(),
            (new ScanLeft())()($scanLeftCallback)([]),
            (new Normalize())()
        );

        // Point free style.
        return $inits;
    }
}
