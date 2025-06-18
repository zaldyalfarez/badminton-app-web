<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Auth
Route::middleware(['isGuest'])->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

// Group with middleware
Route::middleware(['isJwt'])->group(function () {
    //Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', fn() =>
        view('pages.dashboard.index', ['title' => 'Dashboard'])
    );

    // Coach
    Route::get('/dashboard/coach', fn() =>
        view('pages.manageCoach.index', ['title' => 'Manage Coach'])
    );
    Route::get('/dashboard/coach/create', fn() =>
        view('pages.manageCoach.create', ['title' => 'Manage Coach'])
    );
    Route::get('/dashboard/coach/edit', fn() =>
        view('pages.manageCoach.edit', ['title' => 'Manage Coach'])
    );

    // Exam
    Route::get('/dashboard/exam', fn() =>
        view('pages.manageExam.index', ['title' => 'Manage Exam'])
    );
    Route::get('/dashboard/exam/create', fn() =>
        view('pages.manageExam.create', ['title' => 'Manage Exam'])
    );
    Route::get('/dashboard/exam/edit', fn() =>
        view('pages.manageExam.edit', ['title' => 'Manage Exam'])
    );

    // Practice
    Route::get('/dashboard/practice', fn() =>
        view('pages.managePractice.index', ['title' => 'Manage Practice'])
    );
    Route::get('/dashboard/practice/create', fn() =>
        view('pages.managePractice.create', ['title' => 'Manage Practice'])
    );
    Route::get('/dashboard/practice/edit', fn() =>
        view('pages.managePractice.edit', ['title' => 'Manage Practice'])
    );

    // Question
    Route::get('/dashboard/question', fn() =>
        view('pages.manageQuestion.index', ['title' => 'Manage Question'])
    );
    Route::get('/dashboard/question/create', fn() =>
        view('pages.manageQuestion.create', ['title' => 'Manage Question'])
    );
    Route::get('/dashboard/question/edit', fn() =>
        view('pages.manageQuestion.edit', ['title' => 'Manage Question'])
    );

    // User
    Route::get('/dashboard/user', fn() =>
        view('pages.manageUser.index', ['title' => 'User List'])
    );
});
