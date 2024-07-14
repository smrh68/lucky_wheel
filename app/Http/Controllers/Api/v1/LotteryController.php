<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\LotteryService;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function spin(Request $request, LotteryService $lotteryService)
    {
        try{
            $result = $lotteryService->startLottery($request);
            return response()->json(['title' => $result->selectedItem->title], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
