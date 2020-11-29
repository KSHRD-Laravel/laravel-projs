<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function store(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        return view('home', ['email' => $email, 'password' => $password]);
    }
}
