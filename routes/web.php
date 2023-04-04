<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PresensiController;

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

// Route::get('/', function () {
    // return view('welcome');


// });
// login
Route::get('/', [AuthController::class, 'index']);
// home
Route::get('/dashboard', [Dashboard::class, 'index']);
// presensi
Route::get('/presensi', [PresensiController::class, 'index']);


// root