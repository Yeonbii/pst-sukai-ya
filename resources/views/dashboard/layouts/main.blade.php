<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-light">
    
    <div class="w-full">
        <div class="flex">

            <!-- Sidebar Start -->
            @include('dashboard.layouts.sidebar')
            <!-- Sidebar End -->

            <!-- Main Start -->
            <main class="w-full ms-auto expand-main transition-width duration-300 ease-in-out">

                <!-- Header Start -->
                @include('dashboard.layouts.header')
                <!-- Header End -->

                <!-- Test -->
                <div id="main-content" class="px-4 py-9 md:px-9 md:py-10">
                    @yield('container')
                </div>
            </main>
            <!-- Main End -->

        </div>
    </div>
    
        <!-- Fontawesome Icon -->
        <script src="https://kit.fontawesome.com/fffa6787c5.js" crossorigin="anonymous"></script>
    
        <!-- Dashboard JS -->
        <script src="js/dashboard.js"></script>
</body>
</html>