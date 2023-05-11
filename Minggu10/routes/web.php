<?php

use App\Http\Controllers\cobaController;
use App\Http\Controllers\pegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sessionController;

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
// route untuk semua session
Route::get('/session/show', [sessionController::class, 'show']);
Route::get('/session', [sessionController::class, 'create']);
Route::get('/session/delete', [sessionController::class, 'delete']);
// menampilkan nama pegawai
Route::get('/pegawai/{nama}', [pegawaiController::class, 'index']);
// request
Route::get('/formulir', [pegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [pegawaiController::class, 'proses']);
//handling error
Route::get('/cobaerror/{nama?}',[cobaController::class,'index']);