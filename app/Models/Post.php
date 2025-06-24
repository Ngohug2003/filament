<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'seo_title', 'seo_description', 'seo_keywords', 'category_id', 'featured_image', 'is_published', 'published_at','views'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'seo_keywords' => 'array', // hoặc 'json'
    ];
}
