<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class PostLayout extends Component
{
    protected string $view = 'forms.components.post-layout';

    public static function make(): static
    {
        return app(static::class);
    }
}
