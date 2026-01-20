<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthServiceController extends Controller
{
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' =>'required|string|min:6'
        ]);

        $userData = $this->user->whereEmail($request->email)->first();

        $password_check = Hash::check($request->password,
        $userData->password);
    }
}
