<?php

namespace App\Http\Controllers\ControlPanel;
use \Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class SignUpController extends BaseController
{
    public function index(): View
    {
        return view('controlPanel.pages.signup');
    }

    public function signUp(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user instance
        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password for security

        $user->save();

        $request->session()->flash('success', 'User has been created successfully.');

        return redirect()->route('controlPanel.signup');
    }
}
