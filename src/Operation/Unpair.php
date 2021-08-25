<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\collection\Operation;

use Generator;
use Iterator;
use loophp\collection\Contract\Operation;

/**
 * @immutable
 *
 * @template TKey
 * @template T
 */
final class Unpair implements Operation
{
    /**
     * @pure
     *
     * @param Iterator<TKey, T> $iterator
     *
     * @return Generator<int, (TKey|T)>
     */
    public function __invoke(Iterator $iterator): Generator
    {
        foreach ($iterator as $key => $value) {
            yield $key;

            yield $value;
        }
    }
}
