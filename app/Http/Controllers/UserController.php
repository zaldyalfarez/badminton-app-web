<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = [];
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
            ->get('https://api.arsitek-kode.com/api/user', [
                'role' => 'user',
            ]);

            if ($response->successful() && isset($response['data'])) {
                $users = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data user dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.manageUser.index', [
            'title' => 'User List',
            'users' => $users,
            'errors' => $errors,
        ]);
    }
}
