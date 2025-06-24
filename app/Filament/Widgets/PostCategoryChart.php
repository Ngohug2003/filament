<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class PostCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Thống kê bài viết theo danh mục';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 1;
    protected static ?string $maxHeight = '250px';


    protected function getData(): array
    {
        $categories = Category::withCount('posts')->get();
        return [
            'datasets' => [
                [
                    'label' => 'Số bài viết',
                    'data' => $categories->pluck('posts_count'),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.6)',
                ],
            ],
            'labels' => $categories->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
