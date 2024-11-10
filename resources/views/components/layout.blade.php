<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('img/superjay-emblem.png') }}">
    <title>{{ $title }}</title>
</head>

<body class="bg-gray-50">
    <x-navbar />

    <x-sidebar />

    <main>
        <div class="p-4 sm:ml-64 mt-14">
            @include('flash-messages')
            
            <div class="p-6 bg-white border border-gray-200 rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>
