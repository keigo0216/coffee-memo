<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coffee;

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
        // $coffee_data =[
        //     'coffee_name' => 'STAND by OVERCOFFEE',
        //     'evaluation' => 5,
        //     'date' => '2021-01-01',
        //     'img' => 'storage/sample/IMG_2492.jpg'
        // ];
        $user_id = Auth::id();
        $coffees = Coffee::where('user_id', $user_id)->get();

        return view('list', ['coffees' => $coffees]);
    }

    public function coffeeregister()
    {
        return view('coffeeregister');
    }

    public function coffeecreate(Request $request)
    {
        $coffee = new Coffee;

        // 画像を保存
        $dir = 'coffee_image';
        $img_path = $request->file('coffee_img')->getClientOriginalName();
        $request->file('coffee_img')->storeAs('public/' . $dir, $img_path);

        $form = $request->all();
        $form['user_id'] = Auth::id();
        unset($form['_token']);
        
        // 画像のパスをDBに保存
        $form['img'] = 'storage/' . $dir . '/' . $img_path;

        $coffee->fill($form)->save();
        return redirect('/list');
    }
}
