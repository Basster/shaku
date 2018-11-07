<?php declare(strict_types=1);
namespace {{namespace}};

final class {{class}}Collection implements \IteratorAggregate
{
    /**
     * @var {{class}}[]
     */
    private $items = [];

    public static function fromArray(array $items): self
    {
        $collection = new self;

        foreach ($items as $item) {
            $collection->add($item);
        }

        return $collection;
    }

    public static function fromList({{class}} ...$items): self
    {
        return self::fromArray($items);
    }

    {{visibility}} function add({{class}} $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return {{class}}[]
     */
    public function items(): array
    {
        return $this->items;
    }

    public function getIterator(): {{class}}CollectionIterator
    {
        return new {{class}}CollectionIterator($this);
    }
}