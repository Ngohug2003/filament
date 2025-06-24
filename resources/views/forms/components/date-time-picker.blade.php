<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div 
        x-data="dateTimePicker({
            state: $wire.entangle('{{ $getStatePath() }}'),
            options: @js($getOptions())
        })"
    >
        <input 
            x-ref="input"
            type="text"
            class="fi-input block w-full border-gray-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500"
            {{ $attributes }}
        >
    </div>
</x-dynamic-component>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('dateTimePicker', (config) => ({
        state: config.state,
        picker: null,
        
        init() {
            this.$nextTick(() => {
                if (typeof flatpickr !== 'undefined') {
                    this.picker = flatpickr(this.$refs.input, {
                        enableTime: true,
                        dateFormat: "Y-m-d H:i",
                        defaultDate: this.state,
                        onChange: (selectedDates, dateStr) => {
                            this.state = dateStr;
                        },
                        ...config.options
                    });
                } else {
                    console.error('Flatpickr not loaded from local');
                }
            });
        }
    }));
});
</script>