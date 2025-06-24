<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div
        x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
        x-init="
            if (state < {{ $field->getMin() }}) state = {{ $field->getMin() }};
            if (state > {{ $field->getMax() }}) state = {{ $field->getMax() }};
        "
        class="fi-fo-text-input block w-full rounded-lg border-none bg-white px-3 py-2 text-base shadow-sm ring-1 ring-gray-950/10 focus:outline-none focus:ring-gray-950/20 dark:bg-white/5 dark:text-white dark:ring-white/10 dark:focus:ring-white/20 sm:text-sm sm:leading-6"
    >
        <div class="flex items-center gap-2">
            @for ($i = $field->getMin(); $i <= $field->getMax(); $i++)
                <span
                    x-on:click="state = {{ $i }}"
                    class="cursor-pointer transition-all duration-200 ease-in-out transform hover:scale-125 active:scale-110"
                    x-bind:style="state >= {{ $i }} ? 'color: #facc15; fill: #facc15;' : 'color: #d1d5db; fill: #d1d5db;'"
                >
                    <x-heroicon-s-star class="h-6 w-6" />
                </span>
            @endfor

            {{-- Hiển thị giá trị --}}
            <span class="ml-2 text-gray-700 dark:text-gray-300" x-text="state"></span>

            {{-- Input ẩn --}}
            <input
                type="hidden"
                x-model="state"
                id="{{ $getId() }}"
                name="{{ $getStatePath() }}"
            />
        </div>
    </div>
</x-dynamic-component>
