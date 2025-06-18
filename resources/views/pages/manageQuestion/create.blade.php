@extends('layouts.dashboard')
@section('title', 'Dashboard | Add Question')
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
                        Add Question
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Table --}}
    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow mt-5">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-xl font-semibold">Question List</h1>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <div>
                <div class="flow-root">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden rounded-lg bg-white shadow border border-gray-200">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Id
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Exam Id</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Question</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Created At</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Updated At</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                1</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">1</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ \Illuminate\Support\Str::limit('lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 50) }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">18/06/2025</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">18/06/2025</td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <div x-data="{ open: false }" class="inline-flex items-center gap-2">
                                                    <a href="/dashboard/question/edit"
                                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <a href="#" @click.prevent="open = true"
                                                        class="text-red-600 hover:text-red-900 ms-1">Delete</a>
                                                    <div x-show="open" x-transition
                                                        class="fixed inset-0 z-20 flex items-end sm:items-center justify-center overflow-y-auto p-4"
                                                        role="dialog" aria-modal="true">
                                                        <div @click.away="open = false"
                                                            class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl sm:my-8 sm:w-full sm:max-w-lg sm:p-6"
                                                            x-transition:enter="ease-out duration-300"
                                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave="ease-in duration-200"
                                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                                            <div class="sm:flex sm:items-start">
                                                                <div
                                                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                    <svg class="h-6 w-6 text-red-600" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" aria-hidden="true">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                                    <h3
                                                                        class="text-base font-semibold leading-6 text-gray-900">
                                                                        Hapus Data</h3>
                                                                    <div class="mt-2">
                                                                        <p class="text-sm text-gray-500">Apakah kamu yakin
                                                                            ingin
                                                                            menghapus data ini?</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                                                <form method="POST" action="/route-delete"
                                                                    onsubmit="return confirm('Yakin ingin hapus?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                                <button type="button" @click="open = false"
                                                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
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
        </div>
    </div>
@endsection
