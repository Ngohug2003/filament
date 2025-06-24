<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;

class PostPublishedRatioChart extends ChartWidget
{
    protected static ?string $heading = 'Tỉ lệ xuất bản';
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 1;
    protected static ?string $maxHeight = '250px';



    protected function getData(): array
    {
        $published = Post::where('is_published', true)->count();
        $unpublished = Post::where('is_published', false)->count();

        return [
            'datasets' => [
                [
                    'label' => 'Tỉ lệ xuất bản',
                    'data' => [$published, $unpublished],
                    'backgroundColor' => ['#34D399', '#F87171'],
                ],
            ],
            'labels' => ['Đã xuất bản', 'Chưa xuất bản'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
