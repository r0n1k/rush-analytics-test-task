<?php

namespace Helpers;

class OptsHelper
{

    public static function isInt($value): bool
    {
        return is_numeric($value) && (int)$value == $value;
    }

    private function __construct()
    {
    }
}