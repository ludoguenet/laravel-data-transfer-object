<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body>
    @include('navbar')
    @include('alert')
    <section class="antialiased text-gray-600 px-4">
        <div class="flex flex-col justify-center h-full mt-10">
            <!-- Table -->
            <div class="w-full max-w-7xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Articles</h2>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
