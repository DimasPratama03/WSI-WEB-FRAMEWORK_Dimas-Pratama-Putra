<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendidikanController extends Controller
{   // menampilkan data
    public function index (){
        $pendidikan = Pendidikan::get();
        return view('backend.pendidikan.index',compact('pendidikan'));
    }
    //menambah data
    public function create (){
        $pendidikan = null;
        return view('backend.pendidikan.index',compact('pendidikan'));
    }
    public function store (Request $request){
        Pendidikan::create($request->all());
        return redirect()->route('pendidikan.index')
                        ->with('success','Data Pendidikan baru telah selesai disimpan');
    }
    //menghapus data
    public function destroy($id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();
        return redirect()->route('pendidikan.index')
                        ->with('success', 'Data Pendidikan telah dihapus');
    }
    //mengedit data
    public function edit($id)
    {
        $pendidikan = Pendidikan::find($id);
        return view('backend.pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->update($request->all());
        return redirect()->route('pendidikan.index')
                        ->with('success', 'Data Pendidikan telah diperbarui');
    }
}
