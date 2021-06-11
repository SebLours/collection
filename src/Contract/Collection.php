<?php

declare(strict_types=1);

namespace loophp\collection\Contract;

use IteratorAggregate;
use JsonSerializable;
use loophp\collection\Contract\Operation\Allable;
use loophp\collection\Contract\Operation\Appendable;
use loophp\collection\Contract\Operation\Applyable;
use loophp\collection\Contract\Operation\Associateable;
use loophp\collection\Contract\Operation\Cacheable;
use loophp\collection\Contract\Operation\Chunkable;
use loophp\collection\Contract\Operation\Collapseable;
use loophp\collection\Contract\Operation\Columnable;
use loophp\collection\Contract\Operation\Combinateable;
use loophp\collection\Contract\Operation\Combineable;
use loophp\collection\Contract\Operation\Compactable;
use loophp\collection\Contract\Operation\Containsable;
use loophp\collection\Contract\Operation\Currentable;
use loophp\collection\Contract\Operation\Cycleable;
use loophp\collection\Contract\Operation\Diffable;
use loophp\collection\Contract\Operation\Diffkeysable;
use loophp\collection\Contract\Operation\Distinctable;
use loophp\collection\Contract\Operation\Dropable;
use loophp\collection\Contract\Operation\DropWhileable;
use loophp\collection\Contract\Operation\Duplicateable;
use loophp\collection\Contract\Operation\Everyable;
use loophp\collection\Contract\Operation\Explodeable;
use loophp\collection\Contract\Operation\Falsyable;
use loophp\collection\Contract\Operation\Filterable;
use loophp\collection\Contract\Operation\Firstable;
use loophp\collection\Contract\Operation\Flattenable;
use loophp\collection\Contract\Operation\Flipable;
use loophp\collection\Contract\Operation\FoldLeft1able;
use loophp\collection\Contract\Operation\FoldLeftable;
use loophp\collection\Contract\Operation\FoldRight1able;
use loophp\collection\Contract\Operation\FoldRightable;
use loophp\collection\Contract\Operation\Forgetable;
use loophp\collection\Contract\Operation\Frequencyable;
use loophp\collection\Contract\Operation\Getable;
use loophp\collection\Contract\Operation\Groupable;
use loophp\collection\Contract\Operation\GroupByable;
use loophp\collection\Contract\Operation\Hasable;
use loophp\collection\Contract\Operation\Headable;
use loophp\collection\Contract\Operation\IfThenElseable;
use loophp\collection\Contract\Operation\Implodeable;
use loophp\collection\Contract\Operation\Initable;
use loophp\collection\Contract\Operation\Initsable;
use loophp\collection\Contract\Operation\Intersectable;
use loophp\collection\Contract\Operation\Intersectkeysable;
use loophp\collection\Contract\Operation\Intersperseable;
use loophp\collection\Contract\Operation\Keyable;
use loophp\collection\Contract\Operation\Keysable;
use loophp\collection\Contract\Operation\Lastable;
use loophp\collection\Contract\Operation\Limitable;
use loophp\collection\Contract\Operation\Linesable;
use loophp\collection\Contract\Operation\Mapable;
use loophp\collection\Contract\Operation\Mergeable;
use loophp\collection\Contract\Operation\Normalizeable;
use loophp\collection\Contract\Operation\Nthable;
use loophp\collection\Contract\Operation\Nullsyable;
use loophp\collection\Contract\Operation\Packable;
use loophp\collection\Contract\Operation\Padable;
use loophp\collection\Contract\Operation\Pairable;
use loophp\collection\Contract\Operation\Permutateable;
use loophp\collection\Contract\Operation\Pipeable;
use loophp\collection\Contract\Operation\Pluckable;
use loophp\collection\Contract\Operation\Prependable;
use loophp\collection\Contract\Operation\Productable;
use loophp\collection\Contract\Operation\Randomable;
use loophp\collection\Contract\Operation\Rangeable;
use loophp\collection\Contract\Operation\Reductionable;
use loophp\collection\Contract\Operation\Reverseable;
use loophp\collection\Contract\Operation\RSampleable;
use loophp\collection\Contract\Operation\Scaleable;
use loophp\collection\Contract\Operation\ScanLeft1able;
use loophp\collection\Contract\Operation\ScanLeftable;
use loophp\collection\Contract\Operation\ScanRight1able;
use loophp\collection\Contract\Operation\ScanRightable;
use loophp\collection\Contract\Operation\Shuffleable;
use loophp\collection\Contract\Operation\Sinceable;
use loophp\collection\Contract\Operation\Sliceable;
use loophp\collection\Contract\Operation\Sortable;
use loophp\collection\Contract\Operation\Spanable;
use loophp\collection\Contract\Operation\Splitable;
use loophp\collection\Contract\Operation\Tailable;
use loophp\collection\Contract\Operation\Tailsable;
use loophp\collection\Contract\Operation\TakeWhileable;
use loophp\collection\Contract\Operation\Timesable;
use loophp\collection\Contract\Operation\Transposeable;
use loophp\collection\Contract\Operation\Truthyable;
use loophp\collection\Contract\Operation\Unfoldable;
use loophp\collection\Contract\Operation\Unlinesable;
use loophp\collection\Contract\Operation\Unpackable;
use loophp\collection\Contract\Operation\Unpairable;
use loophp\collection\Contract\Operation\Untilable;
use loophp\collection\Contract\Operation\Unwindowable;
use loophp\collection\Contract\Operation\Unwordsable;
use loophp\collection\Contract\Operation\Unwrapable;
use loophp\collection\Contract\Operation\Unzipable;
use loophp\collection\Contract\Operation\Windowable;
use loophp\collection\Contract\Operation\Wordsable;
use loophp\collection\Contract\Operation\Wrapable;
use loophp\collection\Contract\Operation\Zipable;
use loophp\collection\Iterator\ClosureIterator;

