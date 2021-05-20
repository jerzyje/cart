<?php

declare(strict_types=1);

namespace Handler;

class HandlerChainBuilder
{
    public function __construct()
    {
        //create first handler's class
    }

    /**
     * @param array $handlersClassNames
     * @return AbstractHandler
     */
    public function build(array $handlersClassNames): AbstractHandler
    {
        $className = array_shift($handlersClassNames);
        $mainHandler = new $className();

        $this->attachNextHandler($mainHandler, $handlersClassNames);

        return $mainHandler;
    }

    /**
     * @param AbstractHandler $currentHandler
     * @param array $handlersClassNames
     */
    private function attachNextHandler(AbstractHandler $currentHandler, array $handlersClassNames): void
    {
        if (count($handlersClassNames) !== 0) {
            $className = array_shift($handlersClassNames);
            $nextHandler = new $className();

            $this->attachNextHandler($currentHandler->addNext($nextHandler), $handlersClassNames);
        }
    }
}
