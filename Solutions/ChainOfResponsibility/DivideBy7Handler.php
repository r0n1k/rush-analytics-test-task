<?php

namespace Solutions\ChainOfResponsibility;

class DivideBy7Handler extends BaseHandler
{
    public function handle(int $number, bool $handled = false): string
    {
        $result = '';
        if ($number % 7 === 0) {
            $result = 'нет';
            $handled = true;
        }

        return $result . ($this->getNext()?->handle($number, $handled) ?? '');
    }
}