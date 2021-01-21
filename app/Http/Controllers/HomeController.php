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
    public function coafor()
    {
        return view('coafor');
    }
    public function manichiura()
    {
        return view('manichiura');
    }
    public function cosmetica()
    {
        return view('cosmetica');
    }
}
