@extends('dashboard.layouts.main')

@section('container')

    @if (session()->has('success'))
        <div id="alert-card">
            <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-green-500 bg-green-500 text-green-900">
                <div class="ms-4">
                    {{ session('success') }}
                </div>
                <button type="button" class="w-8 h-8 flex justify-center items-center ms-auto" onclick="closeAlert()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <script>
            var alertCard = document.querySelector('#alert-card');
            function closeAlert() {
                alertCard.classList.add('hidden');
            }
        </script>
    @endif

    @if (session()->has('nothing'))
        <div id="alert-card">
            <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-slate-500 bg-slate-500 text-slate-900">
                <div class="ms-4">
                    {{ session('nothing') }}
                </div>
                <button type="button" class="w-8 h-8 flex justify-center items-center ms-auto" onclick="closeAlert()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <script>
            var alertCard = document.querySelector('#alert-card');
            function closeAlert() {
                alertCard.classList.add('hidden');
            }
        </script>
    @endif

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
                                <a href="/dashboard/manage-form/{{ $part->code }}/create" class="text-base text-dark p-2 mb-2 flex group-hover:bg-slate-100 group-hover:bg-opacity-70 group-hover:rounded-md group-hover:text-primary">{{ $part->name }}</a>
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

                        <a href="/dashboard/manage-form/show" target="_blank" class="block w-full md:w-[150px] font-semibold text-sm bg-slate-400 text-white rounded-md py-2 px-8 mb-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Lihat Form</a>
                        
                        <div id="filter-button" class="w-full md:w-auto md:min-w-[150px] md:max-w-[250px] truncate font-semibold text-sm bg-primary text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                            {{ $filter_part }}
                        </div>


                        <div id="filter-part" class="fixed z-[99] inset-0 bg-black bg-opacity-50 hidden">
                            <div id="filter-area" class="bg-white shadow-lg ms-auto p-4 pt-12 flex flex-col w-[300px]">
                                
                                <p class="font-semibold text-xl text-primary my-5 text-center italic">Filter Bagian</p>

                                <ul>
                                    <li class="group">
                                        <a href="/dashboard/manage-form" class="text-base p-4 mb-2 flex group-hover:bg-slate-100 group-hover:bg-opacity-70 group-hover:rounded-md group-hover:text-primary {{ !Request::has('part') ? 'text-primary' : 'text-dark' }}">Semua Bagian</a>
                                    </li>
                                    @foreach ($parts as $part)
                                        <li class="group">
                                            <a href="/dashboard/manage-form?part={{ $part->code }}" class="text-base p-4 mb-2 flex group-hover:bg-slate-100 group-hover:bg-opacity-70 group-hover:rounded-md group-hover:text-primary {{ (Request::has('part') && Request::input('part') == $part->code) ? 'text-primary' : 'text-dark' }}">{{ $part->name }}</a>
                                        </li>
                                    @endforeach

                                </ul>

                                <div id="close-filter" class="text-base font-semibold text-white bg-dark rounded-md p-2 mt-auto mb-12 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer">Tutup</div>
                            </div>
                            
                        </div>
                        
                    </div>
                        
                    <form id="search_form" action="/dashboard/manage-form" class="w-full md:w-1/2 flex">
                        @if (request('part'))
                            <input type="hidden" name="part" value="{{ request('part') }}">
                        @endif
                        <input id="search" name="search" type="search" class="w-full md:max-w-sm text-sm ms-auto py-2 px-4 mb-3 border-2 rounded-md hover:bg-opacity-80 focus:border-secondary focus:outline-none" placeholder="Search" value="{{ $search }}">
                    </form>

                </div>
           
                
                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    <div class="w-full text-sm text-left text-gray-500 border-t-2 pt-2 md:pt-7">

                        @if ($questions->count())
                            @foreach ($questions as $question)
                                <div class="list-item border-b-2 mb-4 p-2 md:p-7 hover:bg-slate-300 hover:bg-opacity-30">
                                    <p class="mb-3 font-semibold">{{ $question->part->name }} - {{ $question->no }}</p>
                                    <p class="mb-3">{{ $question->text }}</p>
                                
                                    @foreach ($question->options as $option)
                                        <div class="mb-3">
                                            @php
                                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                            @endphp
                                            <div class="flex"><div class="w-6 text-end me-2">{{ $option->no }}.</div> {!! nl2br($modifiedText) !!}</div>
                                        </div>
                                    @endforeach

                                    <div class="action-item hidden mb-4 flex-wrap justify-end">
                                        @if ($question->is_locked == '0')
                                            
                                            <a href="/dashboard/manage-form/{{ $question->id }}/edit" class="group h-9 mr-3 px-1 rounded-md flex items-center text-blue-500 hover:opacity-80">
                                                <i class="fa-solid fa-pen"></i>
                                                <span class="ms-2 group-hover:underline">Edit</span>
                                            </a>
    
                                            @if ($question->options->count() > 0)
                                                <a href="/dashboard/manage-form/{{ $question->id }}/edit-options" class="group h-9 mr-3 px-1 rounded-md flex items-center text-primary hover:opacity-80">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <span class="ms-2 group-hover:underline">Edit Options</span>
                                                </a>
                                            @endif
                                            
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
                                    
                                </div>
                            @endforeach
                        @else
                             <p class="text-center font-semibold text-base">No question found.</p>   
                        @endif

                    </div>

                    <div class="flex flex-wrap px-2">
                        <div class="text-sm flex items-center text-slate-400 mb-3">
                            @if ($questions->count())
                                Showing {{ $questions->firstItem() }} to {{ $questions->lastItem() }} of {{ $total }} entries
                            @endif
                        </div>
                        <div class="ms-auto mb-3">
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
            alert('P E R I N G A T A N !!!\nJika Anda melakukan perubahan baik itu MENAMBAHKAN PERTANYAAN, MENGHAPUS PERTANYAAN, MENGUBAH PERTANYAAN, atau MENGUBAH OPSI PERTANYAAN\nmaka sistem akan AUTOMATIS MENGHAPUS SELURUH DATA RESPONDEN PADA DATABASE dan Melakukan CONVERT seluruh data responden yang akan disimpan di Riwayat Data Responden');

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
                filterPart.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            });

            closeFilter.addEventListener('click', function() {
                filterPart.classList.add('hidden');
                filterPart.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            });

        });

        // Ambil elemen formulir dan input
        var form = document.getElementById('search_form');
        var input = document.getElementById('search');

        var debounceTimer;

        input.addEventListener('input', function() {
            // Hapus timer sebelumnya (jika ada)
            clearTimeout(debounceTimer);

            // Set timer baru untuk menunda pengiriman formulir
            debounceTimer = setTimeout(function() {
                form.submit();
            }, 500); // Ubah nilai ini sesuai kebutuhan (dalam milidetik)
        });
        
    </script>    

@endsection