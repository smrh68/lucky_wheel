<?php

namespace App\Services\LotteryProcess;

use Illuminate\Support\Facades\Auth;

class CheckUserPointsHandler extends AbstractLotteryHandler
{
    public function handle($request)
    {
        $user = Auth::user();

        if ($user->point < 15) {
            throw new \Exception('Not enough points to participate in the lottery.', 422);
        }

        return parent::handle($request);
    }
}
