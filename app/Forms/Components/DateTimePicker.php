<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class DateTimePicker extends Field
{
    protected string $view = 'forms.components.date-time-picker';
    protected array $options = [];

    protected function setUp(): void
    {
        parent::setUp();

        // Load JS assets
        $this->extraAttributes([
            'x-load-js' => ['flatpickr'],
            'x-load-css' => ['flatpickr-css'],
        ]);
    }

    public function options(array $options): static
    {
        $this->options = $options;
        return $this;
    }

    public function getOptions(): array
    {
        return array_merge([
            'enableTime' => true,
            'dateFormat' => 'Y-m-d H:i',
            'time_24hr' => true,
        ], $this->options);
    }
}