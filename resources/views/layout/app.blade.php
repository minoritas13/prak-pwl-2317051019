<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU09FeRpok6YCtnYmDr5pNlyT2bRJxH0JmjY6hW+ALEWIH"
        crossorigin="anonymous">
</head>

<body>
    @yield('content')

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-VypcrYf0tY31HB6ONNmXc5s9fDVZLESAAAS5NDzOxhy9GkcIdsIk1eN7N6jIeHZ"
        crossorigin="anonymous">
    </script>
</body>
</html>
