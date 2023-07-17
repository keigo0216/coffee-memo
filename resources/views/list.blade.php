    @extends('layouts.common')

    @section('title', 'コーヒー一覧画面')
    
    @include('layouts.head')
    @include('layouts.header')
    @section('content')

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            @foreach ($coffees as $coffee)
            <div class="flex flex-col items-center">
                <div class="w-full h-32">
                    <a href="{{ route('coffeeedit', ['id'=>$coffee->id]) }}" class="">
                        <img src="{{ asset($coffee->img) }}" alt="coffee_image" class="w-full h-full object-contain">
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
            @endforeach
        </div>
    @endsection