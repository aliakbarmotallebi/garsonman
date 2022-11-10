<a href="{{ route('product.show', $product) }}" class="relative mb-5">
    <div class="before:pt-5 before:block before:w-full relative block ">
        <div class="">
            <img class="rounded-md object-cover" src="{{ asset($product->image) }}">
        </div>
        @if($product->isUNPublished())
        <span class="z-10 absolute top-8 left-2 text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-500/50 text-white rounded">
            ناموجود
        </span>
        @endif
    </div>
    <div class="relative px-4 -mt-16">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <div class="flex items-baseline">
                <span class="inline-block bg-teal-200 text-teal-800 text-xs px-2 rounded-full uppercase font-semibold tracking-wide">
                    {{ $product->category->name }}
                </span>
            </div>
            <h4 class="mt-2 font-semibold text-lg leading-tight truncate">
                {{$product->title}}
            </h4>

            <div class="mt-2 flex items-center justify-between">
                <div class="ml-2 text-gray-600 text-lg font-semibold">
                    <p>{{$product->price}}<span class="text-red-500 text-xs"> تومان  </span></p>
                </div>

                <div class="flex justify-between items-center">
                    <div>
                        {{ floor($product->ratingPercent()) }}
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </span>
            </div>
        </div>
    </div>

</a>
