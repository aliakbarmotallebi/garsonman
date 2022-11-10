<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>وب آپ منو رستوران گارسون من</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('main/styles/index.css') }}">
</head>

<body class="antialiased" x-data="{ isOpen : false}">
    <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto py-8 sm:mb-5 mb-2">
        <div class="header-wrapper flex items-center justify-between">
            <div class="toggle md:hidden">
                <button @click=" isOpen = true" @keydown.escape=" isOpen = false">
                    <svg class="h-6 w-6 fill-current text-black" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <div class="header-logo">
                <h1 class="font-semibold leading-relaxed text-rose-600"><a href="">گارسون من</a></h1>
            </div>

            <nav class="hidden md:block ">
                <ul class="flex space-x-4 flex-row-reverse text-sm p-4">
                    <li>
                        @if(!auth()->check())
                        <a href="{{ url('login') }}" class="px-3 py-2 border-red-600 bg-red-500 rounded text-white border">
                            ورود به گارسون من</a>
                        @else
                        <a href="{{ url('dashboard/index') }}" class="px-3 py-2 border-red-600 bg-red-500 rounded text-white border">
                            پنل مدیریت</a>
                        @endif
                    </li>
                    <li>
                        <a href="#" class="px-3 py-2 text-red-600 pb-2">درباره ما</a>
                    </li>

                </ul>
            </nav>

        </div>
    </div>
    <div class="hero py-4">
        <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
            <div class="hero-wrapper grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <div class="hero-text col-span-6">
                    <h1 class=" font-bold text-4xl md:text-5xl max-w-xl text-gray-900 leading-tight">با گارسون من به قلب غذا نفوذ کن !</h1>
                    <hr class=" w-12 h-1 bg-rose-600 rounded-full mt-8">
                    <p class="text-gray-500 text-base leading-8	 mt-8 font-semibold text-justify">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                        باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت
                        می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                    </p>
                    <div class="get-app mt-10 justify-center md:justify-start">
                        <div class="w-full flex items-center justify-center py-2 px-1 sm:py-4 sm:px-2 text-center gap-2">
                           <div class="flex items-center justify-center px-2 py-3 rounded-md shadow-md border border-gray-100">
                                <div class="shadow-lg bg-sky-500 shadow-sky-500 p-3 rounded-md inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 text-white" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                                    </svg>
                                </div>
                                <div class="px-4 whitespace-nowrap text-sm font-normal text-gray-500 inline-block">
                                    <div class="text-base font-semibold text-gray-900">شماره تماس پشتیبانی</div>
                                    <div class="text-sm font-normal text-gray-500">0922-389-9180</div>
                                </div>
                           </div>


                           <div class="flex items-center justify-center px-2 py-3 rounded-md shadow-md border border-gray-100">
                                <div class="shadow-lg bg-green-500 shadow-green-500 p-3 rounded-md inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 text-white" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                      </svg>
                                </div>
                                <div class="px-4 whitespace-nowrap text-sm font-normal text-gray-500 inline-block">
                                    <div class="text-base font-semibold text-gray-900">شماره تماس فروش آپ</div>
                                    <div class="text-sm font-normal text-gray-500" >0901-910-6223</div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="hero-image col-span-6 relative">

                    <img src="{{ asset('images/Group1@2x.png') }}" class="w-44 sm:w-60 z-50  absolute top-1/2 left-1/2 -translate-y-1/2  -translate-x-1/2 gm-mobile__image " alt="">
                    <div class="border-2 border-rose-100 p-6 m-auto w-96 h-96  sm:w-[450px] sm:h-[450px] rounded-full">
                        <div class="w-full h-full bg-rose-100  rounded-full relative">
                            <span class="absolute w-12 h-12 top-6 right-2 bg-gray-800  rounded-full text-center leading-[3rem]">
                                <p class="text-white">پیتزا</p>
                            </span>
                            <span class="absolute w-12 h-12 bottom-6 left-6 bg-gray-800  rounded-full text-center leading-[3rem]">
                                <p class="text-white">🍔</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-navbar">
        <div class="navbar-wrapper fixed top-0 right-0 h-full bg-white z-50 w-64 shadow-lg p-5 " x-show="isOpen" @click.away=" isOpen = false" x-transition:enter="transition duration-300 ml-64" x-transition:enter-start="transform translate-x-64" x-transition:enter-end=""
            x-transition:leave="transition duration-300" x-transition:enter-start="" x-transition:leave-end="transform translate-x-64">
            <div class="close">
                <button class="absolute top-0 right-0 mt-4 mr-4" @click=" isOpen = false">
                    <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <ul class="divide-y">
                <li><a href="#" class="my-4 inline-block active font-bold">درباره ما</a></li>

                <li>
                    @if(!auth()->check())
                    <a href="{{ url('login') }}" class=" my-8 w-full text-center cta inline-block bg-rose-600 hover:bg-orange-600 px-3 py-2 rounded text-white font-normal">
                        ورود به گارسون من</a>
                    @else
                    <a href="{{ url('dashboard/index') }}" class=" my-8 w-full text-center cta inline-block bg-rose-600 hover:bg-orange-600 px-3 py-2 rounded text-white font-normal">
                        پنل مدیریت</a>
                    @endif
                </li>
            </ul>
            <div class="follow">
                <p class=" italic font-semibold">مارو دنبال کنید</p>
                <div class="social flex space-x-5 mt-4 ">
                    <a href="#">
                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="h-5 w-5 fill-current text-gray-600" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                    </a>
                    <a href="#">
                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="h-5 w-5 fill-current text-gray-600" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
</body>

</html>
