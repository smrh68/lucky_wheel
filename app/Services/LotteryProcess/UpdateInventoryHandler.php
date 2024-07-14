<?php

namespace App\Services\LotteryProcess;

use App\Models\Award;

class UpdateInventoryHandler extends AbstractLotteryHandler
{
    private LotteryHandler $lotteryItemsHandler;

    public function __construct($lotteryItemsHandler)
    {
        $this->lotteryItemsHandler = $lotteryItemsHandler;
    }

    public function handle($request)
    {
        $selectedItem = Award::where('title', $request->selectedItemTitle)->first();

        if ($selectedItem && $selectedItem->inventory > 0) {
            if ($selectedItem->title != 'empty') {
                $selectedItem->inventory -= 1;
                $selectedItem->save();
            }
            $request->selectedItem = $selectedItem;

            return parent::handle($request);
        }

        return $this->lotteryItemsHandler->handle($request);
    }
}
