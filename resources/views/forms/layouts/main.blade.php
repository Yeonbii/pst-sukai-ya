<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-dark">

    <header class="w-full flex items-center">
        <div class="container py-6">
            <a href="/" class="font-bold text-lg underline py-3 text-light hover:text-primary">
                Kembali ke Beranda
            </a>
        </div>
    </header>
    
    <main class="pt-9 pb-12">
        <div class="container">
            
            <div class="px-4 mx-auto md:max-w-2xl">

                @yield('container')

            </div>

        </div>
    </main>

</body>
</html>