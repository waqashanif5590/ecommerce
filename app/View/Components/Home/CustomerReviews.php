<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerReviews extends Component
{
    /**
     * Create a new component instance.
     */
    public $review;

    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.customer-reviews');
    }
}
