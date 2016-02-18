<?php

namespace Kevinsimard\Combinatorics;

class Combinatorics
{
    /**
     * @var array
     */
    protected $elements;

    /**
     * @param array $elements
     *
     * @return void
     */
    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    /**
     * @param mixed $element
     *
     * @return $this
     */
    public function add($element)
    {
        $this->elements[] = $element;

        return $this;
    }

    /**
     * @return $this
     */
    public function reset()
    {
        $this->elements = [];

        return $this;
    }

    /**
     * @return array
     */
    public function elements()
    {
        return $this->elements;
    }

    /**
     * @param string $method
     * @param array $parameters
     *
     * @return mixed
     */
    public function __call($method, array $parameters)
    {
        $parameters = $parameters ?: [$this->elements];

        return call_user_func_array([$this, $method], $parameters);
    }

    /**
     * @param string $method
     * @param array $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, array $parameters)
    {
        $instance = new static($parameters);

        return call_user_func_array([$instance, $method], $parameters);
    }

    /**
     * @param array $elements
     *
     * @return \Generator
     */
    protected function permutations(array $elements)
    {
        if (count($elements) <= 1) { yield $elements; }

        else {
            $permutations = $this->permutations(array_slice($elements, 1));

            foreach ($permutations as $permutation) {
                foreach (range(0, count($elements) - 1) as $i) {
                    yield array_merge(array_slice($permutation, 0, $i),
                        [$elements[0]], array_slice($permutation, $i));
                }
            }
        }
    }
}
