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

        
        $form = $request->all();
        $form['user_id'] = Auth::id();
        unset($form['_token']);
        $coffee->fill($form)->save();

        // formで送られてきた画像を変数に格納
        $coffee_img = $request->file('coffee_img');
        if(empty($coffee_img)){
            return redirect('/');
        }
        $binary_image = new BinaryImage;
        // アスペクト比を維持したまま、画像のサイズを変更
        $img = InterventionImage::make($coffee_img)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        // 画像をbase64でエンコードして、coffee_idと共に保存
        $img_base64=$img->encode('data-url');
        $binary_image->fill(['user_id' => Auth::id(), 'coffee_id' => $coffee->id, 'image' => $img_base64])->save();


        return redirect('/');
    }

    // コーヒーの詳細画面
    public function coffeedetail($id)
    {
        $coffee = Coffee::find($id);
        // countriesテーブル、brewing_methodsテーブル、way_to_drinksテーブルのidを、それぞれのテーブルのnameに変換
        $country = $coffee->country->name ?? null;
        $brewing_method = $coffee->brewing_method->name ?? null;
        $way_to_drink = $coffee->way_to_drink->name ?? null;
        return view('coffeedetail', ['coffee' => $coffee, 'country' => $country, 'brewing_method' => $brewing_method, 'way_to_drink' => $way_to_drink]);
    }

    public function coffeetrash($id)
    {
        $coffee = Coffee::find($id);
        $coffee->delete();
        return redirect('/');
    }

    public function coffeeedit($id)
    {
        $coffee = Coffee::find($id);
        return view('coffeeregister', ['coffee' => $coffee]);
    }

    public function coffeeupdate(Request $request, $id)
    {
        // formで送られてきた情報をcoffeesテーブルとbinary_imagesテーブルに保存
        $coffee = Coffee::find($id);

        $form = $request->all();
        $form['user_id'] = Auth::id();
        unset($form['_token']);
        $coffee->fill($form)->save();

        // formで送られてきた画像を変数に格納
        $coffee_img = $request->file('coffee_img');

        // $coffee_imgが空の場合は、binary_imagesテーブルに保存しない
        if(empty($coffee_img)){
            return redirect('/');
        }
        $binary_image = BinaryImage::where('coffee_id', $id)->first();
        if (empty($binary_image)) {
            $binary_image = new BinaryImage;
        }

        // アスペクト比を維持したまま、画像のサイズを変更
        $img = InterventionImage::make($coffee_img)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        // 画像をbase64でエンコードして、coffee_idと共に保存
        $img_base64=$img->encode('data-url');
        $binary_image->fill(['user_id' => Auth::id(), 'coffee_id' => $coffee->id, 'image' => $img_base64])->save();

        return redirect('/');
    }
}
