<?php

namespace App\Livewire\Partials;

use App\Models\Category;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        $categorys = Category::all();
        return view('livewire.partials.navbar',[
            'categorys' => $categorys
        ]);
    }
}
