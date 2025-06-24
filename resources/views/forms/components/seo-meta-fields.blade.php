<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div class="space-y-6 p-4 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm bg-white dark:bg-gray-800">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tối ưu SEO</h3>

        {{-- Tiêu đề SEO --}}
        <div class="space-y-1">
            <label for="seo_title" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                Tiêu đề SEO
            </label>
            <input
                id="seo_title"
                type="text"
                maxlength="60"
                wire:model.defer="data.seo_title"
                placeholder="Nhập tiêu đề SEO cho bài viết..."
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-900 text-sm"
            />
            <p class="text-xs text-gray-500">Giới hạn 60 ký tự.</p>
        </div>

        {{-- Mô tả SEO --}}
        <div class="space-y-1">
            <label for="seo_description" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                Mô tả SEO
            </label>
            <textarea
                id="seo_description"
                rows="3"
                maxlength="160"
                wire:model.defer="data.seo_description"
                placeholder="Nhập mô tả SEO cho bài viết..."
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-900 text-sm"
            ></textarea>
            <p class="text-xs text-gray-500">Giới hạn 160 ký tự.</p>
        </div>

        {{-- Từ khóa SEO --}}
        <div class="space-y-1">
            <label for="seo_keywords" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                Thẻ từ khóa SEO
            </label>
            <input
                id="seo_keywords"
                type="text"
                wire:model.defer="data.seo_keywords"
                placeholder="ví dụ: lập trình, seo, blog, hướng dẫn"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-900 text-sm"
            />
            <p class="text-xs text-gray-500">Các từ khóa cách nhau bằng dấu phẩy (,).</p>
        </div>
    </div>
</x-dynamic-component>
