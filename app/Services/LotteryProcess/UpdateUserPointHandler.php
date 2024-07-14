<?php

namespace App\Services\LotteryProcess;

use Illuminate\Support\Facades\Auth;

class UpdateUserPointHandler extends AbstractLotteryHandler
{
    public function handle($request)
    {
        $user = Auth::user();
        $user->point -= 15 ;
        $user->save();

        return parent::handle($request);
    }
}
