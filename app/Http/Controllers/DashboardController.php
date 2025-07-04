<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = 0;
        $totalCoaches = 0;
        $totalPractices = 0;
        $totalExams = 0;
        $totalQuestions = 0;
        $errors = [];

        try {
            $userResponse = Http::withToken(Session::get('jwt_token'))
                ->get('https://api.arsitek-kode.com/api/user?role=user');
            if ($userResponse->successful() && isset($userResponse['data'])) {
                $totalUsers = count($userResponse['data']);
            } else {
                $errors[] = $userResponse['meta']['message'] ?? 'Gagal mengambil data user dari API.';
            }

            $coachResponse = Http::withToken(Session::get('jwt_token'))
                ->get('https://api.arsitek-kode.com/api/user?role=coach');
            if ($coachResponse->successful() && isset($coachResponse['data'])) {
                $totalCoaches = count($coachResponse['data']);
            } else {
                $errors[] = $coachResponse['meta']['message'] ?? 'Gagal mengambil data coach dari API.';
            }

            $latihanResponse = Http::withToken(Session::get('jwt_token'))
                ->get('https://api.arsitek-kode.com/api/latihan');
            if ($latihanResponse->successful() && isset($latihanResponse['data'])) {
                $totalPractices = count($latihanResponse['data']);
            } else {
                $errors[] = $latihanResponse['meta']['message'] ?? 'Gagal mengambil data latihan dari API.';
            }

            $ujianResponse = Http::withToken(Session::get('jwt_token'))
                ->get('https://api.arsitek-kode.com/api/ujian');
            if ($ujianResponse->successful() && isset($ujianResponse['data'])) {
                $totalExams = count($ujianResponse['data']);
            } else {
                $errors[] = $ujianResponse['meta']['message'] ?? 'Gagal mengambil data ujian dari API.';
            }

            $soalResponse = Http::withToken(Session::get('jwt_token'))
                ->get('https://api.arsitek-kode.com/api/soal');
            if ($soalResponse->successful() && isset($soalResponse['data'])) {
                $totalQuestions = count($soalResponse['data']);
            } else {
                $errors[] = $soalResponse['meta']['message'] ?? 'Gagal mengambil data soal dari API.';
            }

        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.dashboard.index', [
            'title' => 'Dashboard',
            'totalUsers' => $totalUsers,
            'totalCoaches' => $totalCoaches,
            'totalPractices' => $totalPractices,
            'totalExams' => $totalExams,
            'totalQuestions' => $totalQuestions,
            'errors' => $errors,
        ]);
    }
}
