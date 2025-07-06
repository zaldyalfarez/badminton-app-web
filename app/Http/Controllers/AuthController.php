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

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function showResetPasswordForm()
    {
        return view('auth.change-password');
    }
    
    public function login(Request $request)
    {
        $response = Http::post('https://api.arsitek-kode.com/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = $response->json();

        if ($response->successful() && isset($data['data']['token'])) {
            $user = $data['data']['userLogin'];

            if ($user['role'] !== 'admin') {
                return back()->withErrors(['login' => 'Akun ini tidak memiliki izin untuk masuk.']);
            }

            Session::put('jwt_token', $data['data']['token']);
            Session::put('role', $user['role']);

            return redirect('/dashboard');
        }

        return back()->withErrors(['login' => $data['meta']['message'] ?? 'Email atau password salah']);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        ]);

        $response = Http::post('https://api.arsitek-kode.com/api/forgot-password', [
            'email' => $request->email,
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Password reset link has been sent to your email.');
        }

        return back()->withErrors([
            'email' => $response->json('meta.message') ?? 'Failed to send reset link. Please try again.',
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required',
        ]);

        $response = Http::post('https://api.arsitek-kode.com/api/reset-password', [
            'password' => $request->password,
            'forgotToken' => $request->token,
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Your password has been reset successfully.');
        }

        return back()->with('error', $response->json('meta.message') ?? 'Failed to reset password. Please try again.');
    }


    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/')->with('success', 'Berhasil logout!');
    }
}
