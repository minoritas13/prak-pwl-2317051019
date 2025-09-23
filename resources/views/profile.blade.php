<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <!-- Foto Profil -->
        <div class="w-32 h-32 rounded-full bg-gray-300 flex items-center justify-center">
            <!-- Ikon user -->
            <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2V19.2c0-3.2-6.4-4.8-9.6-4.8z" />
            </svg>
        </div>

        <!-- Data -->
        <div class="mt-6 w-64 space-y-3">
            <div class="bg-gray-300 text-center py-2 rounded">{{ $nama }}</div>
            <div class="bg-gray-300 text-center py-2 rounded">{{ $NPM }}</div>
            <div class="bg-gray-300 text-center py-2 rounded">{{ $kelas }}</div>
        </div>
    </div>

</body>

</html>
