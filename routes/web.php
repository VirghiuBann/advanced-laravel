<?php

use App\Postcard;

use App\Http\Controllers;
use Illuminate\Support\Str;
use App\PostcardSendingService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pay', [Controllers\PayOrderController::class, 'store']);

// view composers
Route::get('channels', [Controllers\ChannelController::class, 'index']);
Route::get('post/create', [Controllers\PostController::class, 'create']);


Route::get('postcards', function () {
    $postcardService = new PostcardSendingService('ud', 4, 6);

    $postcardService->hello('hello from Virghiu', 'test@test.com');
});

Route::get('facades', function () {
    Postcard::hello('hello form facades', 'abc@gmail.test');
});

// macros

Route::get('macros', function () {
    // dd(Str::partNumber('239847522'));
    dd(Str::prefix('239847522'));

    return Response::errorJson('custom message 404');
});
