<div class="w-full fixed left-0 right-0 sm:sticky bottom-0 sm:top-0 z-10 ">
    <nav class="bg-white shadow-sm w-full ">
        <div class="mx-auto ">
            <div class="container px-1 sm:px-4 mx-auto">
                <div class="flex justify-between py-2 px-6">
                    <div>
                        @if( ! $this->hasItemsInOrder($product->id) )
                        <button wire:click="addToCart" wire:loading.attr="disabled" class="disabled:bg-red-500/70 flex flex-row items-center px-3 py-2 bg-red-500 text-white block rounded-lg shadow-lg">
                              <svg wire:loading.class="hidden" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                              </svg>
                              <div class="flex items-center text-white text-xs">
                                <svg wire:loading.class.remove="hidden" class="hidden animate-spin ml-1 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>
                                افزدون به سبد خرید
                                </span>
                              </div>
                        </button> @else
                            <div class="flex">
                                @if ( $this->getItemSelected()->quantity > 1 )
                                <button class="border p-1 rounded-lg border-red-400 bg-red-100/50" wire:click="updateCartItem({{ $this->getItemSelected()->id }}, 'minus')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                    </svg>
                                </button>
                                @else
                                <button class="border p-1 rounded-lg bg-gray-200/50" wire:click="removeFromCart({{ $this->getItemSelected()->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                                @endif
                                <span class="text-sm px-2 py-1 border-1 border-red-200"> {{ $this->getItemSelected()->quantity }} </span>
                                <button class="border p-1 rounded-lg border-red-400 bg-red-100/50" wire:click="updateCartItem({{ $this->getItemSelected()->id }}, 'plus')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </button>
                            </div>

                        @endif

                    </div>
                    <section class="price leading-3 self-center text-center">
                        <p class="block">
                            {{ $product->price }}
                        </p>
                        <small class="text-red-500">تومان</small>
                    </section>

                </div>
            </div>
        </div>
    </nav>
</div>
