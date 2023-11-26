<?php

namespace App\Http\Controllers;
use \Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController
{
    public function index(): View
    {
        return view('frontend.pages.login');
    }
}
