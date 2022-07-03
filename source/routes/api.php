<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\PostController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//make a router to handle the request for the website
Route::get('/websites', [WebsiteController::class, 'index']);
Route::post('/websites', [WebsiteController::class, 'store']);

//make router to handle the request for the subscriber
Route::get('/subscribers', [SubscriberController::class, 'index']);
Route::post('/subscribers', [SubscriberController::class, 'store']);

//make router to handle the request for the post
Route::post('/posts', [PostController::class, 'store']);
