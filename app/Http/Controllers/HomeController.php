<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('home');
    }

    public function despreNoi()
    {
        return view('about');
    }
}