/**
 * @psalm-template TKey
 * @psalm-template TKey of array-key
 * @psalm-template T
 *
 * @template-extends Allable<TKey, T>
 * @template-extends Appendable<TKey, T>
 * @template-extends Applyable<TKey, T>
 * @template-extends Associateable<TKey, T>
 * @template-extends Cacheable<TKey, T>
 * @template-extends Chunkable<TKey, T>
 * @template-extends Collapseable<TKey, T>
 * @template-extends Columnable<TKey, T>
 * @template-extends Combinateable<TKey, T>
 * @template-extends Combineable<TKey, T>
 * @template-extends Compactable<TKey, T>
 * @template-extends Containsable<int, bool>
 * @template-extends Currentable<TKey, T>
 * @template-extends Cycleable<TKey, T>
 * @template-extends Diffable<TKey, T>
 * @template-extends Diffkeysable<TKey, T>
 * @template-extends Distinctable<TKey, T>
 * @template-extends Dropable<TKey, T>
 * @template-extends DropWhileable<TKey, T>
 * @template-extends Duplicateable<TKey, T>
 * @template-extends Everyable<TKey, T>
 * @template-extends Explodeable<TKey, T>
 * @template-extends Falsyable<int, bool>
 * @template-extends Filterable<TKey, T>
 * @template-extends Firstable<TKey, T>
 * @template-extends Flattenable<TKey, T>
 * @template-extends Flipable<TKey, T>
 * @template-extends FoldLeftable<TKey, T>
 * @template-extends FoldLeft1able<TKey, T>
 * @template-extends FoldRightable<TKey, T>
 * @template-extends FoldRight1able<TKey, T>
 * @template-extends Forgetable<TKey, T>
 * @template-extends Frequencyable<TKey, T>
 * @template-extends Getable<TKey, T>
 * @template-extends Groupable<TKey, T>
 * @template-extends GroupByable<TKey, T>
 * @template-extends Hasable<TKey, T>
 * @template-extends Headable<TKey, T>
 * @template-extends IfThenElseable<TKey, T>
 * @template-extends Implodeable<TKey, T>
 * @template-extends Initable<TKey, T>
 * @template-extends Initsable<TKey, T>
 * @template-extends Intersectable<TKey, T>
 * @template-extends Intersectkeysable<TKey, T>
 * @template-extends Intersperseable<TKey, T>
 * @template-extends Keyable<TKey, T>
 * @template-extends Keysable<TKey, T>
 * @template-extends Lastable<TKey, T>
 * @template-extends Limitable<TKey, T>
 * @template-extends Linesable<TKey, T>
 * @template-extends Mapable<TKey, T>
 * @template-extends Mergeable<TKey, T>
 * @template-extends Normalizeable<TKey, T>
 * @template-extends Nthable<TKey, T>
 * @template-extends Nullsyable<int, bool>
 * @template-extends Packable<TKey, T>
 * @template-extends Padable<TKey, T>
 * @template-extends Pairable<TKey, T>
 * @template-extends Permutateable<TKey, T>
 * @template-extends Pipeable<TKey, T>
 * @template-extends Pluckable<TKey, T>
 * @template-extends Prependable<TKey, T>
 * @template-extends Productable<TKey, T>
 * @template-extends Randomable<TKey, T>
 * @template-extends Reductionable<TKey, T>
 * @template-extends Reverseable<TKey, T>
 * @template-extends RSampleable<TKey, T>
 * @template-extends Scaleable<TKey, T>
 * @template-extends ScanLeft1able<TKey, T>
 * @template-extends ScanLeftable<TKey, T>
 * @template-extends ScanRight1able<TKey, T>
 * @template-extends ScanRightable<TKey, T>
 * @template-extends Shuffleable<TKey, T>
 * @template-extends Sinceable<TKey, T>
 * @template-extends Sliceable<TKey, T>
 * @template-extends Sortable<TKey, T>
 * @template-extends Spanable<TKey, T>
 * @template-extends Splitable<TKey, T>
 * @template-extends Tailable<TKey, T>
 * @template-extends Tailsable<TKey, T>
 * @template-extends TakeWhileable<TKey, T>
 * @template-extends Transposeable<TKey, T>
 * @template-extends Truthyable<int, bool>
 * @template-extends Unlinesable<TKey, T>
 * @template-extends Unpackable<TKey, T>
 * @template-extends Unpairable<TKey, T>
 * @template-extends Untilable<TKey, T>
 * @template-extends Unwindowable<TKey, T>
 * @template-extends Unwordsable<TKey, T>
 * @template-extends Unwrapable<TKey, T>
 * @template-extends Unzipable<TKey, T>
 * @template-extends Windowable<TKey, T>
 * @template-extends Wordsable<TKey, T>
 * @template-extends Wrapable<TKey, T>
 * @template-extends Zipable<TKey, T>
 * @template-extends IteratorAggregate<TKey, T>
 */
