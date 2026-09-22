<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class performanceCard extends Component
{
    public $title;

    public $value;

    public $description;

    public $growth;

    public $text;

    public $icon;

    public function __construct(
        $title,
        $value,
        $description,
        $growth,
        $text,
        $icon,
    ) {
        $this->title = $title;
        $this->value = $value;
        $this->description = $description;
        $this->growth = $growth;
        $this->text = $text;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.performance-card');
    }
}
