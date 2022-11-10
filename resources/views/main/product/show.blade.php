@extends('main.layouts.base') @section('content')
<section class="max-w-sm mx-auto">
    @if($product->isPublished())
    <livewire:product-component :product="$product">
    @endif
        @include("components.client.topbar")
        <div class="container mt-0 sm:mt-8">
            <div class="w-full relative">
                <img src="{{ asset($product->image) }}" class="shadow-lg  sm:rounded-xl w-full sm:w-xl m-auto h-[250px] sm:h-auto " alt="">
                <div class="absolute top-5 left-5">
                    <div class="flex items-center">
                        <span class="text-yellow-500">
                            {{ floor($product->ratingPercent()) }}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                          </svg>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white translate-y-[-30px]  rounded-3xl">
                <div class="w-full sm:mt-8 p-4 text-justify ">
                    <div class="flex justify-between">
                        <section class="self-center leading-8">
                            <h1 class="font-bold text-lg">
                                {{ $product->title }}
                            </h1>
                        </section>
                    </div>
                    <p class="text-gray-500 text-xs mt-1">
                        {{ $product->category->name }}
                    </p>
                </div>
                <div class="container mt-0 sm:mt-8">
                    <div class="w-full p-4">
                        <div class="page-header pb-1 border-b-2 border-slate-100">
                            <h3 class="text-[18px] font-bold">توضیحات</h3>
                        </div>
                        <section class="description py-3 text-justify text-sm text-gray-500 leading-7">
                            {!! $product->description !!}
                        </section>

                    </div>
                </div>
            </div>

        </div>
        <div class="py-4 px-2 w-full flex justify-center items-center flex-col mb-5">
            <h4 class="text-gray-900 text-center font-bold ">حستون به این غذا چطور بود ؟‌</h4>
            <div class="text-center">
                <livewire:star-component :product="$product" />
            </div>
        </div>
</section>
@endsection
