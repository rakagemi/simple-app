<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signIn()
    {
        if (!Session::get('login')) {
            return view('admin.auth.login');
        } else {
            return redirect('admin.dashboard');
        }
    }

        public function logout()
    {
        if (Session::get('login')) {
            Session::flush();
            return redirect('admin.auth.login')->with('success', 'Kamu sudah logout');
        }
    }
}
