<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    public function index()
    {
        $exams = [];
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
            ->get('https://api.arsitek-kode.com/api/ujian');

            if ($response->successful() && isset($response['data'])) {
                $exams = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data ujian dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.manageExam.index', [
            'title' => 'Manage Exam',
            'exams' => $exams,
            'errors' => $errors,
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'level' => 'required|in:Mudah,Normal,Sulit|min:1',
            'duration' => 'required|integer|min:1',
        ]);

        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->post('https://api.arsitek-kode.com/api/ujian', [
                    'name' => $validated['name'],
                    'type' => $validated['type'],
                    'level' => $validated['level'],
                    'durasi' => $validated['duration'] * 60,
                ]);

            if ($response->successful()) {
                return redirect()->route('dashboard.exam')->with('success', 'Ujian berhasil ditambahkan.');
            } else {
                $message = $response['meta']['message'] ?? 'Gagal menambahkan ujian.';
                return redirect()->route('dashboard.exam')->with('error', $message);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function showExamById($id)
    {
        $exam = [];
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
            ->get('https://api.arsitek-kode.com/api/ujian/' . $id);

            if ($response->successful() && isset($response['data'])) {
                $exam = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data ujian dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.manageExam.edit', [
            'title' => 'Manage Exam',
            'exam' => $exam,
            'errors' => $errors,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'level' => 'required|in:Mudah,Normal,Sulit|min:1',
            'duration' => 'required|integer|min:1',
        ]);

        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->put('https://api.arsitek-kode.com/api/ujian/update/' . $id, [
                    'name' => $validated['name'],
                    'type' => $validated['type'],
                    'level' => $validated['level'],
                    'durasi' => $validated['duration'] * 60,
                ]);

            if ($response->successful()) {
                return redirect()->route('dashboard.exam')->with('success', 'Ujian berhasil diubah.');
            } else {
                $message = $response['meta']['message'] ?? 'Gagal mengubah ujian.';
                return redirect()->route('dashboard.exam')->with('error', $message);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->delete('https://api.arsitek-kode.com/api/ujian/delete/' . $id);

            $data = $response->json();

            if ($response->successful()) {
                return redirect()->route('dashboard.exam')->with('success', 'Ujian berhasil dihapus.');
            } else {
                $message = $data['meta']['message'] ?? 'Gagal menghapus ujian.';
                return redirect()->route('dashboard.exam')->with('error', $message);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.exam')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
