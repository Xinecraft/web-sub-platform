<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [\App\Http\Controllers\Api\ApiAuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\ApiAuthController::class, 'login']);

Route::get('website', [\App\Http\Controllers\Api\WebsiteController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('subscribe', [\App\Http\Controllers\Api\SubscriptionController::class, 'store']);
    Route::post('website/{website}/post', [App\Http\Controllers\Api\PostController::class, 'store']);
});
