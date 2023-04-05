<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    public function index()
    {
        $nama = "Dimas Pratama Putra";
        $matkul = ["Workshop Sistem Informasi Web Framework", "Workshop Mobile Applications", "Literasi Digital"];
        return view('home', compact('nama', 'matkul'));
    }
    public function create()
    {
        return "Method ini nantinya akan digunakan untuk menampilkan form untuk menambahkan data user.";
    }
    public function store(Request $request)
    {
        return "Method ini nantinya akan digunakan untuk menampilkan menciptakan data user baru.";
    }
    public function show($id)
    {
        return "Method ini nantinya akan digunakan untuk mengambil satu data user dengan id = " . $id;
    }
    public function edit($id)
    {
        return "Method ini nantinya akan digunakan untuk menampilkan form untuk mengubah data edit dengan id = " . $id;
    }
    public function update(Request $request, $id)
    {
        return "Method ini nantinya akan digunakan untuk menengubah data user dengan id = " . $id;
    }
    public function destroy($id)
    {
        return "Method ini nantinya digunakan untuk menghapus data user dengan id = " . $id;
    }
}