<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class QuestionController extends Controller
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

        return view('pages.manageQuestion.index', [
            'title' => 'Manage Question',
            'exams' => $exams,
            'errors' => $errors,
        ]);
    }

    public function showQuestionById($id)
    {
        $question = null;
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->get('https://api.arsitek-kode.com/api/soal/ujian/' . $id);

            if ($response->successful() && isset($response['data'])) {
                $question = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data soal dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.manageQuestion.create', [
            'title' => 'Manage Question',
            'question' => $question,
            'errors' => $errors,
            'examId' => $id
        ]);
    }


    public function create(Request $request, $id)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'optionA' => 'required|string',
            'optionB' => 'required|string',
            'optionC' => 'required|string',
            'optionD' => 'required|string',
            'answer' => 'required|string',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
            'video' => 'nullable|string',
        ]);

        $payload = [
            'ujianId' => $id,
            'question' => $validated['question'],
            'optionA' => $validated['optionA'],
            'optionB' => $validated['optionB'],
            'optionC' => $validated['optionC'],
            'optionD' => $validated['optionD'],
            'answer' => $validated['answer'],
        ];

        if (!empty($validated['video'])) {
            $payload['video'] = $validated['video'];
        }

        try {
            $http = Http::withToken(Session::get('jwt_token'));

            if ($request->hasFile('photo')) {
                $http = $http->attach(
                    'image',
                    file_get_contents($request->file('photo')->getRealPath()),
                    $request->file('photo')->getClientOriginalName()
                );
            }

            $response = $http->post('https://api.arsitek-kode.com/api/soal', $payload);

            if ($response->successful()) {
                return redirect()->route('question.questionById', ['id' => $id])
                                ->with('success', 'Soal berhasil ditambahkan.');
            } else {
                $message = $response['meta']['message'] ?? 'Gagal menambah soal.';
                return redirect()->route('question.questionById', ['id' => $id])
                                ->with('error', $message);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => 'Terjadi kesalahan: ' . $e->getMessage()])
                        ->withInput();
        }
    }

    public function showQuestionByIdEdit($id){
        $question = [];
        $errors = [];

        try {
            $response = Http::withToken(Session::get('jwt_token'))
            ->get('https://api.arsitek-kode.com/api/soal/' . $id);

            if ($response->successful() && isset($response['data'])) {
                $question = $response['data'];
            } else {
                $errors[] = $response['meta']['message'] ?? 'Gagal mengambil data latihan dari API.';
            }
        } catch (\Exception $e) {
            $errors[] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return view('pages.manageQuestion.edit', [
            'title' => 'Manage Question',
            'question' => $question,
            'errors' => $errors,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $returnId = $request->input('ujianId');

        $validated = $request->validate([
            'question' => 'required|string',
            'optionA' => 'required|string',
            'optionB' => 'required|string',
            'optionC' => 'required|string',
            'optionD' => 'required|string',
            'answer' => 'required|string',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
            'video' => 'nullable|string',
        ]);

        try {
            $client = new Client();
            $multipart = [
                [ 'name' => 'question', 'contents' => $validated['question'] ],
                [ 'name' => 'optionA', 'contents' => $validated['optionA'] ],
                [ 'name' => 'optionB', 'contents' => $validated['optionB'] ],
                [ 'name' => 'optionC', 'contents' => $validated['optionC'] ],
                [ 'name' => 'optionD', 'contents' => $validated['optionD'] ],
                [ 'name' => 'answer',  'contents' => $validated['answer'] ],
            ];

            if (!empty($validated['video'])) {
                $multipart[] = [ 'name' => 'video', 'contents' => $validated['video'] ];
            }

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $multipart[] = [
                    'name'     => 'image',
                    'contents' => fopen($photo->getRealPath(), 'r'),
                    'filename' => $photo->getClientOriginalName(),
                ];
            }

            $response = $client->request('PUT', 'https://api.arsitek-kode.com/api/soal/update/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('jwt_token'),
                    'Accept'        => 'application/json',
                ],
                'multipart' => $multipart,
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody(), true);

            if ($statusCode >= 200 && $statusCode < 300) {
                return redirect()->route('question.questionById', ['id' => $returnId])
                    ->with('success', 'Soal berhasil diubah.');
            } else {
                $message = $body['meta']['message'] ?? 'Gagal mengubah soal.';
                return redirect()->route('question.questionById', ['id' => $returnId])
                    ->with('error', $message);
            }
        } catch (RequestException $e) {
            $errorMsg = $e->hasResponse() 
                ? json_decode($e->getResponse()->getBody(), true)['meta']['message'] ?? $e->getMessage()
                : $e->getMessage();

            return back()->withErrors(['exception' => 'Terjadi kesalahan: ' . $errorMsg])->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $response = Http::withToken(Session::get('jwt_token'))
                ->delete('https://api.arsitek-kode.com/api/soal/delete/' . $id);

            $data = $response->json();

            if ($response->successful()) {
                return redirect()->route('question.questionById', ['id' => $id])->with('success', 'Soal berhasil dihapus.');
            } else {
                $message = $data['meta']['message'] ?? 'Gagal menghapus soal.';
                return redirect()->route('question.questionById', ['id' => $id])->with('error', $message);
            }
        } catch (\Exception $e) {
            return redirect()->route('question.questionById', ['id' => $id])
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
