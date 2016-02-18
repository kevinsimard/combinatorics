<?php

use Kevinsimard\Combinatorics\Combinatorics;

class CombinatoricsTest extends PHPUnit_Framework_TestCase
{
    public function testAddElements()
    {
        $instance = new Combinatorics(['foo', 'bar']);

        $instance->add('baz');
        $instance->add('qux');

        $this->assertEquals(['foo', 'bar', 'baz', 'qux'], $instance->elements());
    }

    public function testResetElements()
    {
        $instance = new Combinatorics(['foo', 'bar']);

        $instance->reset();

        $this->assertEquals([], $instance->elements());
    }

    public function testElementsGetter()
    {
        $instance = new Combinatorics(['foo', 'bar']);

        $this->assertEquals(['foo', 'bar'], $instance->elements());
    }

    public function testPermutationsWithNoElement()
    {
        $instance = new Combinatorics();

        $generator = $instance->permutations();
        $values = iterator_to_array($generator);

        $this->assertEquals([[]], $values);
    }

    public function testPermutationsWithOneElement()
    {
        $instance = new Combinatorics(['foo']);

        $generator = $instance->permutations();
        $values = iterator_to_array($generator);

        $this->assertEquals([['foo']], $values);
    }

    public function testPermutationsWithTwoElements()
    {
        $instance = new Combinatorics(['foo', 'bar']);

        $generator = $instance->permutations();
        $values = iterator_to_array($generator);

        $this->assertEquals([
            ['foo', 'bar'],
            ['bar', 'foo'],
        ], $values);
    }

    public function testPermutationsWithThreeElements()
    {
        $instance = new Combinatorics(['foo', 'bar', 'baz']);

        $generator = $instance->permutations();
        $values = iterator_to_array($generator);

        $this->assertEquals([
            ['foo', 'bar', 'baz'],
            ['bar', 'foo', 'baz'],
            ['bar', 'baz', 'foo'],
            ['foo', 'baz', 'bar'],
            ['baz', 'foo', 'bar'],
            ['baz', 'bar', 'foo'],
        ], $values);
    }
}
