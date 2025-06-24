<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Header extends Component
{
    public $search = '';

    public function mount($search = '')
    {
        $this->search = $search;
    }

    public function updatedSearch($value)
    {
        // Dispatch event với tên rõ ràng hơn
        $this->dispatch('searchUpdated', search: $value);
    }

    public function render()
    {
        return view('livewire.partials.header');
    }
}