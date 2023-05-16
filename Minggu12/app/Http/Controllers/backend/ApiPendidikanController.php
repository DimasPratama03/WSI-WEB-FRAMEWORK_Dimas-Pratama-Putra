<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAall()
    {
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan, 201);
    }
}
