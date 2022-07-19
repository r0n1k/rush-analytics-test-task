<?php

namespace Solutions\ChainOfResponsibility;

class DefaultHandler extends BaseHandler
{
    public function handle(int $number, bool $handled = false): string
    {
        return $handled ? '' : $number;
    }

}