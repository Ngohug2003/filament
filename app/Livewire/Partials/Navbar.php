<?php

namespace App\Livewire\Partials;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Livewire\Component;

class Navbar extends Component
{
    protected $categoryRepository;

    public function boot(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function render()
    {
      $categorys = $this->categoryRepository->all();
        return view('livewire.partials.navbar',[
            'categorys' => $categorys
        ]);
    }
}
