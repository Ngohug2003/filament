<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        // Return query builder instead of collection
        return $this->model->with('category', 'tags');
    }

    public function find($id)
    {
        return $this->model->with('category', 'tags')->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $post = $this->find($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = $this->find($id);
        $post->delete();
        return true;
    }

    public function getByCategory($categoryId)
    {
        // Return query builder instead of collection
        return $this->model->where('category_id', $categoryId)->with('category', 'tags');
    }
    public function getLatestPosts($limit = 5)
    {
        return $this->model
            ->select('id', 'title', 'content', 'category_id', 'featured_image')
            ->with(['category:id,name'])
            ->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Get featured/published posts
     * 
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFeaturedPosts($limit = 1)
    {
        return $this->model
            ->select('id', 'title', 'content', 'category_id', 'featured_image')
            ->with(['category:id,name'])
            ->where('is_published', true)
            ->take($limit)
            ->get();
    }

    /**
     * Search posts by title and content
     * 
     * @param string $search
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function searchPosts($search, $limit = null)
    {
        $query = $this->model
            ->select('id', 'title', 'content', 'category_id', 'featured_image')
            ->with('category:id,name')
            ->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest();

        if ($limit) {
            $query->take($limit);
        }

        return $query->get();
    }

    /**
     * Get home page data
     * 
     * @param string|null $search
     * @return array
     */
    public function getHomePageData($search = null)
    {
        $data = [
            'latestPosts' => $this->getLatestPosts(5),
            'featuredPosts' => $this->getFeaturedPosts(1),
            'searchResults' => []
        ];
        if (!empty($search) && strlen(trim($search)) > 1) {
            $data['searchResults'] = $this->searchPosts($search);
        }

        return $data;
    }
    public function getViewAllPosts($limit = 5)
    {
        return $this->model
            ->select('id','title')
            ->orderBy('views')
            ->limit($limit)
            ->get();
    }
}
