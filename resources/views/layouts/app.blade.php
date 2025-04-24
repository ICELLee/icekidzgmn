<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICEKIDZ Gaming Network - @yield('title')</title>
    <!-- im <head> -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white font-poppins">
<!-- Background Animation -->
<div class="fixed inset-0 -z-10 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-purple-900/20 to-blue-900/20"></div>
    <div class="absolute inset-0 bg-[url('{{ asset('images/grid.png') }}')] opacity-10"></div>
    <div class="absolute inset-0 bg-[url('{{ asset('images/particles.png') }}')] opacity-10 animate-pulse"></div>
</div>

@include('shared.navbar')

<main>
    @yield('content')
</main>

@include('shared.footer')

<!-- Scripts -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
</script>
</body>
</html>
