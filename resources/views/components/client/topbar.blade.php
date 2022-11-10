<div class="container p-2 sm:mt-8 @if(\Request::route()->getName() == " single ") absolute sm:static top-0 @endif">
    <div class="w-full">
        <div class="flex justify-between gap-3 top-bar">
            <livewire:count-cart>
            <div class="page-header self-center font-bold">
                <h1>سبد خرید</h1>
            </div>
            <div class="self-center">
                @if(\Request::route()->getName() == "single")
                <div class="self-center border-2 border-white rounded-lg ">

                    <span class="">
                <a href="" class="px-1 py-3 text-center block ">
                    <svg class="w-3" id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.5 22.5"
                         style="enable-background:new 0 0 22.5 22.5"><style>.st5 {
                                fill: #fff;
                            }</style><path id="Path_6" class="st5"
                                           d="M15.6 22.3c.5.0.9-.4.9-.9.0-.2-.1-.5-.3-.6l-7.9-8c-.8-.8-.8-2.1.0-2.9l7.9-8c.4-.4.3-.9.0-1.3-.4-.4-.9-.3-1.3.0l-7.9 8c-1.5 1.5-1.5 3.9.0 5.4l7.9 8C15.1 22.2 15.4 22.3 15.6 22.3z"/></svg>
                </a>
                    </span>
                </div>
                @else
                <span>
                    <a href="{{ route('home') }}" class="logo text-rose-600">
                        Garsonman
                    </a>
                </span> @endif
            </div>
        </div>
    </div>
</div>
