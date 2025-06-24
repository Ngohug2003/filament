<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

// use Filament\Tables\Filters\Tabs\Tab;


class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Tất cả'),
            // 'Công khai' => Tab::make('Công khai')
            //     ->query(fn ($query) => $query->where('is_published', true)),
            // 'Bản nháp' => Tab::make('Bản nháp')
            //     ->query(fn ($query) => $query->where('is_published', false)),
            'Công khai' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->where('is_published', true))
            ->badge(Post::where('is_published', true)->count()),
            'Bản nháp' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->where('is_published', false))
            ->badge(Post::where('is_published', false)->count())
        ];
    }
}
