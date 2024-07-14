<?php

namespace App\Services\LotteryProcess;

class SelectRandomItemHandler extends AbstractLotteryHandler
{
    public function handle($request)
    {
        $lotteryItems = $request->lotteryItems;
        $randomItemTitle = $lotteryItems[array_rand($lotteryItems)];
        $request->selectedItemTitle = $randomItemTitle;

        return parent::handle($request);
    }
}
