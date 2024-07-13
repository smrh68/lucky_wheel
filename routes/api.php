<?php

use App\Http\Controllers\Api\v1\LotteryController;
use App\Http\Middleware\LoginRandomUser;
use Illuminate\Support\Facades\Route;

Route::get('/v1/lucky-wheel', [LotteryController::class, 'spin'])->middleware(LoginRandomUser::class);
