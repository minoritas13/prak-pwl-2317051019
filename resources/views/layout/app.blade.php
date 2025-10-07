<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">

    <x-header/>

    <main class="flex-1 container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <x-footer/>

</body>
</html>
