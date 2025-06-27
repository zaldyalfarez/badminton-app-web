<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PracticeController extends Controller
{
    public function index()
    {
        $practices = [];
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
            ->get('https://api.arsitek-kode.com/api/latihan');

            if ($response->successful() && isset($response['data'])) {
                $practices = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data latihan dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.managePractice.index', [
            'title' => 'Manage Practice',
            'practices' => $practices,
            'errors' => $errors,
        ]);
    }

    public function create(Request $request)
    {
        $ar = $request->has('ar') ? true : false;

        $validated = $request->validate([
            'name' => 'required|string',
            'durasi' => 'required|integer|min:1',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'video' => 'required|string'
        ]);

        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->post('https://api.arsitek-kode.com/api/latihan', [
                    'name' => $validated['name'],
                    'durasi' => $validated['durasi'],
                    'kategori' => $validated['kategori'],
                    'deskripsi' => $validated['deskripsi'],
                    'video' => $validated['video'],
                    'ar' => $ar
                ]);

            if ($response->successful()) {
                return redirect()->route('dashboard.practice')->with('success', 'Latihan berhasil ditambahkan.');
            } else {
                $message = $response['meta']['message'] ?? 'Gagal menambahkan latihan.';
                return redirect()->route('dashboard.practice')->with('error', $message);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function showPracticeById($id)
    {
        $practice = [];
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
            ->get('https://api.arsitek-kode.com/api/latihan/' . $id);

            if ($response->successful() && isset($response['data'])) {
                $practice = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data latihan dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.managePractice.edit', [
            'title' => 'Manage Practice',
            'practice' => $practice,
            'errors' => $errors,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $ar = $request->has('ar') ? true : false;

        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'video' => 'required|string',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string',
        ]);

        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->put('https://api.arsitek-kode.com/api/latihan/update/' . $id, [
                    'name' => $validated['name'],
                    'kategori' => $validated['category'],
                    'video' => $validated['video'],
                    'durasi' => $validated['duration'] * 60,
                    'deskripsi' => $validated['description'],
                    'ar' => $ar
                ]);

            if ($response->successful()) {
                return redirect()->route('dashboard.practice')->with('success', 'Latihan berhasil diubah.');
            } else {
                $message = $response['meta']['message'] ?? 'Gagal mengubah latihan.';
                return redirect()->route('dashboard.practice')->with('error', $message);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->delete('https://api.arsitek-kode.com/api/latihan/delete/' . $id);

            $data = $response->json();

            if ($response->successful()) {
                return redirect()->route('dashboard.practice')->with('success', 'Latihan berhasil dihapus.');
            } else {
                $message = $data['meta']['message'] ?? 'Gagal menghapus latihan.';
                return redirect()->route('dashboard.practice')->with('error', $message);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.practice')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
