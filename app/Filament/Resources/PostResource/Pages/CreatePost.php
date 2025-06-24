<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
   

    // Định nghĩa các thuộc tính public để gắn kết với form
    public $seo_title = '';
    public $seo_description = '';
    public $seo_keywords = [];
    // Nếu sử dụng model, đảm bảo các thuộc tính được fillable
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['seo_title'] = $this->seo_title;
        $data['seo_description'] = $this->seo_description;
        $data['seo_keywords'] = $this->seo_keywords;
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['seo_title'] = $this->seo_title;
        $data['seo_description'] = $this->seo_description;
        $data['seo_keywords'] = $this->seo_keywords;
        return $data;
    }
}
