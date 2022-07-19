<?php

namespace Solutions\RegularSolution;

use Solutions\SolutionInterface;

class RegularSolution implements SolutionInterface
{

    public function run(): array
    {
        return array_reduce(
            range(1, 50),
            function (array $resultingArray, int $i) {
                $resultingArray[] = $this->translateNumber($i);
                return $resultingArray;
            },
            []
        );
    }

    private function translateNumber(int $number): string
    {
        $resultStr = '';
        if ($number % 5 === 0) {
            $resultStr .= 'да';
        }
        if ($number % 7 === 0) {
            $resultStr .= 'нет';
        }
        return $resultStr ?: $number;
    }

    public function getDescription(): string
    {
        return 'Regular solution based on a loop';
    }
}