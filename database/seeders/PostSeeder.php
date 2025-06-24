<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id')->toArray();
        $tags = Tag::pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $title = fake()->sentence(6); // Tạo tiêu đề bài viết thực tế hơn
            $post = Post::create([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . $i,
                'content' => fake()->paragraphs(rand(3, 7), true), // Tạo nội dung dài hơn với nhiều đoạn
                'seo_title' => fake()->sentence(8), // Tạo tiêu đề SEO thực tế hơn
                'seo_description' => fake()->text(160), // Tạo mô tả SEO với độ dài tối đa 160 ký tự
                'seo_keywords' => implode(', ', fake()->words(rand(3, 6))), // Tạo từ khóa SEO ngẫu nhiên
                'category_id' => fake()->randomElement($categories),
                'featured_image' => 'uploads/posts/' . fake()->uuid() . '.jpg', // Tạo tên file ảnh ngẫu nhiên
                'views' => fake()->numberBetween(100, 5000), // Số lượt xem thực tế hơn
                'is_published' => fake()->boolean(80), // 80% bài viết được xuất bản
                'published_at' => fake()->dateTimeBetween('-1 year', 'now'), // Ngày xuất bản trong khoảng 1 năm qua
            ]);

            // Gán từ 1-5 tags ngẫu nhiên cho bài viết
            $post->tags()->attach(fake()->randomElements($tags, rand(1, 5)));
        }
    }
}