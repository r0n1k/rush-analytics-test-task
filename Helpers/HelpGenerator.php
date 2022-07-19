<?php


namespace Helpers;

/**
 * Generate help text
 */
class HelpGenerator
{
    /**
     * Returns help text
     *
     * @param array $possibleSolutions possible solutions
     *
     * @return string
     */
    public static function generateHelp(array $possibleSolutions): string
    {
        $helpText = <<<HELP
Usage: php main.php [--solution=<solution>|-s <solution>] [--test|-t] [--performance-test|-p] [--help]
Options:
  --solution=<solution> | -s <solution>
   Chose the solution to run. Possible values: %s
%s
   
   --test | -t Run tests
   
   --performance-test | -p Run performance tests
   
  --help | -h - get this help

HELP;

        $possibleValues = array_keys($possibleSolutions);
        $solutionDescriptions = array_reduce(
            $possibleValues,
            static function (string $result, int $solutionNumber) use ($possibleSolutions) {
                $solution = $possibleSolutions[$solutionNumber];
                $result .= sprintf("     %d. %s\n", $solutionNumber, $solution->getDescription());
                return $result;
            },
            ''
        );
        return sprintf($helpText, implode(', ', $possibleValues), $solutionDescriptions);
    }


    private function __construct()
    {
    }
}