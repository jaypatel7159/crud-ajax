<?php

use App\Http\Controllers\ClientController;
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


Route::get("clientList", [ClientController::class, 'clientList'])->name("clientList");

Route::post("clientStore", [ClientController::class, 'clientStore'])->name("clientStore");

Route::get("clientEdit", [ClientController::class, 'clientEdit'])->name("clientEdit");

Route::post("clientUpdate", [ClientController::class, 'clientUpdate'])->name("clientUpdate");

Route::get("clientDelete", [ClientController::class, 'clientDelete'])->name("clientDelete");