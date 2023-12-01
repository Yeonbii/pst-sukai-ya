@extends('dashboard.layouts.main')

@section('container')
    
    <div class="flex h-[44px] items-end">
        <h3 class="font-semibold text-xl">Kelola Chart yang akan Ditampilkan pada Dashboard</h3>
    </div>

    <div class="pt-12 pb-12">
        {{-- Table Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-5">

                <div class="w-full flex mb-2">
                    <input id="" name="" type="search" class="w-full md:max-w-sm text-sm mt-2 mb-3 ms-auto py-2 px-4 border-2 rounded-md hover:bg-opacity-80 focus:border-secondary focus:outline-none" placeholder="Search">
                </div>

                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    {{-- Table untuk layar responsive tablet atau laptop --}}
                    <table id="md-table" class="hidden w-full text-sm text-left text-gray-500 md:table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="text-center py-3 w-1/12">
                                    Order
                                </th>
                                <th scope="col" class="text-center py-3 w-7/12">
                                    Title
                                </th>
                                <th scope="col" class="text-center py-3 w-2/12">
                                    Show
                                </th>
                                <th scope="col" class="text-center py-3 w-2/12">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="bg-white border-b">
                                <td class="text-center py-4">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    Pendidikan yang ditamatkan
                                </td>
                                <td class="flex justify-center py-4">
                                    <button class="group flex justify-center items-center w-3/5 h-9 rounded-md font-semibold text-secondary">
                                        <div class="w-full h-9 rounded-l-md flex justify-center items-center bg-white border border-secondary group-hover:bg-secondary group-hover:bg-opacity-90 duration-300">
                                            Yes
                                        </div>
                                        <div class="w-full h-9 rounded-r-md flex justify-center items-center border border-secondary bg-secondary group-hover:bg-opacity-90 duration-300">
                                            No
                                        </div>  
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-yellow-500 border border-yellow-500 hover:border-yellow-500 hover:bg-yellow-500 hover:text-white">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-red-500 border border-red-500 hover:border-red-500 hover:bg-red-500 hover:text-white">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>                
                                </td>
                            </tr>

                            <tr class="bg-white border-b">
                                <td class="text-center py-4">
                                    2
                                </td>
                                <td class="px-6 py-4">
                                    Jenis Kelamin
                                </td>
                                <td class="flex justify-center py-4">
                                    <button class="group flex justify-center items-center w-3/5 h-9 rounded-md font-semibold text-secondary">
                                        <div class="w-full h-9 rounded-l-md flex justify-center items-center bg-secondary border border-secondary group-hover:text-white duration-500">
                                            Yes
                                        </div>
                                        <div class="w-full h-9 rounded-r-md flex justify-center items-center border border-secondary bg-white group-hover:bg-secondary duration-500">
                                            No
                                        </div>  
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-yellow-500 border border-yellow-500 hover:border-yellow-500 hover:bg-yellow-500 hover:text-white">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-red-500 border border-red-500 hover:border-red-500 hover:bg-red-500 hover:text-white">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>                 
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    {{-- End Table tsb --}}

                    {{-- Table untuk Hp --}}
                    <div id="sm-table" class="w-full text-sm text-left text-gray-500 md:hidden">
                        
                        <div class="list-item border-b-2 mb-4 p-2">
                            <p class="mb-3"><span class="font-semibold">1 - </span> Pendidikan yang ditamatkan</p>
                            <p class="mb-3 font-semibold">Show : Yes</p>

                            <div class="action-item hidden mb-4">
                                <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-secondary border border-secondary hover:border-secondary hover:bg-secondary hover:text-white">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </a>
                                <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-yellow-500 border border-yellow-500 hover:border-yellow-500 hover:bg-yellow-500 hover:text-white">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-red-500 border border-red-500 hover:border-red-500 hover:bg-red-500 hover:text-white">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>   
                        </div>

                        <div class="list-item border-b-2 mb-4 p-2">
                            <p class="mb-3"><span class="font-semibold">2 - </span> Jenis Kelamin</p>
                            <p class="mb-3 font-semibold">Show : No</p>

                            <div class="action-item hidden mb-4">
                                <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-primary border border-primary hover:border-primary hover:bg-primary hover:text-white">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-yellow-500 border border-yellow-500 hover:border-yellow-500 hover:bg-yellow-500 hover:text-white">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-red-500 border border-red-500 hover:border-red-500 hover:bg-red-500 hover:text-white">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>   
                        </div>

                    </div>
                    {{-- End Table tsb --}}

                </div>
                {{-- Table End --}}
            
            </div>
        </div>            
        {{-- Table End --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const listItem = document.querySelectorAll('.list-item');
        
            listItem.forEach(function (element) {
            element.addEventListener('click', function () {
                var isSelected = element.classList.contains('selected');
                var actionItem = element.querySelector('.action-item');
        
                listItem.forEach(function (e) {
                var ai = e.querySelector('.action-item');
                ai.classList.add('hidden');
                ai.classList.remove('flex');
                e.classList.remove('selected');
                });
        
                if (!isSelected) {
                actionItem.classList.remove('hidden');
                actionItem.classList.add('flex');
                element.classList.add('selected');
                }
            });
            });
        });
    </script>   

@endsection