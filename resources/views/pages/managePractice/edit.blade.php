@extends('layouts.dashboard')
@section('title', 'Dashboard | Edit Practice')
@section('content')
    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-xl font-semibold">Edit Pratice ({{ $practice['name'] }})</h1>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('practice.edit', $practice['id']) }}" method="POST" class="p-4">
                @csrf
                @method('PUT')
                <div class="relative flex items-start mb-5">
                    <div class="flex h-6 items-center">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox"
                            value="1" @checked(old('ar', $practice['ar']) == 1)
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    <div class="ml-3 text-sm leading-6">
                        <label for="comments" class="font-medium text-gray-900">Augmented Reality</label>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900">Practice Name</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" autocomplete="name"
                                value="{{ $practice['name'] }}"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-900">Category</label>
                        <div class="mt-2">
                            <input id="category" name="category" type="text" autocomplete="category"
                                value="{{ $practice['kategori'] }}"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="video" class="block text-sm font-medium text-gray-900">Video (link)</label>
                        <div class="mt-2">
                            <input id="video" name="video" type="text" autocomplete="video"
                                value="{{ $practice['video'] }}"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-900">Duration (minute)</label>
                        <div class="mt-2">
                            <input id="duration" name="duration" type="duration" autocomplete="duration"
                                value="{{ $practice['durasi'] }}"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="5"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ $practice['deskripsi'] }}</textarea>
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
                        Save Practice
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
