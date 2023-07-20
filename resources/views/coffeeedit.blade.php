@extends('layouts.common')

@section('title', 'コーヒー編集画面')
@include('layouts.head')
@include('layouts.header')
@section('content')
    <h1>detail</h1>
    <p>店名:{{ $coffee->shop }}</p>
    <p>評価値:{{ $coffee->evaluation}}</p>
    <p>{{$coffee->date}}</p>
    <!-- binary_imageテーブルのimageカラムに格納されている画像がnullではない場合、画像を表示する。 -->
    @if($coffee->binary_image && $coffee->binary_image->image != null)
        <img src="{{ $coffee->binary_image->image }}" alt="coffee_image" class="w-full h-full object-contain">
    @else
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path d="M88 0C74.7 0 64 10.7 64 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C120.5 112.3 128 119.9 128 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C119.5 47.7 112 40.1 112 24c0-13.3-10.7-24-24-24zM32 192c-17.7 0-32 14.3-32 32V416c0 53 43 96 96 96H288c53 0 96-43 96-96h16c61.9 0 112-50.1 112-112s-50.1-112-112-112H352 32zm352 64h16c26.5 0 48 21.5 48 48s-21.5 48-48 48H384V256zM224 24c0-13.3-10.7-24-24-24s-24 10.7-24 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C232.5 112.3 240 119.9 240 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C231.5 47.7 224 40.1 224 24z"/>
        </svg>
    @endif
    <p>抽出方法:{{ $brewing_method }}</p>
    <p>国:{{ $country }}</p>
    <p>飲み方:{{ $way_to_drink }}</p>
    <p>名前:{{ $coffee->name }}</p>
    <p>ロースト度合い:{{ $coffee->roast_level }}</p>
    <p>香りの強さ:{{ $coffee->scent_level }}</p>
    <p>苦味の強さ:{{ $coffee->bitterness_level }}</p>
    <p>酸味の強さ:{{ $coffee->acidity_level }}</p>
    <p>甘みの強さ:{{ $coffee->sweetness_level }}</p>
    <p>透明度:{{ $coffee->clearness_level }}</p>
    <p>コクの強さ:{{ $coffee->rich_level }}</p>
    <p>余韻の長さ:{{ $coffee->aftertaste_level }}</p>
    <p>冷めても美味しい:{{ $coffee->aftercooled_level }}</p>
    <p>メモ:{{ $coffee->note }}</p>
    <hr>
@endsection