<div>
  
    <main class="flex-grow container mx-auto py-10 px-4 md:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="md:col-span-2 space-y-8">

            <section class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-2 border-blue-500 pb-2">Tin tức mới nhất</h2>
  

                <div class="space-y-6">
                    <div class="flex items-start space-x-4 pb-4 border-b border-gray-200 last:border-b-0">
                        <img src="https://via.placeholder.com/150x100/ADD8E6/FFFFFF?text=Tin+Mới" alt="Tin mới"
                            class="w-32 h-20 object-cover rounded-lg flex-shrink-0">
                        <div>
                            <span class="text-xs font-semibold text-purple-600 uppercase">Công nghệ</span>
                            <h3 class="text-lg font-bold leading-tight mt-1">
                                <a href="#" class="hover:text-blue-700 transition duration-200">Công nghệ AI mới
                                    hứa hẹn thay đổi cuộc sống</a>
                            </h3>
                            <p class="text-gray-600 text-sm mt-1 line-clamp-2">Các nhà khoa học vừa công bố một bước đột
                                phá trong lĩnh vực trí tuệ nhân tạo, mở ra nhiều ứng dụng tiềm năng...</p>
                            <span class="text-gray-500 text-xs mt-2 block">20/06/2025 - 14:00</span>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4 pb-4 border-b border-gray-200 last:border-b-0">
                        <img src="https://via.placeholder.com/150x100/FFD700/FFFFFF?text=Tin+Mới" alt="Tin mới"
                            class="w-32 h-20 object-cover rounded-lg flex-shrink-0">
                        <div>
                            <span class="text-xs font-semibold text-red-600 uppercase">Kinh doanh</span>
                            <h3 class="text-lg font-bold leading-tight mt-1">
                                <a href="#" class="hover:text-blue-700 transition duration-200">Thị trường chứng
                                    khoán phục hồi mạnh mẽ sau biến động</a>
                            </h3>
                            <p class="text-gray-600 text-sm mt-1 line-clamp-2">Sau những phiên giao dịch đầy biến động,
                                thị trường đã có dấu hiệu khởi sắc trở lại, mang lại hy vọng cho nhà đầu tư...</p>
                            <span class="text-gray-500 text-xs mt-2 block">20/06/2025 - 13:30</span>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-center">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" aria-current="page"
                            class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">3</a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">10</a>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </section>

            {{-- <div class="bg-white p-8 md:p-10 rounded-2xl shadow-2xl border border-gray-200">
                {{ $slot }}
            </div> --}}
        </div>

        <aside class="md:col-span-1 space-y-8">
            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                <h3 class="text-xl font-bold text-gray-900 mb-4 border-b border-gray-300 pb-2">Tin tức phổ biến</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="block hover:text-blue-600 transition duration-200 text-gray-700">1. Xu
                            hướng công nghệ AI năm 2025</a></li>
                    <li><a href="#" class="block hover:text-blue-600 transition duration-200 text-gray-700">2. Mẹo
                            đầu tư hiệu quả mùa dịch</a></li>
                    <li><a href="#" class="block hover:text-blue-600 transition duration-200 text-gray-700">3.
                            Văn hóa ẩm thực đường phố Hà Nội</a></li>
                    <li><a href="#" class="block hover:text-blue-600 transition duration-200 text-gray-700">4.
                            Thể thao Việt Nam vươn tầm quốc tế</a></li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                <h3 class="text-xl font-bold text-gray-900 mb-4 border-b border-gray-300 pb-2">Chuyên mục</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="/category/thoi-su"
                        class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-blue-200 transition duration-200">Thời
                        sự</a>
                    <a href="/category/kinh-te"
                        class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-green-200 transition duration-200">Kinh
                        tế</a>
                    <a href="/category/giao-duc"
                        class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-purple-200 transition duration-200">Giáo
                        dục</a>
                    <a href="/category/suc-khoe"
                        class="bg-pink-100 text-pink-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-pink-200 transition duration-200">Sức
                        khỏe</a>
                    <a href="/category/du-lich"
                        class="bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-yellow-200 transition duration-200">Du
                        lịch</a>
                    <a href="/category/khoa-hoc"
                        class="bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-red-200 transition duration-200">Khoa
                        học</a>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 text-center flex items-center justify-center h-48 bg-gray-200 text-gray-600 font-semibold">
                KHU VỰC QUẢNG CÁO 300x250
            </div>
        </aside>
    </main>
</div>
