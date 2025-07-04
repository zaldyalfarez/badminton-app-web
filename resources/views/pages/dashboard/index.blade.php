@extends('layouts.dashboard')
@section('title', $title)
@section('content')
    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-xl font-semibold">Welcome, Admin!</h1>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="rounded-lg bg-white shadow p-4">
                    <div class="text-gray-600">Total Users</div>
                    <div class="text-2xl font-bold">{{ $totalUsers }}</div>
                </div>
                <div class="rounded-lg bg-white shadow p-4">
                    <div class="text-gray-600">Total Coaches</div>
                    <div class="text-2xl font-bold">{{ $totalCoaches }}</div>
                </div>
                <div class="rounded-lg bg-white shadow p-4">
                    <div class="text-gray-600">Total Practices</div>
                    <div class="text-2xl font-bold">{{ $totalPractices }}</div>
                </div>
                <div class="rounded-lg bg-white shadow p-4">
                    <div class="text-gray-600">Total Exams</div>
                    <div class="text-2xl font-bold">{{ $totalExams }}</div>
                </div>
                <div class="rounded-lg bg-white shadow p-4">
                    <div class="text-gray-600">Total Questions</div>
                    <div class="text-2xl font-bold">{{ $totalQuestions }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="divide-y mt-5 divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-xl font-semibold">Quick Actions</h1>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <a href="/dashboard/coach/create"
                class="rounded-md bg-indigo-600 px-3 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Add Coach
            </a>
            <a href="/dashboard/exam/create"
                class="rounded-md bg-indigo-600 px-3 py-2.5 ms-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create Exam
            </a>
            <a href="/dashboard/practice/create"
                class="rounded-md bg-indigo-600 px-3 py-2.5 ms-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create Practice
            </a>
        </div>
    </div>
@endsection
