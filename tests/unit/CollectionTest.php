<?php declare(strict_types=1);
/*
 * This file is part of Shaku, the Collection Generator.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Shaku;

use PHPUnit\Framework\TestCase;
use vendor\Value;
use vendor\ValueCollection;

/**
 * @covers vendor\ValueCollection
 * @covers vendor\ValueCollectionIterator
 *
 * @uses vendor\Value
 */
final class CollectionTest extends TestCase
{
    public function test_can_be_created_from_array_of_values(): void
    {
        $values = [new Value, new Value];

        $collection = ValueCollection::fromArray($values);

        $this->assertSame($values, $collection->items());
    }

    public function test_can_be_created_from_list_of_values(): void
    {
        $value = new Value;

        $collection = ValueCollection::fromList($value);

        $this->assertSame($value, $collection->items()[0]);
    }

    public function test_values_can_be_added(): void
    {
        $value = new Value;

        $collection = new ValueCollection;

        $collection->add($value);

        $this->assertSame($value, $collection->items()[0]);
    }

    public function test_values_can_be_counted(): void
    {
        $collection = ValueCollection::fromList(new Value, new Value);

        $this->assertCount(2, $collection);
    }

    public function test_values_can_be_iterated(): void
    {
        $value = new Value;

        $collection = new ValueCollection;

        $collection->add($value);

        foreach ($collection as $key => $_value) {
            $this->assertSame(0, $key);
            $this->assertSame($value, $_value);
        }
    }
}
