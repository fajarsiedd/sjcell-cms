<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/superjay-emblem.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>

<body class="bg-gray-800">
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="flex flex-col bg-white rounded-md p-8 w-1/4">
            <div class="self-center">
                <img src="/img/superjay-logo.png" class="w-40" alt="superjay-logo">
            </div>
            <div class="text-2xl font-semibold my-6">Sign In</div>
            <form class="flex flex-col">
                <div class="mb-5">
                    <x-input-label for="email">Your Email</x-input-label>
                    <x-text-input type="email" id="email" required />
                </div>
                <div class="mb-5">
                    <x-input-label for="password">Password</x-input-label>
                    <x-text-input type="password" id="password" required />
                </div>
                <x-primary-button class="self-end">
                    Sign In
                </x-primary-button>
            </form>
        </div>
    </div>
</body>

</html>
