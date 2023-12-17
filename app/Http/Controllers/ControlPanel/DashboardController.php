<?php

namespace App\Http\Controllers\ControlPanel;
use \Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('controlPanel.pages.dashboard');
    }
}
