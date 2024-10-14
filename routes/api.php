<?php

use App\Http\Controllers\Api\TransactionController;
use App\Http\Middleware\ConvertNumbers;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ConvertNumbers::class], function (){
    Route::post('/transfer', [TransactionController::class, 'transfer']);
});

Route::get('/top-users', [TransactionController::class, 'topUsers']);
