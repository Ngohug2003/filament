<?php

namespace App\Livewire;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use Livewire\Component;

class Aside extends Component
{
    protected $postRepository;
    protected $categoryRepository;

    public function boot(PostRepositoryInterface $postRepository , CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }
    public function render()
    {
        $getViews = $this->postRepository->getViewAllPosts();
        $category = $this->categoryRepository->all();
        return view('livewire.aside',[
            'category' => $category,
            'getViews' => $getViews
        ]);
    }
}
