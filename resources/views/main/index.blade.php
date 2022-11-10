@extends('main.layouts.base') @section('styles')
<link rel="stylesheet" href="{{ asset('main/styles/swiper-bundle.min.css') }}"> @endsection @section('content') @include("components.client.topbar") @include("components.client.search")


<div class="container mt-0 sm:mt-8 sticky top-0 bg-white drop-shadow-md z-30 pb-2 right-0">
    <div class="w-full p-2">
        <div class="swiper">
            <div class="flex items-center px-5 py-3">
                <h2 class="font-medium text-base ml-auto">
                    دسته بندی
                </h2>
                <button id="sw-button-next" class="px-1 py-1 border border-gray-300 rounded bg-[#E6F3FF] text-[#3160D8]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
                <button id="sw-button-prev" class="px-1 py-1 mr-2 border border-gray-300 rounded bg-[#E6F3FF] text-[#3160D8]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
            </div>
            <div class="swiper-wrapper">
                @if(!empty($categories)) @foreach($categories as $category)
                <div class="swiper-slide">
                    <a href="{{ route('product.category', $category) }}">
                        <div class="w-full p-1 border border-gray-300 rounded-md">
                            <p class="text-gray-500 leading-5 text-sm text-center">{{$category->name}}</p>
                        </div>
                    </a>
                </div>
                @endforeach @endif
            </div>
        </div>
    </div>
</div>
<div class="container mt-0 sm:mt-2">
    <div class="w-full p-2">
        @if($products->count())
        <div class="px-5 py-3">
            <h2 class="font-medium text-base ml-auto">
                لیست غذا
            </h2>
        </div>
        <div class="grid grid-cols-1 gap-2">
            @foreach($products as $product) @include('components.client.card') @endforeach
        </div>
        @else
        <div class="flex justify-center">
            <div class="flex flex-col py-10 opacity-40">
                <div class="self-center">
                    <svg class="w-28 h-28" viewBox="0 0 64 41" xmlns="http://www.w3.org/2000/svg">
                        <g transform="translate(0 1)" fill="none" fill-rule="evenodd">
                        <ellipse class="bg-gray-100" cx="32" cy="33" rx="32" ry="7"></ellipse>
                        <g class="stroke-gray-700" fill-rule="nonzero"><path d="M55 12.76L44.854 1.258C44.367.474 43.656 0 42.907 0H21.093c-.749 0-1.46.474-1.947 1.257L9 12.761V22h46v-9.24z"></path><path d="M41.613 15.931c0-1.605.994-2.93 2.227-2.931H55v18.137C55 33.26 53.68 35 52.05 35h-40.1C10.32 35 9 33.259 9 31.137V13h11.16c1.233 0 2.227 1.323 2.227 2.928v.022c0 1.605 1.005 2.901 2.237 2.901h14.752c1.232 0 2.237-1.308 2.237-2.913v-.007z" class="ant-empty-img-simple-path"></path></g></g></svg>
                </div>
                <div class="text-gray-900 text-lg ">
                    محصولی پیدا نشد
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection @section('scripts')
<script src="{{ asset('main/javascripts/swiper-bundle.min.js') }}"></script>
<!-- Initialize Swiper -->
<script type="module">
    var swiper = new Swiper('.swiper', { slidesPerView : 'auto', freeMode: true, spaceBetween: 10, navigation: { nextEl: '#sw-button-next', prevEl: '#sw-button-prev'} });
</script>
@endsection
