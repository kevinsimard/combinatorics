<?php

use Kevinsimard\Combinatorics\Combinatorics;

class CombinatoricsTest extends PHPUnit_Framework_TestCase
{
    public function test_add_adds_element()
    {
        $instance = new Combinatorics(['foo', 'bar']);

        $instance->add('baz');
        $instance->add('qux');

        $this->assertEquals(['foo', 'bar', 'baz', 'qux'], $instance->elements());
    }

    public function test_reset_resets_elements()
    {
        $instance = new Combinatorics(['foo', 'bar']);

        $instance->reset();

        $this->assertEquals([], $instance->elements());
    }

    public function test_getter_returns_elements()
    {
        $instance = new Combinatorics(['foo', 'bar']);

        $this->assertEquals(['foo', 'bar'], $instance->elements());
    }

    public function test_permutations_with_no_element()
    {
        $instance = new Combinatorics();

        $generator = $instance->permutations();
        $values = iterator_to_array($generator);

        $this->assertEquals([[]], $values);
    }

    public function test_permutations_with_one_element()
    {
        $instance = new Combinatorics(['foo']);

        $generator = $instance->permutations();
        $values = iterator_to_array($generator);

        $this->assertEquals([['foo']], $values);
    }

    public function test_permutations_with_two_elements()
    {
        $instance = new Combinatorics(['foo', 'bar']);

        $generator = $instance->permutations();
        $values = iterator_to_array($generator);

        $this->assertEquals([
            ['foo', 'bar'],
            ['bar', 'foo'],
        ], $values);
    }

    public function test_permutations_with_three_elements()
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
