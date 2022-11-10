<div class="container mt-0 sm:mt-8">
    <div class="w-full p-2">
        @if ($content->count() > 0)
        <button wire:click="clearCart" class="rounded-lg flex block border border-red-500 text-center p-2 text-sm m-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
           <span class="text-red-500 text-xs tracking-tighter">
               حذف همه
           </span>
         </button>
        <ol class="mb-2">
            @foreach ($content as $id => $item)
            <li class="relative flex mb-2 bg-white border border-gray-300/50 shadow-lg p-2 rounded-lg mx-2">
                <img src="{{ asset($item->product->image) }}" class="object-cover w-20 h-20 rounded-lg shadow-md self-center" alt="">
                <section class="py-1 px-2 w-64 ">
                    <h2 class=" font-medium text-sm text-gray-500 leading-tight truncate">
                        <a href="{{ route('product.show', $item->product) }}">
                            {{ $item->product->title }}
                        </a>
                    </h2>
                    <p class="text-md">{{ $item->product->price }}
                        <small class="text-red-500">تومان</small>
                    </p>
                    <div class="flex p-2 m-2">
                        @if ( $item->quantity > 1 )
                        <button class="border p-1 rounded-lg border-red-400 bg-red-100/50" wire:click="updateCartItem({{ $item->id }}, 'minus')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </button>
                        @else
                        <button class="border p-1 rounded-lg bg-gray-200/50" wire:click="removeFromCart({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                        @endif
                        <span class="text-sm px-2 py-1 border-1 border-red-200"> {{ $item->quantity }} </span>
                        <button class="border p-1 rounded-lg border-red-400 bg-red-100/50" wire:click="updateCartItem({{ $item->id }}, 'plus')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                    </div>
                </section>
                <div wire:loading.class.remove="hidden" class="hidden right-0 flex items-center justify-center backdrop-blur-sm bg-gray-200/50 absolute w-full h-full top-0">
                    <svg class="animate-spin ml-1 mr-3 h-7 w-7 text-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-dark text-sm font-medium">
                        درحال بارگذاری ...
                    </span>
                </div>
            </li>
            @endforeach
        </ol>

        <div class="w-full text-sm mb-3">
            <div class="flex justify-between py-4 px-3">
                <div>
                    <p class="font-bold">
                        مبلغ قابل پرداخت
                    </p>
                </div>
                <div>
                    {{ number_format( $total ) }}
                    تومان
                </div>
            </div>
        </div>
        <button wire:click="storeOrder" class="w-full block text-center bg-rose-600 rounded-lg text-white py-3 text-sm shadow-lg">
            تکمیل خرید و پرداخت
        </button> @else
        <div class="flex justify-center">
            <div class="flex flex-col py-10 opacity-30">
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                </div>
                <div class="text-gray-900 text-lg">
                    سبد خرید خالی می باشد
                </div>
            </div>
        </div>

        @endif
    </div>
</div>
