@extends('layouts.dashboard')
@section('title', 'Dashboard | Edit Question')
@section('content')
    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-xl font-semibold">Add Question</h1>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <form action="" class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="question" class="block text-sm font-medium text-gray-900">Question</label>
                        <div class="mt-2">
                            <input id="question" name="question" type="text" autocomplete="question"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="level" class="block text-sm/6 font-medium text-gray-900">Answer</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="level" name="level" autocomplete="level-name"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option selected disabled>Choose Answer</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
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
                        <label for="optionA" class="block text-sm font-medium text-gray-900">Option A</label>
                        <div class="mt-2">
                            <input id="optionA" name="optionA" type="text" autocomplete="optionA"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="optionB" class="block text-sm font-medium text-gray-900">Option B</label>
                        <div class="mt-2">
                            <input id="optionB" name="optionB" type="text" autocomplete="optionB"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="optionC" class="block text-sm font-medium text-gray-900">Option C</label>
                        <div class="mt-2">
                            <input id="optionC" name="optionC" type="text" autocomplete="optionC"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="optionD" class="block text-sm font-medium text-gray-900">Option D</label>
                        <div class="mt-2">
                            <input id="optionD" name="optionD" type="text" autocomplete="optionD"
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
                        Save Question
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
