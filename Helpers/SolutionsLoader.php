<?php

namespace Helpers;

use Solutions\SolutionInterface;

class SolutionsLoader
{

    /**
     * Loads all solutions within solutions directory
     * @return SolutionInterface[]
     */
    public static function loadSolutions(): array
    {
        $solutions = [];
        $solutionsDir = dirname(__DIR__) . '/Solutions';

        // glob solutions
        $solutionsFiles = glob($solutionsDir . '/**/*Solution.php');
        foreach ($solutionsFiles as $solutionFile) {

            $solutionDir = array_reverse(explode(DIRECTORY_SEPARATOR, dirname($solutionFile)))[0];
            if ($solutionDir === 'Solutions') {
                $solutionDir = '';
            }
            $solutionClass = 'Solutions\\' . $solutionDir . '\\' . basename($solutionFile, '.php');

            if (class_exists($solutionClass)) {
                $solutions[] = new $solutionClass();
            }
        }
        return $solutions;
    }
}