<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => 'required|email|min:5|unique:users,email',
            'password' => 'required|min:2'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'loginEmail' => 'required',
            'loginPassword' => 'required'
        ]);

        if (auth()->attempt(['email' => $loginData['loginEmail'], 'password' => $loginData['loginPassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
