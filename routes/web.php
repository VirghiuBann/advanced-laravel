<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
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
