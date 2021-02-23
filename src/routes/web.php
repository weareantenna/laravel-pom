<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class, "index"]);

Route::get('/api/authenticate', [IndexController::class, "authenticate"]);

Route::get('/api/paylink', [IndexController::class, "getPaylink"]);

Route::get('/api/paylink2', [IndexController::class, "getPaylink2"]);

Route::get('/api/paymentstatus', [IndexController::class, "getPaymentStatus"]);
