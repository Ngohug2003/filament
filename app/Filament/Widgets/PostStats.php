<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Repositories\PostRepository;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PostStats extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
  
    protected function getStats(): array
    {
        $total = Post::count();
        $published = Post::where('is_published', true)->count();
        $unpublished = Post::where('is_published', false)->count();

        // $unpublished = $total - $published;

        return [
            Stat::make('Tổng bài viết', $total)
                ->description('Tổng số bài đã nhập')
                ->color('primary'),

            Stat::make('Đã xuất bản', $published)
                ->description('Bài viết hiển thị')
                ->color('success'),

            Stat::make('Chưa xuất bản', $unpublished)
                ->description('Bài viết đang ẩn')
                ->color('danger'),
        ];
    }
}
