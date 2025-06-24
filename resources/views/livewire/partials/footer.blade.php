<footer class="bg-gray-900 text-gray-400 py-8 mt-12 shadow-inner">
    <div class="container mx-auto text-center px-4 md:px-8">
        <p class="text-md">&copy; {{ date('Y') }} <span
                class="font-semibold text-white">{{ config('app.name') }}</span>. All rights reserved.</p>
        <p class="text-sm mt-3 leading-relaxed">
            Nguồn thông tin đáng tin cậy cho mọi người.
        </p>
        <div class="flex justify-center space-x-6 mt-4">
            <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33V22H12c5.523 0 10-4.477 10-10Z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M20.244 6.425c-.75.333-1.55.556-2.385.65.865-.518 1.529-1.336 1.841-2.317-.808.479-1.7.828-2.652 1.015C16.326 4.673 15.253 4 14.07 4c-2.314 0-4.19 1.876-4.19 4.19 0 .328.037.645.109.95C6.541 8.878 3.447 7.23 1.34 4.542c-.358.614-.564 1.328-.564 2.09 0 1.45.738 2.73 1.86 3.486-.683-.022-1.325-.209-1.886-.519v.053c0 2.037 1.452 3.738 3.378 4.122-.354.096-.728.148-1.114.148-.273 0-.537-.026-.795-.076.536 1.675 2.091 2.89 3.935 2.923C9.117 19.531 7.29 20 5.25 20c-.347 0-.687-.02-.102-.006.35 0 .698-.01.996-.026 1.936.634 4.013.996 6.13.996 7.355 0 11.36-6.096 11.36-11.36 0-.173-.004-.345-.01-.516.78-.563 1.455-1.268 1.99-2.072Z" />
                </svg>
            </a>
        </div>
        <nav class="mt-4 text-sm">
            <ul class="flex justify-center space-x-6">
                <li><a href="/about" class="hover:underline text-gray-400 hover:text-white">Về chúng tôi</a></li>
                <li><a href="/contact" class="hover:underline text-gray-400 hover:text-white">Liên hệ</a></li>
                <li><a href="/privacy" class="hover:underline text-gray-400 hover:text-white">Chính sách bảo mật</a>
                </li>
                <li><a href="/terms" class="hover:underline text-gray-400 hover:text-white">Điều khoản sử dụng</a>
                </li>
            </ul>
        </nav>
    </div>
</footer>