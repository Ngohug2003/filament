<?php
namespace App\Forms\Components;


use Filament\Forms\Components\Field;

class SeoMetaFields extends Field
{
    protected string $view = 'forms.components.seo-meta-fields';
    
    protected function setUp(): void
    {
        parent::setUp();
    }
}
