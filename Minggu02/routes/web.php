<?php

use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;

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

Route::get('/Login', function () {
    return view('LoginPage');
    //Route yang mengarah ke halaman login yang telah kita buat melalui file "LoginPage.blade.php"
});

//CRSF Protection
Route::post('/Login_Proses', function (Request $request) {
    dd($request);
    //Route yang mengarah ke halaman LoginProses yang berguna untuk melihat token yang dihasilkan dari CSRF
});

//Redirect Route
Route::get('/test2' , function() {
    //Menampilkan halaman test2 yang berisi "Laravel test view"
    return "Laravel test view";
});
//Apabila user mengakses halaman test1 maka user akan dialihkan otomatis ke halaman test2
Route::redirect('/test1', '/test2');

//Route Parameter Opsional
Route::get('user/{name?}', function ($name = null ) {
    return $name;
});

Route::get('user/{name?}', function ($name = 'Dimas') {
    return $name;
    //Apabila user mengakses halaman "/users maka akan ditampilkan nama user"
})->where('name', '[A-Za-z]+'); //Penambahan Reguler Expression Constraints
//Format penulisan parameter hanya diperbolehkan menggunakan huruf saja

//Encoded Forward Slashes
Route::get('user/{name?}', function ($name = 'Dimas') {
    return $name;
    //Apabila user mengakses halaman "/users maka akan ditampilkan nama user"
})->where('name', '.*');//Penambahan Encoded Forward Slashes yang berguna untuk mengizinkan karakter "/" untuk menjadi bagian dari nilai parameter

// Route::get('/Pengguna', function ($id = 'Dimas') {
//     //generating url
//     $url = route('user', [
//         "id" => $id,
//     ]);
//     //generating redirect
//     return redirect()->route('user', [
//         "id" => $id,
//     ]);
// })->where('id', '.*');

//Namespace
route::namespace('admin')->group(function() {
    Route::get('/profile', function () {
        return "Ini Profile Page";
        //Menampilkan page profile
    });
});

route::prefix('/admin')->group(function() {
    Route::get('/Dashboard', function () {
        return "Ini halaman dashboard";
    });
    Route::get('/barang', function () {
        return "Ini halaman barang";
    });
    Route::get('/laporan', function () {
        return "Ini halaman laporan";
    });
    //dengan prefix kita tidak perlu menambahkan route secara satu persatu jadi kita dapat dengan mudah mengelompokkan dengan menggunakan prefix
});

