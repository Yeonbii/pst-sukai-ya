<aside class="fixed z-20 bg-black top-0 left-0 h-screen w-0 md:w-[95px] md:max-w-[20rem] overflow-hidden text-white transition-width duration-300 ease-in-out" id="sidebar">
    <div class="w-full whitespace-nowrap h-full flex flex-col justify-between">
        <div>
            <div class="flex items-center h-[68px] px-4 w-[14rem] md:w-[20rem]">
                <div class="py-2 px-5">
                    <button id="hamburger" name="hamburger" type="button" class="block">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                </div>
                <span class="hidden w-full font-bold text-lg ms-1 text-primary">
                    <em class="text-white">Admin</em>Dashboard
                </span>
            </div>
            <ul class="text-sm pt-3 font-bold text-light">
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
        </div>
        <a href="login.html" class="text-sm font-bold text-dark py-2 mx-4 mb-12 flex items-center h-[40px] bg-light rounded-md hover:opacity-80 transition duration-300 ease-in-out">
            <i class="fa-solid fa-right-from-bracket text-base mx-5"></i>
            <span class="hidden">Logout</span>
        </a>
    </div>
</aside>