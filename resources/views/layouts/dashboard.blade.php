<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>@yield('title', 'Dashboard')</title>
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-white shadow-md h-screen sticky top-0">
            @include('components.sidebar')
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>

</html>
