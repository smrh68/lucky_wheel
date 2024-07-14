<?php

namespace App\Services;

use App\Services\LotteryProcess\CheckLotteryItemsHandler;
use App\Services\LotteryProcess\CheckUserPointsHandler;
use App\Services\LotteryProcess\SelectRandomItemHandler;
use App\Services\LotteryProcess\UpdateInventoryHandler;
use App\Services\LotteryProcess\UpdateUserPointHandler;

class LotteryService
{
    public function startLottery($request)
    {
        $checkUserPointsHandler = new CheckUserPointsHandler();
        $checkLotteryItemsHandler = new CheckLotteryItemsHandler();
        $selectRandomItemHandler = new SelectRandomItemHandler();
        $updateInventoryHandler = new UpdateInventoryHandler($checkLotteryItemsHandler);
        $updateUserPointHandler = new UpdateUserPointHandler();

        $checkUserPointsHandler
            ->setNext($checkLotteryItemsHandler)
            ->setNext($selectRandomItemHandler)
            ->setNext($updateInventoryHandler)
            ->setNext($updateUserPointHandler);

        return $checkUserPointsHandler->handle($request);
    }
}
