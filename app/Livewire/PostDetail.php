<?php

namespace App\Livewire;

use App\Repositories\Contracts\PostRepositoryInterface;
use Livewire\Component;

class PostDetail extends Component
{
    protected $postRepository;
    public $slug;
    public $post;

    public function boot(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->post = $this->postRepository->getBySlugPost($slug);
    }

    public function render()
    {
        return view('livewire.post-detail', [
            'post' => $this->post,
        ]);
    }



    // $slug = request()->route('slug'); // Get the slug directly from the route
    // $post = $this->postRepository->getBySlugPost($slug); // Fetch the post using the repository
    // return view('livewire.post-detail', [
    //     'post' => $post,
    // ]);

}
