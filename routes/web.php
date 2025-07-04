<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

// Auth
Route::middleware(['isGuest'])->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

// Dashboard
Route::middleware(['isJwt'])->group(function () {
    // Home Page
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Coach
    Route::get('/dashboard/coach', [CoachController::class, 'index'])->name('dashboard.coach');

    Route::get('/dashboard/coach/create', fn() =>
        view('pages.manageCoach.create', ['title' => 'Manage Coach'])
    );

    Route::post('/dashboard/coach/create', [CoachController::class, 'create'])->name('coach.create');

    Route::get('/dashboard/coach/edit/{id}', [CoachController::class, 'showCoachById'])->name('coach.edit');

    Route::put('/dashboard/coach/edit/{id}', [CoachController::class, 'edit'])->name('coach.edit');

    Route::delete('/dashboard/coach/delete/{id}', [CoachController::class, 'delete'])->name('coach.delete');

    // Exam
    Route::get('/dashboard/exam', [ExamController::class, 'index'])->name('dashboard.exam');

    Route::get('/dashboard/exam/create', fn() =>
        view('pages.manageExam.create', ['title' => 'Manage Exam'])
    );

    Route::post('/dashboard/exam/create', [ExamController::class, 'create'])->name('exam.create');

    Route::get('/dashboard/exam/edit/{id}', [ExamController::class, 'showExamById'])->name('exam.edit');

    Route::put('/dashboard/exam/edit/{id}', [ExamController::class, 'edit'])->name('exam.edit');

    Route::delete('/dashboard/exam/delete/{id}', [ExamController::class, 'delete'])->name('exam.delete');

    // Practice
    Route::get('/dashboard/practice', [PracticeController::class, 'index'])->name('dashboard.practice');

    Route::get('/dashboard/practice/create', fn() =>
        view('pages.managePractice.create', ['title' => 'Manage Practice'])
    );

    Route::post('/dashboard/practice/create', [PracticeController::class, 'create'])->name('practice.create');

    Route::get('/dashboard/practice/edit/{id}', [PracticeController::class, 'showPracticeById'])->name('practice.edit');

    Route::put('/dashboard/practice/edit/{id}', [PracticeController::class, 'edit'])->name('practice.edit');

    Route::delete('/dashboard/practice/delete/{id}', [PracticeController::class, 'delete'])->name('practice.delete');

    // Question
    Route::get('/dashboard/question', [QuestionController::class, 'index'])->name('dashboard.question');

    Route::get('/dashboard/question/create/{id}', [QuestionController::class, 'showQuestionById'])->name('question.questionById');

    Route::post('/dashboard/question/create/{id}', [QuestionController::class, 'create'])->name('question.create');
    
    Route::get('/dashboard/question/edit/{id}', [QuestionController::class, 'showQuestionByIdEdit'])->name('question.edit');

    Route::put('/dashboard/question/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');

    Route::delete('/dashboard/question/delete/{id}', [QuestionController::class, 'delete'])->name('question.delete');

    // User
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('dashboard.user');
});
