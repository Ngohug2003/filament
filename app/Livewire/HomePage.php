<?php

namespace App\Livewire;

use App\Models\Post;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use Livewire\Component;
use Livewire\Attributes\On;

class HomePage extends Component
{
    public $search = '';
    protected $postRepository;
    protected $categoryRepository;
    public function boot(PostRepositoryInterface $postRepository , CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    // Sử dụng attribute On để lắng nghe event
    #[On('searchUpdated')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    public function render()
    {
       $data = $this->postRepository->getHomePageData($this->search);
       $featuredPosts = $data['featuredPosts'];
       $latestPosts = $data['latestPosts'];
       $searchResults = $data['searchResults'];

        return view('livewire.home-page', [
        
            'featuredPosts' => $featuredPosts,
            'latestPosts' => $latestPosts,
            'searchResults' => $searchResults,
            'search' => $this->search,
          
        ]);
      
    }
}
