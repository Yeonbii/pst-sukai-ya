<header class="sticky z-20 bg-dark shadow-md top-0 right-0 w-full flex items-center justify-center">
    <div class="w-full">
        <div class="flex items-center justify-between text-white">
            <div class="flex items-center px-4">
                <button id="hamburger-2" name="hamburger-2" type="button" class="block mx-4 px-1 md:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                </button>
                <a href="/" class="font-bold text-xl block py-3 ps-3 pe-5 md:ps-5">
                    Pst! Sukai ya
                </a>
            </div>
            <div class="ms-auto py-4 px-4 md:px-9">
                <button id="admin-button" class="font-semibold text-sm py-2">
                    Admin
                    <i class="fa-solid fa-caret-down ms-1 md:ms-2 transition duration-300 ease-in-out origin-center text-slate-500"></i>
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
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>