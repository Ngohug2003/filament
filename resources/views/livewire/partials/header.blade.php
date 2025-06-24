<header class="sticky top-0 z-50 bg-gradient-to-r from-blue-700 to-purple-800 text-white py-4 shadow-xl">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-4 md:px-8">
        <a href="/" class="flex items-center space-x-3 mb-4 md:mb-0">
            <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight drop-shadow-md">
                {{ config('app.name') }}
            </h1>
        </a>
        <div class="w-full md:w-1/3 flex justify-center md:justify-end">
            <div class="relative w-full max-w-md">
                <input 
                    wire:model.live.debounce.500ms="search"
                    type="search"
                    placeholder="Tìm kiếm tin tức..."
                    class="w-full pl-10 pr-4 py-2 rounded-full bg-white bg-opacity-20 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300" 
                />
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-200" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div>
</header>