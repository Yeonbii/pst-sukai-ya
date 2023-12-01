@extends('dashboard.layouts.main')

@section('container')

    <div class="flex flex-wrap justify-between items-end h-[44px]">
        <div class="w-full md:w-1/2">
            <h3 class="font-semibold text-xl">Manage Form</h3>
        </div>

        <div class="w-full md:w-1/2 flex">
            <a href="/dashboard/manage-form/create" class="font-semibold text-sm bg-blue-700 text-white w-full md:max-w-xs rounded-md mt-2 ms-auto py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center"><i class="fa-solid fa-plus me-2"></i> Tambah Pertanyaan</a>
        </div>
        
    </div>

    <div class="pt-12 pb-12">
        {{-- Table Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-3">

                <div class="flex flex-wrap justify-between items-center mb-2">

                    <div class="w-full md:w-1/2 mb-5">
                        <a href="/dashboard/manage-form/show" class="font-semibold text-sm bg-slate-400 text-white rounded-md py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Lihat Form</a>
                    </div>
                        
                    <div class="w-full md:w-1/2 flex mb-3">
                        <input id="" name="" type="search" class="w-full md:max-w-sm text-sm ms-auto py-2 px-4 border-2 rounded-md hover:bg-opacity-80 focus:border-secondary focus:outline-none" placeholder="Search">
                    </div>

                </div>
           
                
                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    <div class="w-full text-sm text-left text-gray-500">
                        
                        <div class="list-item border-b-2 mb-4 p-2 md:p-4">
                            <p class="mb-3 font-semibold">Nilai Pelayanan Langsung - 1</p>
                            <p class="mb-3">Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?</p>
                            
                            <div class="mb-3">
                                <p>1. Tidak Sesuai</p>
                                <p>2. Kurang Sesuai</p>
                                <p>3. Sesuai</p>
                                <p>4. Sangat Sesuai</p>
                            </div>

                            <p class="mb-3 font-semibold text-yellow-500">Triggered Question</p>

                            <div class="action-item hidden mb-4 flex-wrap justify-end">
                                <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-blue-500 hover:opacity-80">
                                    <i class="fa-solid fa-pen"></i>
                                    <span class="ms-2 group-hover:underline">Edit</span>
                                </a>
                                <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-primary hover:opacity-80">
                                    <i class="fa-solid fa-pen"></i>
                                    <span class="ms-2 group-hover:underline">Edit Selection</span>
                                </a>
                                <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-yellow-500 hover:opacity-80">
                                    <i class="fa-solid fa-pen"></i>
                                    <span class="ms-2 group-hover:underline">Edit Triggered Question</span>
                                </a>
                                <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-red-500 hover:opacity-80">
                                    <i class="fa-solid fa-trash-can"></i>
                                    <span class="ms-2 group-hover:underline">Delete</span>
                                </a>
                            </div>   
                        </div>
                        
                        <div class="list-item border-b-2 mb-4 p-2 md:p-2">
                            <p class="mb-3 font-semibold">Nilai Pelayanan Langsung - 2</p>
                            <p class="mb-3">Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?</p>

                            <div class="action-item hidden mb-4 flex-wrap justify-end">
                                <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-blue-500 hover:opacity-80">
                                    <i class="fa-solid fa-pen"></i>
                                    <span class="ms-2 group-hover:underline">Edit</span>
                                </a>
                                <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-red-500 hover:opacity-80">
                                    <i class="fa-solid fa-trash-can"></i>
                                    <span class="ms-2 group-hover:underline">Delete</span>
                                </a>
                            </div>   
                        </div>

                    </div>

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