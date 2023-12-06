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
<body class="flex flex-col h-screen bg-dark">
    
    <div class="w-11/12 max-w-[450px] m-auto">
        
        {{-- Alert Start --}}
        @if (session()->has('loginError'))
            <div class="" id="alert-card">
                <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-red-600 bg-red-600 text-red-600">
                    <div class="ms-4">
                        Login Gagal
                    </div>
                    <button type="button" class="w-8 h-8 flex justify-center items-center ms-auto" id="button-close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
        @endif
        {{-- Alert End --}}

        <!-- Login Area Start -->
        <div class="w-full py-10 rounded-md shadow-md bg-white text-dark">
            <div class="text-center">
                <h4 class="font-bold text-xl mb-2">Pst! Sukai ya</h4>
                <h2 class="font-bold text-2xl md:text-3xl"><span class="text-primary italic">Admin</span>Dashboard</h2>
            </div>
            <div class="px-4 pt-9 md:px-9 text-black">
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="text-sm font-semibold mb-1 block">Username</label>
                        <input type="text" name="username" id="username" class="text-sm font-medium border-2 border-slate-300 rounded-md w-full p-2 focus:border-secondary focus:outline-none" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-sm font-semibold mb-1 block">Password</label>
                        <input type="password" name="password" id="password" class="text-sm font-medium border-2 border-slate-300 rounded-md w-full p-2 focus:border-secondary focus:outline-none" required>
                    </div>
                    <button type="submit" class="w-full text-base bg-primary text-white font-semibold rounded-md my-5 py-1 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30">Login</button>
                </form>
            </div>
        </div>
        <!-- Login Area End -->
    </div>

    <!-- Fontawesome Icon -->
    <script src="https://kit.fontawesome.com/fffa6787c5.js" crossorigin="anonymous"></script>

    {{-- Login JS --}}
    <script src="js/login.js"></script>
</body>
</html>