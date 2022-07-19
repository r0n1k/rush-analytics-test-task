<?php

namespace Helpers;

use Solutions\SolutionInterface;

class SolutionTester
{

    public static function test(SolutionInterface $solution): bool
    {
        $solutionOutput = $solution->run();

        echo 'Testing solution ' . $solution::class . PHP_EOL;

        if (count($solutionOutput) !== 50) {
            echo 'Solution output has wrong length' . PHP_EOL;
            echo 'Expected: 50' . PHP_EOL;
            echo 'Actual:   ' . count($solutionOutput) . PHP_EOL;
            return false;
        }

        foreach (self::$expectedResult as $i => $value) {
            if ($value == $solutionOutput[$i]) {
                echo 'Test ' . $i + 1 . ': OK' . PHP_EOL;
            } else {
                echo 'Test ' . $i + 1 . ': FAILED' . PHP_EOL;
                echo 'Expected: ' . $value . PHP_EOL;
                echo 'Actual:   ' . $solutionOutput[$i] . PHP_EOL;
                return false;
            }
        }

        return true;
    }


    public static function performanceTest(SolutionInterface $solution): void
    {
        $duration = 0.0;
        for ($i = 0; $i < 50; $i++) {
            $startTime = microtime(true);
            $solution->run();
            $endTime = microtime(true);
            $duration += ($endTime - $startTime) * 1000;
        }
        $duration /= $i;
        echo 'Performance test for solution ' . $solution::class . ': ' . $duration . ' milliseconds' . PHP_EOL;
    }


    private static array $expectedResult = [
        1,
        2,
        3,
        4,
        'да',
        6,
        'нет',
        8,
        9,
        'да',
        11,
        12,
        13,
        'нет',
        'да',
        16,
        17,
        18,
        19,
        'да',
        'нет',
        22,
        23,
        24,
        'да',
        26,
        27,
        'нет',
        29,
        'да',
        31,
        32,
        33,
        34,
        'данет',
        36,
        37,
        38,
        39,
        'да',
        41,
        'нет',
        43,
        44,
        'да',
        46,
        47,
        48,
        'нет',
        'да',
    ];


    private function __construct()
    {
    }

}