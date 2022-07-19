<?php

namespace Solutions\ChainOfResponsibility;

interface HandlerInterface
{
    public function setNext(HandlerInterface $handler): HandlerInterface;

    public function handle(int $number, bool $handled = false): string;
}