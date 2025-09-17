<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    <title>Badminton App | Forgot Password</title>
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <a href="/" class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto max-w-[250px] w-full h-auto" src="{{ asset('img/logo.png') }}" alt="Badminton App" />
        </a>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm border border-gray-200 rounded-xl shadow-md p-6 bg-white">
            <h2 class="text-center text-2xl/9 font-bold tracking-tight text-gray-900">Forgot your password?</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Enter your email address and we’ll send you a link to reset your password.
            </p>
            <form class="space-y-6 mt-8" action="{{ route('password.forgot') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
                @if (session('success'))
                    <p class="mt-6 text-center text-sm/6 text-green-600 font-medium">
                        {{ session('success') }}
                    </p>
                @endif
                @if (session('error'))
                    <p class="mt-6 text-center text-sm/6 text-red-600 font-medium">
                        {{ session('error') }}
                    </p>
                @endif
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Send reset link
                    </button>
                </div>
            </form>
            <p class="mt-6 text-center text-sm/6 text-gray-500">
                We’ll send instructions to reset your password to the email above.
            </p>
        </div>
    </div>
</body>

</html>
