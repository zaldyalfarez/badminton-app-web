<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = [];
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
            ->get('https://api.arsitek-kode.com/api/user', [
                'role' => 'coach',
            ]);

            if ($response->successful() && isset($response['data'])) {
                $coaches = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data coach dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.manageCoach.index', [
            'title' => 'Manage Coach',
            'coaches' => $coaches,
            'errors' => $errors,
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->post('https://api.arsitek-kode.com/api/user', [
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'password' => $validatedData['password'],
                    'role' => 'coach',
                ]);

            if ($response->successful()) {
                return redirect()->route('dashboard.coach')->with('success', 'Pendaftaran akun berhasil.');
            } else {
                $message = $response['meta']['message'] ?? 'Gagal membuat akun.';
                return redirect()->route('dashboard.coach')->with('error', $message);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function showCoachById($id)
    {
        $coach = [];
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
            ->get('https://api.arsitek-kode.com/api/user/' . $id);

            if ($response->successful() && isset($response['data'])) {
                $coach = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data coach dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.manageCoach.edit', [
            'title' => 'Manage Coach',
            'coach' => $coach,
            'errors' => $errors,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->put('https://api.arsitek-kode.com/api/user/coach/update/' . $id, [
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => $validated['password']
                ]);

            if ($response->successful()) {
                return redirect()->route('dashboard.coach', ['id' => $id])->with('success', 'Akun coach berhasil diubah.');
            } else {
                $message = $response['meta']['message'] ?? 'Gagal mengubah akun coach.';
                return redirect()->route('dashboard.coach', ['id' => $id])->with('error', $message);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->delete('https://api.arsitek-kode.com/api/user/coach/delete/' . $id);

            $data = $response->json();

            if ($response->successful()) {
                return redirect()->route('dashboard.coach', ['id' => $id])->with('success', 'Akun coah berhasil dihapus.');
            } else {
                $message = $data['meta']['message'] ?? 'Gagal menghapus akun coach.';
                return redirect()->route('dashboard.coach', ['id' => $id])->with('error', $message);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.coach', ['id' => $id])
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
