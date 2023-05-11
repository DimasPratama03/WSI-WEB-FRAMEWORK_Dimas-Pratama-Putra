<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pegawaiController extends Controller
{
    //untuk menampilkan nama
    public function index($nama){
        return $nama;
    }
    // fungsi dibawah juga sama outputnya seperti diatas
    // public function index(Request $request){
    //     return $request->segment(2);
    // }

    //request menggunakan post
    public function formulir(){
        return view('formulir');
    }
    public function proses(Request $request){
        $messages = [
            'required' => 'Input :attribute wajib diisi!',
            'min' => 'Input :attribute harus diisi minimal :min karakter!',
            'max' => 'Input :attribute harus diisi maksimal :max karakter!',
        ];

        $this->validate($request, [
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha_num'
        ], $messages);
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama : ".$nama.", Alamat : ".$alamat;
    }
}