interface Collection extends
    Allable,
    Appendable,
    Applyable,
    Associateable,
    Cacheable,
    Chunkable,
    Collapseable,
    Columnable,
    Combinateable,
    Combineable,
    Compactable,
    Containsable,
    Currentable,
    Cycleable,
    Diffable,
    Diffkeysable,
    Distinctable,
    Dropable,
    DropWhileable,
    Duplicateable,
    Everyable,
    Explodeable,
    Falsyable,
    Filterable,
    Firstable,
    Flattenable,
    Flipable,
    FoldLeft1able,
    FoldLeftable,
    FoldRight1able,
    FoldRightable,
    Forgetable,
    Frequencyable,
    Getable,
    Groupable,
    GroupByable,
    Hasable,
    Headable,
    IfThenElseable,
    Implodeable,
    Initable,
    Initsable,
    Intersectable,
    Intersectkeysable,
    Intersperseable,
    IteratorAggregate,
    JsonSerializable,
    Keyable,
    Keysable,
    Lastable,
    Limitable,
    Linesable,
    Mapable,
    Mergeable,
    Normalizeable,
    Nthable,
    Nullsyable,
    Packable,
    Padable,
    Pairable,
    Permutateable,
    Pipeable,
    Pluckable,
    Prependable,
    Productable,
    Randomable,
    Rangeable,
    Reductionable,
    Reverseable,
    RSampleable,
    Scaleable,
    ScanLeft1able,
    ScanLeftable,
    ScanRight1able,
    ScanRightable,
    Shuffleable,
    Sinceable,
    Sliceable,
    Sortable,
    Spanable,
    Splitable,
    Tailable,
    Tailsable,
    TakeWhileable,
    Timesable,
    Transposeable,
    Truthyable,
    Unfoldable,
    Unlinesable,
    Unpackable,
    Unpairable,
    Untilable,
    Unwindowable,
    Unwordsable,
    Unwrapable,
    Unzipable,
    Windowable,
    Wordsable,
    Wrapable,
    Zipable
{
    /**
     * Create a new instance with no items.
     *
     * @psalm-template NewTKey
     * @psalm-template NewTKey of array-key
     * @psalm-template NewT
     *
     * @psalm-return \loophp\collection\Contract\Collection<NewTKey, NewT>
     */
    public static function empty(): Collection;

    /**
     * @psalm-template NewTKey
     * @psalm-template NewTKey of array-key
     * @psalm-template NewT
     *
     * @param mixed ...$parameters
     *
     * @psalm-return \loophp\collection\Contract\Collection<NewTKey, NewT>
     */
    public static function fromCallable(callable $callable, ...$parameters): Collection;

    /**
     * @psalm-return \loophp\collection\Contract\Collection<int, string>
     */
    public static function fromFile(string $filepath): Collection;

    /**
     * @psalm-template NewTKey
     * @psalm-template NewTKey of array-key
     * @psalm-template NewT
     *
     * @param iterable<mixed> $iterable
     * @psalm-param iterable<NewTKey, NewT> $iterable
     *
     * @psalm-return \loophp\collection\Contract\Collection<NewTKey, NewT>
     */
    public static function fromIterable(iterable $iterable): Collection;

    /**
     * @param resource $resource
     *
     * @psalm-return \loophp\collection\Contract\Collection<int, string>
     */
    public static function fromResource($resource): Collection;

    /**
     * @psalm-return \loophp\collection\Contract\Collection<int, string>
     */
    public static function fromString(string $string, string $delimiter = ''): Collection;

    /**
     * @psalm-return \loophp\collection\Iterator\ClosureIterator<TKey, T>
     */
    public function getIterator(): ClosureIterator;

    /**
     * @deprecated Use other static constructors instead.
     *
     * @psalm-template NewTKey
     * @psalm-template NewTKey of array-key
     * @psalm-template NewT
     *
     * Create a collection with the data.
     *
     * @param mixed $data
     * @param mixed ...$parameters
     *
     * @psalm-return \loophp\collection\Contract\Collection<NewTKey, NewT>
     */
    public static function with($data = [], ...$parameters): Collection;
}
