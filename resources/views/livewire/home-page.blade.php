<div>

    {{-- C:\xampp\htdocs\hexigon_filament\resources\views\livewire\home-page.blade.php --}}
    <main class="flex-grow container mx-auto py-10 px-4 md:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-8">
            {{-- Nếu có từ khóa tìm kiếm --}}
            @if ($search)
                <section class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 border-b pb-2">Kết quả tìm kiếm cho:
                        "{{ $search }}"</h2>

                    @forelse ($searchResults as $post)
                        <div
                            class="col-span-1 md:col-span-2 lg:col-span-1 bg-gray-50 rounded-lg shadow-md overflow-hidden transform hover:scale-[1.01] transition duration-300">
                            <img src="{{ Storage::url($post->featured_image) }}" alt="Tin nổi bật"
                                class="w-full h-56 object-cover">
                            <div class="p-4">
                                <span
                                    class="text-xs font-semibold text-blue-600 uppercase">{{ $post->category->name }}</span>
                                <h3 class="text-xl font-bold mt-2 leading-tight">
                                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}"
                                        class="hover:text-blue-700 transition duration-200">{{ $post->title }}</a>
                                </h3>
                                <p class="text-gray-600 text-sm mt-2 line-clamp-3">
                                    {{ Str::words(strip_tags(html_entity_decode($post->content)), 20, '...') }}
                                </p> <span class="text-gray-500 text-xs mt-3 block">20/06/2025 - Bởi Tác giả A</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Không tìm thấy kết quả phù hợp.</p>
                    @endforelse
                </section>
            @else
                {{-- Tin tức nổi bật --}}
                <section class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-2 border-blue-500 pb-2">Tin tức nổi bật
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Bài nổi bật chính -->
                        @foreach ($featuredPosts as $featuredPost)
                            <div
                                class="col-span-1 md:col-span-2 lg:col-span-1 bg-gray-50 rounded-lg shadow-md overflow-hidden transform hover:scale-[1.01] transition duration-300">
                                <img src="{{ Storage::url($featuredPost->featured_image) }}" alt="Tin nổi bật"
                                    class="w-full h-56 object-cover">
                                <div class="p-4">
                                    <span
                                        class="text-xs font-semibold text-blue-600 uppercase">{{ $featuredPost->category->name }}</span>
                                    <h3 class="text-xl font-bold mt-2 leading-tight">
                                        <a href="{{ route('post.show', ['slug' => $featuredPost->slug]) }}"
                                            class="hover:text-blue-700 transition duration-200">{{ $featuredPost->title }}</a>
                                    </h3>
                                    <p class="text-gray-600 text-sm mt-2 line-clamp-3">
                                        {{ Str::words(strip_tags(html_entity_decode($featuredPost->content)), 20, '...') }}
                                    </p> <span class="text-gray-500 text-xs mt-3 block">20/06/2025 - Bởi Tác giả
                                        A</span>
                                </div>
                            </div>
                        @endforeach

                        <!-- Bài nổi bật nhỏ -->
                        <div class="grid grid-cols-1 gap-4 lg:col-span-1">
                            <div
                                class="flex bg-gray-50 rounded-lg shadow-md overflow-hidden transform hover:scale-[1.01] transition duration-300">
                                <img src="https://via.placeholder.com/120x80/FFC0CB/FFFFFF?text=Tin+Nổi+Bật+2"
                                    alt="Tin nhỏ 1" class="w-24 h-24 object-cover flex-shrink-0">
                                <div class="p-3">
                                    <h4 class="text-base font-semibold leading-tight">
                                        <a href="#" class="hover:text-blue-700 transition duration-200">Tin nổi
                                            bật thứ hai rất đáng chú ý</a>
                                    </h4>
                                    <span class="text-gray-500 text-xs mt-1 block">19/06/2025</span>
                                </div>
                            </div>
                            <div
                                class="flex bg-gray-50 rounded-lg shadow-md overflow-hidden transform hover:scale-[1.01] transition duration-300">
                                <img src="https://via.placeholder.com/120x80/90EE90/FFFFFF?text=Tin+Nổi+Bật+3"
                                    alt="Tin nhỏ 2" class="w-24 h-24 object-cover flex-shrink-0">
                                <div class="p-3">
                                    <h4 class="text-base font-semibold leading-tight">
                                        <a href="#" class="hover:text-blue-700 transition duration-200">Câu chuyện
                                            cảm động về cộng đồng</a>
                                    </h4>
                                    <span class="text-gray-500 text-xs mt-1 block">18/06/2025</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Tin tức mới nhất --}}
                <section class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-2 border-blue-500 pb-2">Tin tức mới nhất
                    </h2>
                    @foreach ($latestPosts as $latestPost)
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4 pb-4 border-b border-gray-200 last:border-b-0">
                                <img src="{{ Storage::url($latestPost->featured_image) }}"
                                    alt="{{ $latestPost->title }}"
                                    class="w-32 h-20 object-cover rounded-lg flex-shrink-0">
                                <div>
                                    <span
                                        class="text-xs font-semibold text-purple-600 uppercase">{{ $latestPost->category->name }}</span>
                                    <h3 class="text-lg font-bold leading-tight mt-1">
                                        <a href="{{ route('post.show', ['slug' => $latestPost->slug]) }}" class="hover:text-blue-700 transition duration-200">
                                            {{ $latestPost->title }}</a>
                                    </h3>
                                    <p class="text-gray-600 text-sm mt-1 line-clamp-2">
                                        {{ Str::words(strip_tags(html_entity_decode($latestPost->content)), 20, '...') }}
                                    </p>
                                    <span class="text-gray-500 text-xs mt-2 block"></span>
                                </div>
                            </div>
                            <!-- Thêm các bài tin khác ở đây -->
                        </div>
                    @endforeach

                </section>
            @endif
        </div>

        {{-- Sidebar --}}
        @livewire('aside')
    </main>
</div>
