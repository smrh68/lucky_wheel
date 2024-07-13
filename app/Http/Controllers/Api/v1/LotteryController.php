<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryController extends Controller
{
    public function spin()
    {
        $id = Auth::user()->id;
        dd($id);
    }
}
