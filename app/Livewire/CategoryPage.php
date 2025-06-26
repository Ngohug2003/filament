<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryPage extends Component
{
    public $slug;
    public $category;
    public $posts;


    protected $categoryRepository;
    
    public function boot(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->category = $this->categoryRepository->getBySlugWithPosts($slug);
        $this->posts = $this->category->posts; 
    }

    public function render()
    {
        return view('livewire.category-page', [
            'category' => $this->category,
            'posts' => $this->posts,
        ]);
    }
}
