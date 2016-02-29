# Combinatorics

[![Build Status](https://travis-ci.org/kevinsimard/combinatorics.svg)](https://travis-ci.org/kevinsimard/combinatorics)

## Usage

You may add new elements to the list by using the `add` method:

```php
$instance = new Combinatorics(['foo', 'bar']);

$instance->add('baz');
$instance->add('qux');

// ['foo', 'bar', 'baz', 'qux']
```

You may also want to reset the list of elements by calling the `reset` method:

```php
$instance = new Combinatorics(['foo', 'bar']);

$instance->reset();

// []
```

### Permutations

```php

$elements = ['foo', 'bar', 'baz'];

$instance = new Combinatorics($elements);
foreach ($instance->permutations() as $value) {
    ...
}

// OR

foreach (Combinatorics::permutations($elements) as $value) {
    ...
}

// [
//     ['foo', 'bar', 'baz'],
//     ['bar', 'foo', 'baz'],
//     ['bar', 'baz', 'foo'],
//     ['foo', 'baz', 'bar'],
//     ['baz', 'foo', 'bar'],
//     ['baz', 'bar', 'foo']
// ]
```

## Structure

    ├── src
    │   └── Combinatorics.php
    ├── tests
    │   └── CombinatoricsTest.php
    ├── .editorconfig
    ├── .gitattributes
    ├── .gitignore
    ├── .travis.yml
    ├── LICENSE.txt
    ├── composer.json
    ├── composer.lock
    ├── phpunit.xml
    └── readme.md

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
