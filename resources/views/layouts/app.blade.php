<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Vite CSS -->
    <link rel="stylesheet" href="/build/assets/app.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="/build/assets/app.js" defer></script>
    <script src="https://js.stripe.com/v3/"></script>

</head>
<body class="bg-gray-100 font-sans antialiased">
    <main class="p-0">
        @yield('content')
    </main>

    


    <!-- Vite JS -->
    @vite('resources/js/app.js')

    

</body>
</html>
