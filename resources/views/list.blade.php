    @extends('layouts.common')

    @section('title', 'コーヒー一覧画面')
    
    @include('layouts.head')
    @include('layouts.header')
    @section('content')

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            @forelse ($coffees->reverse() as $coffee)
                <div class="flex flex-col items-center">
                    <div class="w-full h-32">
                        <a href="{{ route('coffeedetail', ['id'=>$coffee->id]) }}" class="">
                            <!-- binary_imageテーブルのimageカラムに格納されている画像がnullではない場合、画像を表示する。 -->
                            @if($coffee->binary_image && $coffee->binary_image->image != null)
                                <img src="{{ $coffee->binary_image->image }}" alt="coffee_image" class="w-full h-full object-contain">
                            @else
                                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M88 0C74.7 0 64 10.7 64 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C120.5 112.3 128 119.9 128 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C119.5 47.7 112 40.1 112 24c0-13.3-10.7-24-24-24zM32 192c-17.7 0-32 14.3-32 32V416c0 53 43 96 96 96H288c53 0 96-43 96-96h16c61.9 0 112-50.1 112-112s-50.1-112-112-112H352 32zm352 64h16c26.5 0 48 21.5 48 48s-21.5 48-48 48H384V256zM224 24c0-13.3-10.7-24-24-24s-24 10.7-24 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C232.5 112.3 240 119.9 240 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C231.5 47.7 224 40.1 224 24z"/>
                                </svg>
                            @endif
                        </a>
                    </div>
                    <p class="text-center w-full h-5 overflow-hidden whitespace-nowrap truncate">{{ $coffee->shop }}</p>

                    <div class="flex flex-row">
                        <div class="flex items-center space-x-0.2">
                            @php
                                $maxStars = 5; // 最大の星の数
                                $filledStars = $coffee->evaluation; // 塗りつぶす星の数
                                $emptyStars = $maxStars - $filledStars; // 塗りつぶさない星の数
                            @endphp

                            @for($i = 0; $i < $filledStars; $i++)
                                <svg class="w-4 h-4 text-amber-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endfor

                            @for($i = 0; $i < $emptyStars; $i++)
                                <svg class="w-4 h-4 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endfor
                        </div>
                        <div class="pl-1">{{$coffee->date}}</div>
                    </div>


                    
                </div>
            @empty
                <p>コーヒーが登録されていません。</p>
            @endforelse
        </div>
    @endsection