<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $name = 'keigo';
        return view('home', ['name' => $name]);
    }
}
