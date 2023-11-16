@extends('dashboard.layouts.main')

@section('container')

    <div class="flex flex-wrap justify-between items-end">
        <div class="w-full md:w-1/2 mb-3">
            <h3 class="font-semibold text-xl">Manage Form</h3>
        </div>

        <div class="w-full md:w-1/2 flex">
            <a href="/dashboard/manage-form/create" class="font-semibold text-sm bg-blue-700 text-white w-full md:max-w-xs rounded-md mt-2 ms-auto py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center"><i class="fa-solid fa-plus me-2"></i> Tambah Pertanyaan</a>
        </div>
        
    </div>

    <div class="pt-12 pb-12">
        {{-- Table Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-5">

                <div class="flex flex-wrap justify-between items-end mb-2">

                    <div class="w-full md:w-1/2">
                        <button class="font-semibold text-sm bg-slate-400 text-white rounded-md mt-2 mb-3 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Lihat Form</button>
                    </div>
                        
                    <div class="w-full md:w-1/2 flex">
                        <input id="" name="" type="search" class="w-full md:max-w-sm text-sm mt-2 mb-3 ms-auto py-2 px-4 border-2 rounded-md hover:bg-opacity-80 focus:border-secondary focus:outline-none" placeholder="Search">
                    </div>

                </div>
           
                
                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    {{-- Table untuk layar responsive tablet atau laptop --}}
                    <table id="md-table" class="hidden w-full text-sm text-left text-gray-500 md:block">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-3/12">
                                    Part
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 w-6/12">
                                    Text
                                </th>
                                <th scope="col" class="px-6 py-3 w-2/12">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 capitalize font-semibold">
                                    Nilai Pelayanan Langsung
                                </td>
                                <td class="px-6 py-4">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex">
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
                                <td class="px-6 py-4 capitalize font-semibold">
                                    Nilai Pelayanan Langsung
                                </td>
                                <td class="px-6 py-4">
                                    2
                                </td>
                                <td class="px-6 py-4">
                                    Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex">
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
                        
                        <div class="list-item border-b-2 mb-4">
                            <p class="mb-3 font-semibold">Nilai Pelayanan Langsung - 1</p>
                            <p class="mb-3">Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan</p>

                            <div class="action-item hidden mb-4">
                                <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-yellow-500 border border-yellow-500 hover:border-yellow-500 hover:bg-yellow-500 hover:text-white">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="w-9 h-9 mr-3 rounded-md flex justify-center items-center text-red-500 border border-red-500 hover:border-red-500 hover:bg-red-500 hover:text-white">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>   
                        </div>
                        
                        <div class="list-item border-b-2 mb-4">
                            <p class="mb-3 font-semibold">Nilai Pelayanan Langsung - 2</p>
                            <p class="mb-3">Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan</p>

                            <div class="action-item hidden mb-4">
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