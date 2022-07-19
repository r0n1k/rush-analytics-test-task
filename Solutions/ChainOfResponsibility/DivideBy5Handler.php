<?php

namespace Solutions\ChainOfResponsibility;

class DivideBy5Handler extends BaseHandler
{

    public function handle(int $number, bool $handled = false): string
    {
        $result = '';
        if ($number % 5 === 0) {
            $result = 'да';
            $handled = true;
        }

        return $result . ($this->getNext()?->handle($number, $handled) ?? '');
    }
}