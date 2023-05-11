<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route ke halaman upload
Route::get('/upload', [App\Http\Controllers\UploadController::class,'upload'])->name('upload');
//Route untuk menampilkan halaman setelah proses upload
Route::post('/upload/proses',[App\Http\Controllers\UploadController::class,'proses_upload'])->name('upload.proses');
Route::post('/upload/resize',[App\Http\Controllers\UploadController::class,'resize_upload'])->name('upload.resize');
//route untuk ke halaman upload dropzone image
Route::get('/dropzone', [App\Http\Controllers\UploadController::class,'dropzone']);
Route::post('/dropzone/store', [App\Http\Controllers\UploadController::class,'dropzone_store']);
//route untuk ke halaman upload pdf
Route::get('/pdf_upload', [App\Http\Controllers\UploadController::class,'pdf_upload']);
Route::post('/pdf/store', [App\Http\Controllers\UploadController::class,'pdf_store']);
