@php
    $settings = \App\Models\GeneralSettings::first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | anshoria</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $settings->logo) }}">

    @vite(['resources/css/app.css','resources/js/app.js'])
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    // Cek tema sebelum render konten
    if (localStorage.getItem('theme') === 'dark' || 
        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>
</head>
<body class="dark:bg-[#171527] transition-colors duration-200">
    <div id="particles-js"></div>
    <div class="content-wrapper min-h-screen">
        @include('components.navbar')
        
        <main>
            @yield('content')
        </main>
        
        @include('components.footer')
    </div>
    
    @include('components.modal')
    
    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
        });
    </script>
</body>
</html>


{{-- perubahan pada nama folder dengan Layouts menjadi layouts --}}