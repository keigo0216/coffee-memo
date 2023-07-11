<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // HomeControllerスクリプト内で$coffee_dataリストに入れたサンプルデータを、Home.blade.phpに表示させる。
        $coffee_data =[
            'coffee_name' => 'STAND by OVERCOFFEE',
            'evaluation' => 5,
            'date' => '2021-01-01',
            'img' => 'storage/sample/IMG_2492.jpg'
        ];
        return view('home', ['coffee_data' => $coffee_data]);
    }
}
