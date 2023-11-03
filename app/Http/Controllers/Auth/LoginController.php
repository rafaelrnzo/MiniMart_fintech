<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username'; // atau bidang apa pun yang Anda gunakan untuk login
    }

    protected function authenticated(Request $request, $user)
{
    // Set peran pengguna
    if ($user->role === 'admin') {
        return redirect()->route('admin');
    } elseif ($user->role === 'kantin') {
        return redirect()->route('kantin');
    } elseif ($user->role === 'bank') {
        return redirect()->route('bank');
    } elseif ($user->role === 'user') {
        return redirect()->route('user');
    }
}

}
