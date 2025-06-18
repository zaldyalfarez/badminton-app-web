@extends('layouts.dashboard')
@section('title', 'Dashboard | ' . $title)
@section('content')
    <div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Question</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the exams including their name, type, level, and
                    duration.</p>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="overflow-hidden rounded-lg bg-white shadow border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Id
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Type</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Level</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Duration</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        1</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Exam Pack 1</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Theory</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Easy</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">5 Minutes</td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <div x-data="{ open: false }" class="inline-flex items-center gap-2">
                                            <a href="/dashboard/question/create"
                                                class="text-indigo-600 hover:text-indigo-900">Add Question</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
