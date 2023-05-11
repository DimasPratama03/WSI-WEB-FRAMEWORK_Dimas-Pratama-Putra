<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\pengalaman_kerja;
use App\Models\Pendidikan;

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
//     return view('welcome');
// });


Route::resource('/',HomeController::class);

Route::resource('dashboard',DashboardController::class);
// untuk menuju ke halaman pengelaman kerja
Route::resource('pengalaman_kerja',pengalaman_kerja::class);
// untuk menuju ke halaman pendidikan
Route::resource('pendidikan',PendidikanController::class);



