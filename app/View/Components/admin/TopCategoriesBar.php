<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopCategoriesBar extends Component
{
    public $categoryPerformace;
    public function __construct($categoryPerformace)
    {
        $this->categoryPerformace = $categoryPerformace;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.top-categories-bar');
    }
}
