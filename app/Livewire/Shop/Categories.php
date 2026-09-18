<?php

namespace App\Livewire\Shop;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Categories extends Component
{
    public function render()
    {
        $categories = Category::all();

        return view('livewire.shop.categories', ['categories' => $categories]);
    }
}
