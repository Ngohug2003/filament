<div>
    <aside wire:poll.keep-alive.2s class="md:col-span-1 space-y-8">
        
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4 border-b border-gray-300 pb-2">Tin tức phổ biến</h3>
            <ul class="space-y-3">
                @foreach ($getViews as $key => $item)
                    <li>
                        <a wire:navigate wire:key="{{ $item->id }}"
                            href="{{ route('post.show', ['slug' => $item->slug]) }}"
                            class="block hover:text-blue-600 text-gray-700">
                            {{ $key + 1 }}. {{ $item->title }}
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4 border-b border-gray-300 pb-2">Chuyên mục</h3>
            <div class="flex flex-wrap gap-2">
                @php
                    $colors = [
                        'bg-blue-100 text-blue-800 hover:bg-blue-200',
                        'bg-green-100 text-green-800 hover:bg-green-200',
                        'bg-purple-100 text-purple-800 hover:bg-purple-200',
                        'bg-pink-100 text-pink-800 hover:bg-pink-200',
                        'bg-yellow-100 text-yellow-800 hover:bg-yellow-200',
                    ];
                @endphp
                <div class="flex flex-wrap gap-2">
                    @foreach ($category as $index => $item)
                        <a wire:navigate wire:key="{{ $item->id }}" href="{{ route('category.posts', ['slug' => $item->slug]) }}"
                            class="{{ $colors[$index % count($colors)] }} px-3 py-1 rounded-full text-sm">
                            {{ $item->name }}
                        </a>
                    @endforeach
                </div>

            </div>
        </div>

        <div
            class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 text-center h-48 flex justify-center items-center bg-gray-200 text-gray-600 font-semibold">
            KHU VỰC QUẢNG CÁO 300x250
        </div>
    </aside>
</div>
