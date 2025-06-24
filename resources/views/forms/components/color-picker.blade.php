{{-- resources/views/filament/forms/components/color-picker.blade.php --}}

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div
        x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
        x-init="() => {
            // Không cần logic defaultColor ở đây nữa, Filament sẽ xử lý giá trị mặc định qua default()
        }"
        class="flex items-center space-x-2"
    >
        <input
            type="color"
            x-model="state"
            id="{{ $getId() }}"
            {{ $applyStateBindingModifiers('wire:model') }}
            class="h-10 w-10 rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500"
            title="Chọn màu"
        />
        <span
            x-text="state.toUpperCase()"
            class="font-mono text-sm text-gray-700 dark:text-gray-200"
        ></span>
    </div>
</x-dynamic-component>