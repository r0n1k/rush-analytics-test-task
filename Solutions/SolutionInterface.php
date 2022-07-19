<?php

namespace Solutions;

interface SolutionInterface
{
    /**
     * Return numbers
     *
     * @return string[]
     */
    public function run(): array;


    /**
     * Short description for help text
     *
     * @return string
     */
    public function getDescription(): string;
}