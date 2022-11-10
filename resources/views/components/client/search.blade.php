<div class="container mt-0 sm:mt-8">
    <div class="w-full p-2">
        <div class="flex justify-between relative">
            <form action="{{ route('home') }}" class="w-full" method="GET">
                <label class="w-full overflow-none">
                    <button type="submit" class="absolute inset-y-0 right-3 flex items-center pl-2 p-1 focus:outline-none focus:shadow-outline">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" class="w-6 h-6"><path
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </label>
                <input autocomplete="off" name="q" type="text" placeholder="نام غذا ، دسته بندی " class="h-11 border border-gray-300 rounded-2xl focus:border-gray-400 w-full focus:outline-none pr-12 text-sm">
            </form>
        </div>
    </div>
</div>
