<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>

<body>
    <form class="max-w-sm mx-auto flex flex-col">
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
</body>

</html>
