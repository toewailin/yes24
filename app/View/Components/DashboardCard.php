<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $title;
    public $count;
    public $icon;
    public $color;

    public function __construct($title, $count, $icon, $color = 'indigo')
    {
        $this->title = $title;
        $this->count = $count;
        $this->icon = $icon;
        $this->color = $color;
    }

    public function render()
    {
        return view('components.dashboard-card');
    }
}
