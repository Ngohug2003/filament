<nav wire:poll.keep-alive.2s class="bg-gray-900 text-white py-3 shadow-inner z-40">
    <div
        class="container mx-auto flex flex-wrap justify-center md:justify-start space-x-4 md:space-x-8 px-4 md:px-8 text-lg font-medium">
        <a wire:navigate href="/"
                class="hover:text-blue-400 transition duration-300 ease-in-out hover:scale-105 py-1">
               Trang chủ
            </a>
        @foreach ($categorys as $category)
        <a wire:navigate href="{{ route('category.posts', ['slug' => $category->slug]) }}"
            class="hover:text-blue-400 transition duration-300 ease-in-out hover:scale-105 py-1">
            {{ $category->name }}
         </a>
        @endforeach
        <a wire:navigate href="{{ route('contact') }}"
        class="hover:text-blue-400 transition duration-300 ease-in-out hover:scale-105 py-1">
       Liên hệ
    </a>
    </div>
</nav>
