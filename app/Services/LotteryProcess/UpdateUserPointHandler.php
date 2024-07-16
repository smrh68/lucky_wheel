<?php

namespace App\Services\LotteryProcess;

use App\Events\AwardSelected;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class UpdateUserPointHandler extends AbstractLotteryHandler
{
    public function handle($request)
    {
        // decrease user point
        $user = Auth::user();
        $user->point -= 15 ;
        $user->save();
        $award = $request->selectedItem;
        // save award for user
        $user->awards()->syncWithPivotValues($award, ['time' => Carbon::now()], false);
        // dispatch event to send fax to warehouse keeper
        Event::dispatch(new AwardSelected($award->id, $user->id));

        return parent::handle($request);
    }
}
