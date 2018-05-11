<?php
/**
 * @author    Arkadij Kuzhel <arkuzhel@gmail.com>
 * @created   11.05.18
 */

use Knowgod\PRNG\LinearCongruentialGenerator;

/**
 * Class LcgTest
 *
 */
class LcgTest extends \PHPUnit\Framework\TestCase
{
    public function getGeneratorTestData()
    {
        return [
            [
                LinearCongruentialGenerator::bsd_rand(0),
                LinearCongruentialGenerator::bsd_rand(0),
                16,
            ],
            [
                LinearCongruentialGenerator::bsd_rand(500800),
                LinearCongruentialGenerator::bsd_rand(500800),
                31, 4,
            ],
            [
                LinearCongruentialGenerator::msvcrt_rand(500800),
                LinearCongruentialGenerator::msvcrt_rand(500800),
                31, 4,
            ],
        ];
    }

    /**
     * @dataProvider getGeneratorTestData
     *
     * @param int $seed
     * @param int $rowLength
     */
    public function testRepeatability($randFunction1, $randFunction2, $rowLength, $skipRowItems = 0)
    {
        for ($i = 0; $i < $rowLength; ++$i) {
            if ($i < $skipRowItems) {
                continue;
            }
            $this->assertEquals($randFunction1(), $randFunction2());
        }
    }
}
