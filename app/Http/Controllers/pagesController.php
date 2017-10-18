<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('index');
    }

    public function index()
    {
        return view('index');
    }
}
