<?php

namespace App\Repositories\Contracts;

interface PostRepositoryInterface
{
    public function all();
    public function getByCategory($categoryId);
    public function getLatestPosts($limit = 5);
    public function getFeaturedPosts($limit = 1);
    public function searchPosts($search, $limit = null);
    public function getHomePageData($search = null);
    public function getViewAllPosts($limit = 5);
    public function getBySlugPost($slug);
}
