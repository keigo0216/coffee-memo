<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coffee;
use InterventionImage;

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

        // 画像を保存先パス
        $dir = 'coffee_image';
        // formで送られてきた画像を変数に格納
        $coffee_img = $request->file('coffee_img');
        // 画像の名前を取得
        $img_name = $coffee_img->getClientOriginalName();
        // アスペクト比を維持したまま、画像のサイズを変更
        $img = InterventionImage::make($coffee_img)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path() . '/app/public/' . $dir . '/' . $img_name);

        $form = $request->all();
        $form['user_id'] = Auth::id();
        unset($form['_token']);
        
        // 画像のパスをDBに保存
        $form['img'] = 'storage/' . $dir . '/' . $img_name;

        $coffee->fill($form)->save();
        return redirect('/list');
    }
}
