<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard.index', [
        'title' => 'Dashboard'
    ]);
});


// Coach
Route::get('/dashboard/coach', function () {
    return view('pages.manageCoach.index', [
        'title' => 'Manage Coach'
    ]);
});

Route::get('/dashboard/coach/create', function () {
    return view('pages.manageCoach.create', [
        'title' => 'Manage Coach'
    ]);
});

Route::get('/dashboard/coach/edit', function () {
    return view('pages.manageCoach.edit', [
        'title' => 'Manage Coach'
    ]);
});

// Exam
Route::get('/dashboard/exam', function () {
    return view('pages.manageExam.index', [
        'title' => 'Manage Exam'
    ]);
});

Route::get('/dashboard/exam/create', function () {
    return view('pages.manageExam.create', [
        'title' => 'Manage Exam'
    ]);
});

Route::get('/dashboard/exam/edit', function () {
    return view('pages.manageExam.edit', [
        'title' => 'Manage Exam'
    ]);
});

// Practice
Route::get('/dashboard/practice', function () {
    return view('pages.managePractice.index', [
        'title' => 'Manage Practice'
    ]);
});

Route::get('/dashboard/practice/create', function () {
    return view('pages.managePractice.create', [
        'title' => 'Manage Practice'
    ]);
});

Route::get('/dashboard/practice/edit', function () {
    return view('pages.managePractice.edit', [
        'title' => 'Manage Practice'
    ]);
});

// Question
Route::get('/dashboard/question', function () {
    return view('pages.manageQuestion.index', [
        'title' => 'Manage Question'
    ]);
});

Route::get('/dashboard/question/create', function () {
    return view('pages.manageQuestion.create', [
        'title' => 'Manage Question'
    ]);
});

Route::get('/dashboard/question/edit', function () {
    return view('pages.manageQuestion.edit', [
        'title' => 'Manage Question'
    ]);
});

// User
Route::get('/dashboard/user', function () {
    return view('pages.manageUser.index', [
        'title' => 'User List'
    ]);
});