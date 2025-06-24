<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Image;
use Filament\Forms\Components\Section;
class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    // protected function getFormSchema(): array
    // {
    //     return [
    //         Section::make('Thông tin bài viết')->schema([
    //             TextInput::make('title')->label('Tiêu đề'),
    //             TextInput::make('slug')->label('Slug'),
    //             RichEditor::make('content')->label('Nội dung'),
    //             // Image::make('featured_image')->label('Hình ảnh'),
    //         ]),

    //         Section::make('Tối ưu SEO')->schema([
    //             TextInput::make('seo_title')->label('Tiêu đề SEO'),
    //             TextInput::make('seo_description')->label('Mô tả SEO'),
    //             TextInput::make('seo_keywords')->label('Từ khóa SEO'),
    //         ]),
    //     ];
    // }
}