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
    
        <!-- Header Start -->
        <header class="fixed z-10 bg-dark shadow-md top-0 left-0 w-full flex items-center justify-center">
            <div class="w-full">
                <div class="flex items-center justify-between text-white">
                    <div class="flex items-center px-4">
                        <button id="hamburger" name="hamburger" type="button" class="block px-1 md:px-5">
                            <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                            <span class="hamburger-line transition duration-300 ease-in-out"></span>
                            <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                        </button>
                        <a href="/" class="font-bold text-lg block py-6 px-5">
                            Pst! Sukai ya
                        </a>
                    </div>
                    <div class="px-4 md:px-9">
                        <button id="admin-button" class="font-semibold">
                            Admin
                            <i class="fa-solid fa-caret-down ms-2 transition duration-300 ease-in-out origin-center"></i>
                        </button>
                        <div id="admin-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg w-full right-0 top-full md:max-w-[300px] md:right-8">
                            <ul>
                                <li class="group">
                                    <a href="/" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Beranda</a>
                                </li>
                                <li class="group">
                                    <a href="#" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Admin Setting</a>
                                </li>
                                <li class="group">
                                    <a href="/login" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
    
    
        <div class="w-full">
            <div class="flex">
    
                <!-- Sidebar Start -->
                <aside class="fixed z-9 bg-black top-0 left-0 h-screen pt-32 w-0 md:w-[95px] md:max-w-[20rem] overflow-hidden text-white transition-width duration-300 ease-in-out" id="sidebar">
                    <div class="w-full whitespace-nowrap h-full flex flex-col justify-between">
                        <ul class="text-sm font-bold text-light">
                            <li>
                                <a href="#" class="py-2 my-4 mx-4 flex items-center h-[40px] bg-primary rounded-md hover:bg-opacity-80 transition duration-300 ease-in-out">
                                    <i class="fa-solid fa-house text-base mx-5"></i>
                                    <span class="hidden">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 mx-4 my-4 flex items-center h-[40px] rounded-md hover:bg-light hover:bg-opacity-30 transition duration-300 ease-in-out">
                                    <i class="fa-solid fa-file-pen text-base mx-5"></i>
                                    <span class="hidden">Manage Form</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 mx-4 my-4 flex items-center h-[40px] rounded-md hover:bg-light hover:bg-opacity-30 transition duration-300 ease-in-out">
                                    <i class="fa-solid fa-users text-base mx-5"></i>
                                    <span class="hidden">Data Responden</span>
                                </a>
                            </li>
                        </ul>
                        <a href="login.html" class="text-sm font-bold text-dark py-2 mx-4 mb-12 flex items-center h-[40px] bg-light rounded-md hover:opacity-80 transition duration-300 ease-in-out">
                            <i class="fa-solid fa-right-from-bracket text-base mx-5"></i>
                            <span class="hidden">Logout</span>
                        </a>
                    </div>
                </aside>
                <!-- Sidebar End -->
    
                <!-- Main Start -->
                <main class="w-full ms-auto pt-32 expand-main transition-width duration-300 ease-in-out">
                    
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