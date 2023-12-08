@extends('dashboard.layouts.main')

@section('container')

    <div class="flex flex-wrap justify-between items-end h-[44px]">
        <div class="w-full md:w-1/2">
            <h3 class="font-semibold text-xl">Manage Form</h3>
        </div>

        <div class="w-full md:w-1/2">
        
            <div class="relative w-full z-10">
                <div id="tambah-pertanyaan" class="font-semibold text-sm bg-blue-700 text-white w-full md:max-w-xs rounded-md mt-2 ms-auto py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer"><i class="fa-solid fa-plus me-2"></i> Tambah Pertanyaan</div>
                
                <div id="pilihan-tambah" class="hidden absolute w-full">
                    <div class="bg-white rounded-md shadow-lg mt-2 ms-auto p-2 md:max-w-xs">
                        <ul>
                            @foreach ($parts as $part)
                            <li class="group">
                                <a href="/dashboard/manage-form/create/{{ $part->code }}" class="text-base text-dark p-2 mb-2 flex group-hover:bg-slate-100 group-hover:bg-opacity-70 group-hover:rounded-md group-hover:text-primary">{{ $part->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>

            </div>

        </div>
        
    </div>

    <div class="pt-12 pb-12">
        {{-- Table Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-3">

                <div class="flex flex-wrap justify-between items-end mb-3">

                    <div class="w-full md:w-1/2 flex flex-wrap">

                        <a href="/dashboard/manage-form/show" class="block w-full md:w-[150px] md:max-w-[300px] font-semibold text-sm bg-slate-400 text-white rounded-md py-2 px-8 mb-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Lihat Form</a>
                        
                        <div id="filter-button" class="w-full md:w-[150px] md:max-w-[300px] truncate font-semibold text-sm bg-primary text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                            Filter
                        </div>

                        <div id="filter-part" class="absolute z-[99] flex inset-0 bg-black bg-opacity-50 hidden">
                            <div id="filter-area" class="bg-white shadow-lg ms-auto p-4 pt-12 flex flex-col">
                                
                                <p class="font-semibold text-xl text-primary my-5 text-center italic">Filter Bagian</p>

                                <ul>
                                    @foreach ($parts as $part)
                                    <li class="group">
                                        <a href="/dashboard/manage-form/create/{{ $part->code }}" class="text-base text-dark p-4 mb-2 flex group-hover:bg-slate-100 group-hover:bg-opacity-70 group-hover:rounded-md group-hover:text-primary">{{ $part->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>

                                <div id="close-filter" class="text-base font-semibold text-white bg-dark rounded-md p-1 mb-12 mt-auto flex justify-center items-center hover:bg-opacity-70 duration-300">Tutup</div>
                            </div>
                            
                        </div>
                        
                    </div>
                        
                    <div class="w-full md:w-1/2 flex">
                        <input id="" name="" type="search" class="w-full md:max-w-sm text-sm ms-auto py-2 px-4 mb-3 border-2 rounded-md hover:bg-opacity-80 focus:border-secondary focus:outline-none" placeholder="Search">
                    </div>

                </div>
           
                
                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    <div class="w-full text-sm text-left text-gray-500 border-t-2 pt-2 md:pt-7">
                        
                        @foreach ($questions as $question)
                            <div class="list-item border-b-2 mb-4 p-2 md:p-7 hover:bg-slate-300 hover:bg-opacity-30">
                                <p class="mb-3 font-semibold">{{ $question->part->name }} - {{ $question->no }}</p>
                                <p class="mb-3">{{ $question->text }}</p>
                               
                                @foreach ($question->options as $option)
                                    <div class="mb-3">
                                        <p>{{ $option->no }}. {{ $option->text }}</p>
                                    </div>
                                @endforeach

                                <div class="action-item hidden mb-4 flex-wrap justify-end">
                                    <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-blue-500 hover:opacity-80">
                                        <i class="fa-solid fa-pen"></i>
                                        <span class="ms-2 group-hover:underline">Edit</span>
                                    </a>

                                    @if ($question->options->count() > 0)
                                        <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-primary hover:opacity-80">
                                            <i class="fa-solid fa-pen"></i>
                                            <span class="ms-2 group-hover:underline">Edit Selection</span>
                                        </a>
                                    @endif
                                    
                                    <a href="#" class="group h-9 mr-3 px-1 rounded-md flex items-center text-red-500 hover:opacity-80">
                                        <i class="fa-solid fa-trash-can"></i>
                                        <span class="ms-2 group-hover:underline">Delete</span>
                                    </a>
                                </div>   
                            </div>
                        @endforeach

                    </div>

                    <div class="flex">
                        <div class="ms-auto">
                            {{ $questions->links() }}
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
            var tambahPertanyaan = document.querySelector('#tambah-pertanyaan');
            var listItem = document.querySelectorAll('.list-item');
            var filterButton = document.querySelector('#filter-button');
            var filterPart = document.querySelector('#filter-part');
            var filteArea = document.querySelector('#filter-area');
            var closeFilter = document.querySelector('#close-filter');
        
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

            tambahPertanyaan.addEventListener('click', function() {
                var pilihanTambah = document.querySelector('#pilihan-tambah');

                pilihanTambah.classList.toggle('hidden');
            });

            filterButton.addEventListener('click', function() {
                filterPart.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });

            closeFilter.addEventListener('click', function() {
                filterPart.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });

        });
        
    </script>      

@endsection