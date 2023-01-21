@extends('welcome')

@section('content')
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Your title
            </label>
            <input
                type="text"
                id="title"
                name="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Dune"
                value="{{ old('title') }}"
            >
        </div>
        <div class="mb-6">
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Your content
            </label>
            <textarea
                id="content"
                name="content"
                rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="A beginning is the time for taking the most delicate care that the balances are correct..."
            >{{ old('content') }}</textarea>
        </div>
        <div class="mb-6">
            <label for="published_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Published at?
            </label>
            <input
                type="date"
                id="published_at"
                name="published_at"
                value="{{ old('published_at') }}"
            >
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
