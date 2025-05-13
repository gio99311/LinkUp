<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Homepage extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.homepage', compact('categories'));
    }
}
