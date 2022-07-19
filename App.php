<?php

use Helpers\HelpGenerator;
use Helpers\OptsHelper;
use Helpers\SolutionsLoader;
use Helpers\SolutionTester;
use Solutions\SolutionInterface;

class App
{
    private int $solutionNumber = 0;

    /**
     * @var SolutionInterface[]
     */
    private static array $solutions = [
    ];

    /**
     * Solution to run
     *
     * @return SolutionInterface|null
     */
    private function getSolution(): ?SolutionInterface {
        return static::$solutions[$this->solutionNumber] ?? null;
    }

    public function run(): void
    {

        $this->loadSolutions();

        $opts = getopt('s:htp', ['solution:', 'help', 'test', 'performance-test']);

        if (isset($opts['h']) || isset($opts['help'])) {
            echo HelpGenerator::generateHelp(static::$solutions);
            exit(0);
        }

        if (isset($opts['t']) || isset($opts['test'])) {
            exit($this->runTests() ? 0 : 1);
        }

        if (isset($opts['p']) || isset($opts['performance-test'])) {
            $this->runPerformanceTest();
            exit(0);
        }

        if (isset($opts['s']) || isset($opts['solution'])) {
            $solutionNumber = ($opts['s'] ?? $opts['solution']);
            if (OptsHelper::isInt($solutionNumber) && array_key_exists($solutionNumber, static::$solutions)) {
                $this->solutionNumber = $solutionNumber;
            } else {
                echo "Invalid solution number or solution doesn't exist: $solutionNumber" . PHP_EOL;
                exit(1);
            }
        }

        $solution = $this->getSolution();
        if ($solution === null) {
            echo "No solution selected" . PHP_EOL;
            exit(1);
        }

        echo implode(PHP_EOL, $solution->run());
    }


    private function runTests(): bool
    {
        foreach (static::$solutions as $solution) {
            if (!SolutionTester::test($solution)) {
                return false;
            }
        }

        return true;
    }

    private function runPerformanceTest(): void
    {
        foreach (static::$solutions as $solution) {
            SolutionTester::performanceTest($solution);
        }
    }

    private function loadSolutions()
    {
        static::$solutions = SolutionsLoader::loadSolutions();

    }
}
