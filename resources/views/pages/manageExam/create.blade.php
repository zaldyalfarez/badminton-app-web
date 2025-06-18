@extends('layouts.dashboard')
@section('title', 'Dashboard | Add Exam')
@section('content')
    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-xl font-semibold">Create Exam</h1>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <form action="" class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900">Exam Name</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" autocomplete="name"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="level" class="block text-sm/6 font-medium text-gray-900">Type</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="level" name="level" autocomplete="level-name"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option selected disabled>Choose Type</option>
                                <option>Teori</option>
                                <option>Praktik</option>
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <label for="level" class="block text-sm/6 font-medium text-gray-900">Level</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="level" name="level" autocomplete="level-name"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option selected disabled>Choose Level</option>
                                <option>Mudah</option>
                                <option>Menengah</option>
                                <option>Sulit</option>
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <label for="text" class="block text-sm font-medium text-gray-900">Duration (minute)</label>
                        <div class="mt-2">
                            <input id="text" name="text" type="text" autocomplete="text-duration"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex gap-3">
                    <a href="{{ url()->previous() }}"
                        class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-gray-300">
                        Cancel
                    </a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create Exam
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
