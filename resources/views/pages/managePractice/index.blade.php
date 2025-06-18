@extends('layouts.dashboard')
@section('title', 'Dashboard | ' . $title)
@section('content')
    <div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Practice</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the practices including their name, thumbnail, category,
                    duration, and
                    video.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a href="/dashboard/practice/create"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                    Practice</a>
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
                                        Thumbnail</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Category</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Duration</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Video</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        1</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Practice Pack 1
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Null</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Smash</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">5 Minutes</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        https://youtube.com/embed/abcdefg</td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <div x-data="{ open: false }" class="inline-flex items-center gap-2">
                                            <a href="/dashboard/practice/edit"
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
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                            </svg>
                                                        </div>
                                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                Hapus Data</h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500">Apakah kamu yakin ingin
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
@endsection
