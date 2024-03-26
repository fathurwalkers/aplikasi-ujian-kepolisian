<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardNotifikasi extends Component
{
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-notifikasi');
    }
}
