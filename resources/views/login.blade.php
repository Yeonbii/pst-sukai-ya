<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col h-screen bg-secondary">
    
    <!-- Alert Start -->
    <div class="absolute w-full top-16 z-10" id="alert-card">
        <div class="card-login card-alert center-y border-red-600 bg-red-600 text-red-600">
            <div class="ms-4">
                Login Gagal
            </div>
            <button type="button" class="w-8 h-8 center-xy ms-auto" id="button-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>
    <!-- Alert End -->

    <!-- Login Area Start -->
    <div class="card-login bg-white text-dark">
        <div class="text-center my-5">
            <h4 class="font-bold text-xl mb-2">Pst! Sukai ya</h4>
            <h2 class="font-bold text-2xl md:text-3xl"><span class="text-primary italic">Admin</span>Dashboard</h2>
        </div>
        <div class="m-10">
            <form action="">
                <div class="mb-3">
                    <h6 class="label-input">Username</h6>
                    <input type="text" name="" id="" class="text-input" autofocus>
                </div>
                <div class="mb-3">
                    <h6 class="label-input">Password</h6>
                    <input type="password" name="" id="" class="text-input">
                </div>
                <!-- <button type="submit" class="button-input">Login</button> -->
                <a href="/dashboard" type="button" class="button-input text-center">Login</a>
            </form>
        </div>
    </div>
    <!-- Login Area End -->

    <!-- Fontawesome Icon -->
    <script src="https://kit.fontawesome.com/fffa6787c5.js" crossorigin="anonymous"></script>

    {{-- Login JS --}}
    <script src="js/login.js"></script>
</body>
</html>