@extends('dashboard.layouts.main')

@section('container')

    {{-- Warning Start --}}
    <div id="warning" class="fixed flex z-[99] inset-0 bg-black bg-opacity-50 p-4">
        <div class="bg-white w-full max-w-lg m-auto rounded-md p-3">
            <h3 class="text-3xl font-bold text-primary text-center mb-5">PERINGATAN</h3>
            <p class="mb-5">
                Jika terjadi perubahan pada Pertanyaan Form, maka sistem akan <span class="text-red-500">menghapus seluruh data responden</span> dan mengkonvertnya ke file excel.<br>
                File tersebut bisa dilihat pada <span class="text-primary">Menu Archive</span>
            </p>   
            <div class="text-base font-semibold text-white bg-red-500 rounded-md py-2 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer" onclick="closeWarning()">Tutup</div>
        </div>
    </div>
    {{-- Warning End --}}

    {{-- Alert Success Start --}}
    @if (session()->has('success'))
        <div id="alert-card">
            <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-green-500 bg-green-500 text-green-900">
                {{-- Isi Alert --}}
                <div class="ms-4">
                    {{ session('success') }}
                </div>
                {{-- Tombol Close --}}
                <button type="button" class="w-8 h-8 flex justify-center items-center ms-auto" onclick="closeAlert()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <script>
            // Code Menutup Alert
            var alertCard = document.querySelector('#alert-card');
            function closeAlert() {
                alertCard.classList.add('hidden');
            }
        </script>
    @endif
    {{-- Alert Success End --}}

    {{-- Alert Nothing Start --}}
    @if (session()->has('nothing'))
        <div id="alert-card">
            <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-slate-500 bg-slate-500 text-slate-900">
                {{-- Isi Alert --}}
                <div class="ms-4">
                    {{ session('nothing') }}
                </div>
                {{-- Tombol Close --}}
                <button type="button" class="w-8 h-8 flex justify-center items-center ms-auto" onclick="closeAlert()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <script>
            // Code Menutup Alert
            var alertCard = document.querySelector('#alert-card');
            function closeAlert() {
                alertCard.classList.add('hidden');
            }
        </script>
    @endif
    {{-- Alert Nothing End --}}

    {{-- Area dibawah Nav Start --}}
    <div class="flex flex-wrap justify-between items-end h-[44px]">
        
        {{-- Title Page Start --}}
        <div class="w-full md:w-1/2">
            <h3 class="font-semibold text-xl">Manage Form</h3>
        </div>
        {{-- Title Page End --}}

        {{-- Tambah Pertanyaan Start --}}
        <div class="w-full md:w-1/2">
        
            <div class="relative w-full z-10">

                {{-- Tombol Tambah Pertanyaan --}}
                <div id="tambah-pertanyaan" class="font-semibold text-sm bg-blue-700 text-white w-full md:max-w-xs rounded-md mt-2 ms-auto py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer"><i class="fa-solid fa-plus me-2"></i> Tambah Pertanyaan</div>
                
                {{-- Pilihan Tambah Start --}}
                <div id="pilihan-tambah" class="hidden absolute w-full">
                    <div class="bg-white rounded-md shadow-lg mt-2 ms-auto p-2 md:max-w-xs">
                        
                        <ul>

                            {{-- Pilihan Tambah Sesuai Part Pertanyaan Start --}}
                            @foreach ($parts as $part)
                            <li class="group">
                                <a href="/dashboard/manage-form/{{ $part->code }}/create" class="text-base text-dark p-2 mb-2 flex group-hover:bg-slate-100 group-hover:bg-opacity-70 group-hover:rounded-md group-hover:text-primary">{{ $part->name }}</a>
                            </li>
                            @endforeach
                            {{-- Pilihan Tambah Sesuai Part Pertanyaan End --}}

                        </ul>

                    </div>
                </div>
                {{-- Pilihan Tambah End --}}

            </div>

        </div>
        {{-- Tambah Pertanyaan End --}}
        
    </div>
    {{-- Area dibawah Nav End --}}

    <div class="pt-12 pb-12">

        {{-- Table Card Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-3">

                {{-- Area Atas Card Start --}}
                <div class="flex flex-wrap justify-between items-end mb-3">

                    <div class="w-full md:w-1/2 flex flex-wrap">

                        {{-- Tombol Lihat Form --}}
                        <a href="/dashboard/manage-form/show" target="_blank" class="block w-full md:w-[150px] font-semibold text-sm bg-slate-400 text-white rounded-md py-2 px-8 mb-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Lihat Form</a>
                        
                        {{-- Tombol Filter Part --}}
                        <div id="filter-button" class="w-full md:w-auto md:min-w-[150px] md:max-w-[250px] truncate font-semibold text-sm bg-primary text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                            {{ $filter_part }}
                        </div>

                        {{-- Filter Part Start --}}
                        <div id="filter-part" class="fixed z-[99] inset-0 bg-black bg-opacity-50 hidden">
                            
                            {{-- Filter Area Start --}}
                            <div id="filter-area" class="bg-white shadow-lg ms-auto p-4 pt-12 flex flex-col w-[300px]">
                                
                                <p class="font-semibold text-xl text-primary my-5 text-center italic">Filter Bagian</p>

                                <ul>

                                    {{-- Pilihan Semua Bagian --}}
                                    <li class="group">
                                        <a href="/dashboard/manage-form" class="text-base p-4 mb-2 flex group-hover:bg-slate-100 group-hover:bg-opacity-70 group-hover:rounded-md group-hover:text-primary {{ !Request::has('part') ? 'text-primary' : 'text-dark' }}">Semua Bagian</a>
                                    </li>

                                    {{-- Pilihan Sesuai Part Start --}}
                                    @foreach ($parts as $part)
                                        <li class="group">
                                            <a href="/dashboard/manage-form?part={{ $part->code }}" class="text-base p-4 mb-2 flex group-hover:bg-slate-100 group-hover:bg-opacity-70 group-hover:rounded-md group-hover:text-primary {{ (Request::has('part') && Request::input('part') == $part->code) ? 'text-primary' : 'text-dark' }}">{{ $part->name }}</a>
                                        </li>
                                    @endforeach
                                    {{-- Pilihan Sesuai Part End --}}

                                </ul>

                                <div id="close-filter" class="text-base font-semibold text-white bg-dark rounded-md p-2 mt-auto mb-12 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer">Tutup</div>

                            </div>
                            {{-- Filter Area End --}}
                            
                        </div>
                        {{-- Filter Part End --}}
                        
                    </div>
                        
                    {{-- Search Start --}}
                    <form id="search_form" action="/dashboard/manage-form" class="w-full md:w-1/2 flex">
                        {{-- Variabel yang digunakan untuk query gabungan --}}
                        @if (request('part'))
                            <input type="hidden" name="part" value="{{ request('part') }}">
                        @endif
                        {{-- Kolom Search --}}
                        <input id="search" name="search" type="search" class="w-full md:max-w-sm text-sm ms-auto py-2 px-4 mb-3 border-2 rounded-md hover:bg-opacity-80 focus:border-secondary focus:outline-none" placeholder="Search" value="{{ $search }}">
                    </form>
                    {{-- Search End --}}

                </div>
                {{-- Area Atas Card End --}}
                
                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    {{-- Menampilkan Data Start --}}
                    <div class="w-full text-sm text-left text-gray-500 border-t-2 pt-2 md:pt-7">

                        @if ($questions->count())
                            @foreach ($questions as $question)
                                <div class="list-item border-b-2 mb-4 p-2 md:p-7 hover:bg-slate-300 hover:bg-opacity-30">
                                    
                                    {{-- Baris Pertama - Part dan No --}}
                                    <p class="mb-3 font-semibold">{{ $question->part->name }} - {{ $question->no }}</p>
                                    
                                    {{-- Baris Kedua - Teks Pertanyaan  --}}
                                    <p class="mb-3">{{ $question->text }}</p>
                                
                                    {{-- Baris Ketiga dst - Jika terdapat Options --}}
                                    @foreach ($question->options as $option)
                                        <div class="mb-3">
                                            {{-- Proses mengubah teks option jika terdapat link*...*link --}}
                                            @php
                                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                            @endphp
                                            <div class="flex"><div class="w-6 text-end me-2">{{ $option->no }}.</div> {!! nl2br($modifiedText) !!}</div>
                                        </div>
                                    @endforeach

                                    {{-- Baris Action Start --}}
                                    <div class="action-item hidden mb-4 flex-wrap justify-end">
                                        
                                        {{-- Khusus Untuk Pertanyaan yang tidak terkunci --}}
                                        @if ($question->is_locked == '0')
                                            
                                            {{-- Tombol Edit Pertanyaan --}}
                                            <a href="/dashboard/manage-form/{{ $question->id }}/edit" class="group h-9 mr-3 px-1 rounded-md flex items-center text-blue-500 hover:opacity-80">
                                                <i class="fa-solid fa-pen"></i>
                                                <span class="ms-2 group-hover:underline">Edit</span>
                                            </a>
    
                                            {{-- Tombol Edit Option --}}
                                            @if ($question->options->count() > 0)
                                                <a href="/dashboard/manage-form/{{ $question->id }}/edit-options" class="group h-9 mr-3 px-1 rounded-md flex items-center text-dark hover:opacity-80">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <span class="ms-2 group-hover:underline">Edit Options</span>
                                                </a>
                                            @endif
                                            
                                            {{-- Tombol Hapus Pertanyaan --}}
                                            <form action="/dashboard/manage-form/{{ $question->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="group h-9 mr-3 px-1 rounded-md flex items-center text-red-500 hover:opacity-80" onclick="return confirm('Are you sure?')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                    <span class="ms-2 group-hover:underline">Delete</span>
                                                </button>
                                            </form>

                                        @endif

                                    </div>
                                    {{-- Baris Action End --}}
                                    
                                </div>
                            @endforeach
                        @else
                             <p class="text-center font-semibold text-base">No question found.</p>   
                        @endif

                    </div>
                    {{-- Menampilkan Data End --}}

                    {{-- Area Ganti Halaman Start --}}
                    <div class="flex flex-wrap px-2">

                        {{-- Info Jumlah Data Start --}}
                        <div class="text-sm flex items-center text-slate-400 mb-3">
                            @if ($questions->count())
                                Showing {{ $questions->firstItem() }} to {{ $questions->lastItem() }} of {{ $total }} entries
                            @endif
                        </div>
                        {{-- Info Jumlah Data End --}}

                        {{-- Tombol Ganti Halaman Start --}}
                        <div class="ms-auto mb-3">
                            {{ $questions->links() }}
                        </div>
                        {{-- Tombol Ganti Halaman End --}}

                    </div>
                    {{-- Area Ganti Halaman End --}}

                </div>
                {{-- Table End --}}
              
            </div>
        </div>            
        {{-- Table Card End --}}

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Agar tidak bisa di-scroll saat menu halaman dibuka
            document.body.classList.add('overflow-hidden');

            // Code Tambah Pertanyaan
            var tambahPertanyaan = document.querySelector('#tambah-pertanyaan');

            tambahPertanyaan.addEventListener('click', function() {
                var pilihanTambah = document.querySelector('#pilihan-tambah');

                pilihanTambah.classList.toggle('hidden');
            });

            // Code untuk Filter Part
            var filterButton = document.querySelector('#filter-button');
            var filterPart = document.querySelector('#filter-part');
            var closeFilter = document.querySelector('#close-filter');
    
            filterButton.addEventListener('click', function() {
                filterPart.classList.remove('hidden');
                filterPart.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            });

            closeFilter.addEventListener('click', function() {
                filterPart.classList.add('hidden');
                filterPart.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            });

            // Code untuk Kolom Search
            var form = document.getElementById('search_form');
            var input = document.getElementById('search');

            var debounceTimer;

            input.addEventListener('input', function() {
                // Hapus timer sebelumnya (jika ada)
                clearTimeout(debounceTimer);

                // Set timer baru untuk menunda pengiriman formulir
                debounceTimer = setTimeout(function() {
                    form.submit();
                }, 500); // 500 = 1/2 Detik
            });

            // Code Untuk Baris
            var listItem = document.querySelectorAll('.list-item');
            
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

        // Fungsi Close Warning
        function closeWarning() {
            var warning = document.querySelector('#warning');
            warning.classList.remove('flex');
            warning.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
    </script>    

@endsection