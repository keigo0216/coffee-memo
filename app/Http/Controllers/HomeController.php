<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coffee;
use InterventionImage;
use App\Models\BinaryImage;

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
        $binary_image = new BinaryImage;


        // formで送られてきた画像を変数に格納
        $coffee_img = $request->file('coffee_img');
        // 画像の名前を取得
        $img_name = $coffee_img->getClientOriginalName();
        // アスペクト比を維持したまま、画像のサイズを変更
        $img = InterventionImage::make($coffee_img)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        // 画像をbase64でエンコードして、coffee_idと共に保存
        $img_base64=$img->encode('data-url');
        
        $form = $request->all();
        $form['user_id'] = Auth::id();
        unset($form['_token']);
        $coffee->fill($form)->save();

        $binary_image->fill(['user_id' => Auth::id(), 'coffee_id' => $coffee->id, 'image' => $img_base64])->save();


        return redirect('/list');
    }

    // コーヒーの詳細画面
    public function coffeeedit($id)
    {
        $coffee = Coffee::find($id);
        // countriesテーブル、brewing_methodsテーブル、way_to_drinksテーブルのidを、それぞれのテーブルのnameに変換
        $country = $coffee->country->name;
        $brewing_method = $coffee->brewing_method->name;
        $way_to_drink = $coffee->way_to_drink->name;
        return view('coffeeedit', ['coffee' => $coffee, 'country' => $country, 'brewing_method' => $brewing_method, 'way_to_drink' => $way_to_drink]);
    }
}
