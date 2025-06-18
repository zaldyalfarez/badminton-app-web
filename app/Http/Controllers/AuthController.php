<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $response = Http::post('https://api.arsitek-kode.com/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = $response->json();

        if ($response->successful() && isset($data['data']['token'])) {
            Session::put('jwt_token', $data['data']['token']);
            return redirect('/dashboard');
        }

        return back()->withErrors(['login' => $data['meta']['message'] ?? 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/')->with('success', 'Berhasil logout!');
    }
}
