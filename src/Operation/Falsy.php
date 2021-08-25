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
final class Falsy implements Operation
{
    /**
     * @pure
     *
     * @return Closure(Iterator<TKey, T>): Generator<int, bool>
     */
    public function __invoke(): Closure
    {
        $matchWhenNot = static fn (): bool => true;
        $matcher =
            /**
             * @param T $value
             */
            static fn ($value): bool => (bool) $value;

        // Point free style.
        return (new Pipe())(
            (new MatchOne())($matchWhenNot)($matcher),
            (new Map())(
                /**
                 * @param T $value
                 */
                static fn ($value): bool => !(bool) $value
            ),
        );
    }
}
