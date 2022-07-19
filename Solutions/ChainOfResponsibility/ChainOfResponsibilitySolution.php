<?php

namespace Solutions\ChainOfResponsibility;

use Solutions\SolutionInterface;

class ChainOfResponsibilitySolution implements SolutionInterface
{
    public function run(): array
    {
        $handler = new DivideBy5Handler();
        $handler->setNext(new DivideBy7Handler())->setNext(new DefaultHandler());

        $generator = $this->generator($handler);

        $result = [];
        foreach ($generator as $value) {
            $result[] = $value;
        }

        return $result;
    }


    private function generator(HandlerInterface $handler)
    {
        for ($i = 1; $i <= 50; $i++) {
            yield $handler->handle($i);
        }
    }

    public function getDescription(): string
    {
        return 'Solution based on chain of responsibility pattern';
    }
}