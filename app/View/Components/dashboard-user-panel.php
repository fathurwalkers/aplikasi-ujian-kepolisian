<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardUserPanel extends Component
{
    public function __construct()
    {
        //
    }

    public function render() :string
    {
        return view('components.dashboard-user-panel');
    }
}
