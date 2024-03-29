<aside class="fixed z-30 bg-black top-0 left-0 h-screen w-0 md:w-[95px] md:max-w-[20rem] overflow-hidden text-white transition-width duration-300 ease-in-out" id="sidebar">
    <div class="w-full whitespace-nowrap h-full flex flex-col justify-between">
        <div>

            <div class="flex items-center h-[68px] px-4 w-[14rem] md:w-[20rem]">
                
                {{-- Icon Menu Start --}}
                <div class="py-2 px-5">
                    <button id="hamburger" name="hamburger" type="button" class="block">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                </div>
                {{-- Icon Menu End --}}

                {{-- Text Menu Start --}}
                <span class="hidden w-full font-bold text-lg ms-1 text-primary">
                    <em class="text-white">Admin</em>Dashboard
                </span>
                {{-- Text Menu End --}}

            </div>

            {{-- List Menu Start --}}
            <ul class="text-sm pt-3 font-bold text-light">
                
                {{-- Dahshboard Menu --}}
                <li>
                    <a href="/dashboard" class="py-2 my-4 mx-4 flex items-center h-[40px] rounded-md transition duration-300 ease-in-out {{ Request::is('dashboard', 'dashboard/manage-chart*') ? 'selected-menu' : 'unselected-menu' }}">
                        <i class="fa-solid fa-house text-base mx-5"></i>
                        <span class="hidden">Dashboard</span>
                    </a>
                </li>

                {{-- Manage Form Menu --}}
                <li>
                    <a href="/dashboard/manage-form" class="py-2 mx-4 my-4 flex items-center h-[40px] rounded-md transition duration-300 ease-in-out {{ Request::is('dashboard/manage-form*') ? 'selected-menu' : 'unselected-menu' }}">
                        <i class="fa-solid fa-file-pen text-base mx-5"></i>
                        <span class="hidden">Manage Form</span>
                    </a>
                </li>

                {{-- Data Responden Menu --}}
                <li>
                    <a href="/dashboard/data-responden" class="py-2 mx-4 my-4 flex items-center h-[40px] rounded-md transition duration-300 ease-in-out {{ Request::is('dashboard/data-responden*') ? 'selected-menu' : 'unselected-menu' }}">
                        <i class="fa-solid fa-users text-base mx-5"></i>
                        <span class="hidden">Data Responden</span>
                    </a>
                </li>

                {{-- Data Archive Menu --}}
                <li>
                    <a href="/dashboard/archive" class="py-2 mx-4 my-4 flex items-center h-[40px] rounded-md transition duration-300 ease-in-out {{ Request::is('dashboard/archive*') ? 'selected-menu' : 'unselected-menu' }}">
                        <i class="fa-solid fa-box-archive text-base mx-5"></i>
                        <span class="hidden">Data Archive</span>
                    </a>
                </li>

            </ul>
            {{-- List Menu End --}}

        </div>

        {{-- Tombol Logout Start --}}
        <form action="/logout" method="post" class="px-4">
            @csrf
            <button type="submit" class="text-sm font-bold text-dark py-2 mb-12 w-full flex items-center h-[40px] bg-light rounded-md hover:opacity-80 transition duration-300 ease-in-out">
                <i class="fa-solid fa-right-from-bracket text-base mx-5"></i>
                <span class="hidden">Logout</span>
            </button>
        </form>
        {{-- Tombol Logout End --}}

    </div>
</aside>