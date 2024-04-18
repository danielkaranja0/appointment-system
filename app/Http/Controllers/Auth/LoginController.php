<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Customize the welcome message based on the user's role
        $welcomeMessage = 'Welcome back';
        if ($user->role === 'ceo') {
            $welcomeMessage .= ' CEO';
        } elseif ($user->role === 'manager') {
            $welcomeMessage .= ' Manager';
        } elseif ($user->role === 'secretary') {
            $welcomeMessage .= ' Secretary';
        }
    
        // Append the user's name to the welcome message
        $welcomeMessage .= ', ' . $user->name;
    
        // Flash the welcome message to the session
        $request->session()->flash('status', $welcomeMessage);
    }
}    
