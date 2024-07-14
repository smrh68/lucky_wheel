<?php

namespace App\Services\LotteryProcess;

use App\Models\Award;

class CheckLotteryItemsHandler extends AbstractLotteryHandler
{
    public function handle($request)
    {
        $awards = Award::where('inventory', '>', 0)->get();
        if ($awards->count() < 2) {
            throw new \Exception('Only the empty option is available.', 503);
        }
        $lotteryItems = [];
        foreach ($awards as $award){
            for($i = 0; $i < $award->coefficient; $i++)
                $lotteryItems[] = $award->title;
        }
        $request->lotteryItems = $lotteryItems;

        return parent::handle($request);
    }
}
