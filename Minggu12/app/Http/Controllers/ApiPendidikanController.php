<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getPen($id)
    {
        $pendidikan = Pendidikan::find($id);
        return Response::json($pendidikan,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createPen(Request $request)
    {
        Pendidikan::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan Berhasil ditambahkan!'
        ], 201); 
    }

    /**
     * Display the specified resource.
     */
    public function updatePen($id, Request $request)
    {
        Pendidikan::find($id)->update($request->all());
        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan Berhasil diubah!'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletePen($id)
    {
        Pendidikan::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan Berhasil dihapus!'
        ], 201);

    }
}
