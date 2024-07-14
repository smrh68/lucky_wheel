<?php

namespace App\Services\LotteryProcess;

abstract class AbstractLotteryHandler implements LotteryHandler
{
    private $nextHandler;

    public function setNext(LotteryHandler $handler): LotteryHandler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle($request)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return $request;
    }
}