<?php

namespace App\Services\LotteryProcess;

interface LotteryHandler
{
    public function setNext(LotteryHandler $handler): LotteryHandler;

    public function handle($request);
}