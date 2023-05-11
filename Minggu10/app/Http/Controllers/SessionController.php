<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //Create Session
    public function create(Request $request) {
        $request->session()->put('nama','Dimas Pratama Putra');
        echo "Data Telah Ditambahkan Ke Session.";
    }

    //Show Session
    public function show(Request $request) {
        if($request->session()->has('nama')){
            echo $request->session()->get('nama');
        }else{
            echo "Tidak Ada Data Dalam Session";
        }
    }

    //Delete Session
    public function delete(Request $request) {
        $request->session()->forget('nama');
        echo "Data Telah Dihapus dari session";
    }
}
