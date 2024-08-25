<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetDataController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\LogicalController;
use App\Http\Controllers\ArrayLogicController;
use App\Http\Controllers\CalculateDeliveryDateController;
use App\Http\Controllers\DateYearCycleController;
use App\Http\Controllers\RandomNumbersController;

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

Route::group(['prefix' => 'MySql'], function () {
    Route::get('get-querie-one', [GetDataController::class, 'QuerieOne'])->name('QuerieOne');
    Route::get('get-querie-two', [GetDataController::class, 'QuerieTwo'])->name('QuerieTwo');
    Route::get('get-querie-three', [GetDataController::class, 'Queriethree'])->name('Queriethree');
    Route::get('get-querie-four', [GetDataController::class, 'QuerieFour'])->name('QuerieFour');
    Route::get('get-querie-five', [GetDataController::class, 'QuerieFive'])->name('QuerieFive');
    Route::get('get-querie-Six', [GetDataController::class, 'QuerieSix'])->name('QuerieSix');
    Route::get('get-querie-Seven', [GetDataController::class, 'QuerieSeven'])->name('QuerieSeven');
});

Route::group(['prefix' => 'logical'], function () {
    Route::get('logically-first', [LogicalController::class, 'IdentifyNextNumber'])->name('IdentifyNextNumber');
    Route::get('logically-second', [CalculateDeliveryDateController::class, 'index'])->name('index');
    Route::get('logically-third', [ArrayLogicController::class, 'ArrayIndex'])->name('ArrayIndex');
    Route::get('logically-fourth', [DateYearCycleController::class, 'index'])->name('dateIndex');
    Route::post('logically-second', [CalculateDeliveryDateController::class, 'calculateDeliveryDate'])->name('calculateDeliveryDate');
    Route::post('logically-third', [ArrayLogicController::class, 'processArray'])->name('processArray');
    Route::post('logically-fourth', [DateYearCycleController::class, 'processYearCycle'])->name('processYearCycle');
    Route::get('logically-five-one', [RandomNumbersController::class, 'MethodOne']);
    Route::get('logically-five-second', [RandomNumbersController::class, 'MethodSecond']);
    Route::get('logically-five-third', [RandomNumbersController::class, 'MethodThird']);
});
