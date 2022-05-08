<?php

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

Route::resource('team', 'TeamController');

Route::get('type/{type}', 'EquipmentTypeController@categorizeEquipment');

Route::get('transaction', 'EquipmentController@transaction')->name('transaction');
Route::post('transaction/process', 'EquipmentController@processTransaction')->name('process-transaction');