<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/user', [ManagementUserController::class, 'index']);

Route::get('/', function () {
    $nama = "Indra Bagus Syah Putra";
    $matkul = ["Workshop Sistem Informasi Web Framework", "Workshop Mobile Applications", "Matematika"];
    return view('home', compact('nama', 'matkul'));
});
