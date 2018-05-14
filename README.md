# Pseudo Random Number Generator

This library includes the set of _topic_ for use in different cases.

#### Generators
1. Linear congruential generator
    1. BSD version
    2. Microsoft version (this version was used for the **Freecell solitaire** game numbered deals)


### Usage
Get static function from a class which return a Closure. Use this closure in the same way as `rand()` or `mt_rand` function.
```php
        $cards = [];
        $cardsLeftToPlace = 52;
        $randFunction = \Knowgod\PRNG\LinearCongruentialGenerator::msvcrt_rand($gamenumber);
        for ($i = 0; $i < 52; ++$i) {
            $cards[ $i ] = $randFunction() % $cardsLeftToPlace--;
        }
```
