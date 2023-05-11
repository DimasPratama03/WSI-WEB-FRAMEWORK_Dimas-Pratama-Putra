<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller\frontend;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home');
    }
}
