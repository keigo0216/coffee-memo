<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function list()
    {
        // HomeControllerスクリプト内で$coffee_dataリストに入れたサンプルデータを、Home.blade.phpに表示させる。
        $coffee_data =[
            'coffee_name' => 'STAND by OVERCOFFEE',
            'evaluation' => 5,
            'date' => '2021-01-01',
            'img' => 'storage/sample/IMG_2492.jpg'
        ];
        return view('list', ['coffee_data' => $coffee_data]);
    }
}
