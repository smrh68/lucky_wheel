<?php

namespace App\Services\LotteryProcess;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UpdateUserPointHandler extends AbstractLotteryHandler
{
    public function handle($request)
    {
        $user = Auth::user();
        $user->point -= 15 ;
        $user->save();
        $user->awards()->syncWithPivotValues($request->selectedItem, ['time' => Carbon::now()], false);

        return parent::handle($request);
    }
}
