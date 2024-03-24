<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TunefyCrud;
use App\Http\Controllers\music_list;
use App\Http\Controllers\HistoryTunefy;
use App\Http\Controllers\ShoppingCart;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::post('add' , [TunefyCrud::class, 'add']);

Route::get('/music-list', [music_list::class, 'list']);
Route::post('addmusic', [music_list::class, 'add']);

Route::get('/orders', [HomeController::class, 'orders']);
Route::get('usertype', [HomeController::class, 'update']);

Route::get('/sidebar/global', function () {
    return view('global');
});

Route::post('proccess', [TunefyCrud::class, 'update']);

Route::get('/shoppingcart', [ShoppingCart::class, 'cart']);
Route::post('paying', [ShoppingCart::class, 'update']);

Route::get('/form-request', function ( ){
    return view('request');
});

Route::get('/receipt', [ShoppingCart::class, 'receipt']);
Route::post('/receipt', [ShoppingCart::class, 'receipt']);

Route::get('/history', [HistoryTunefy::class, 'history'])->name('history');
Route::delete('historydelete', [HistoryTunefy::class, 'delete']);


Route::get('/home', function ( ){
    return view('home');
});

Route::get('/genre', [music_list::class, 'genre']);
Route::post('/beli', [music_list::class, 'receipt']);
Route::post('musicorder', [music_list::class, 'update']);


Route::get('/out', function ( ){
    return view('loginout');
});