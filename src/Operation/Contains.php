<?php

declare(strict_types=1);

namespace drupol\collection\Operation;

use drupol\collection\Contract\Collection as CollectionInterface;

/**
 * Class Contains.
 */
final class Contains extends Operation
{
    /**
     * {@inheritdoc}
     */
    public function run(CollectionInterface $collection)
    {
        [$key] = $this->parameters;

        if (!\is_string($key) && \is_callable($key)) {
            $placeholder = new \stdClass();

            return $collection->first($key, $placeholder) !== $placeholder;
        }

        foreach ($collection as $value) {
            if ($value === $key) {
                return true;
            }
        }

        return false;
    }
}