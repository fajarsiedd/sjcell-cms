<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>

<body class="bg-gray-50">
    <x-navbar />

    <x-sidebar />

    <div class="p-4 sm:ml-64 mt-14">
        <div class="p-6 bg-white border border-gray-200 rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
