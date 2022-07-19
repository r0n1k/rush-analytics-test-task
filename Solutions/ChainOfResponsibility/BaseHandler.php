<?php

namespace Solutions\ChainOfResponsibility;

abstract class BaseHandler implements HandlerInterface
{

    private ?HandlerInterface $nextHandler;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    protected function getNext(): ?HandlerInterface
    {
        return $this->nextHandler;
    }
}