<?php

namespace App\Http\Controllers;
use \Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index(): View
    {
        return view('frontend.pages.home');
    }
}
