@extends('dashboard.layouts.main')

@section('container')

    {{-- Alert Success Start --}}
    @if (session()->has('success'))
        <div id="alert-card">
            <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-green-500 bg-green-500 text-green-900">
                {{-- Isi ALert --}}
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

    {{-- Area dibawah Nav Start --}}
    <div class="flex flex-wrap justify-between items-end h-[44px]">
        
        {{-- Title Page Start --}}
        <div class="w-full md:w-1/2">
            <h3 class="font-semibold text-xl">Data Archive</h3>
        </div>
        {{-- Title Page End --}}

    </div>
    {{-- Area dibawah Nav End --}}

    <div class="pt-12 pb-12">

        {{-- Table Card Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-3">

                {{-- Area Atas Card Start --}}
                <div class="flex items-end mb-3">

                    {{-- Tombol Hapus Semua Data Archive Start --}}
                    <form action="/dashboard/archive" method="post" class="w-full">
                        @csrf
                        <button type="submit" class="block w-full lg:w-auto font-semibold text-sm bg-red-500 text-white rounded-md py-2 px-8 mb-3 ms-auto hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center" {{ ($total > 0) ? '' : 'disabled' }} onclick="return confirm('Are you sure?')">Hapus Semua Data Archive</button>
                    </form>
                    {{-- Tombol Hapus Semua Data Archive End --}}

                </div>
                {{-- Area Atas Card End --}}
           
                
                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    {{-- Menampilkan Data Start --}}
                    <div class="w-full text-sm text-left text-gray-500 border-t-2 pt-2 md:pt-7">

                        @if ($archives->count() > 0)
                            @foreach ($archives as $archive)
                                <div class="list-item border-b-2 mb-4 p-2 md:p-7 hover:bg-slate-300 hover:bg-opacity-30">
                                    
                                    {{-- Baris Pertama Start --}}
                                    <div class="flex flex-wrap w-full">

                                        {{-- $archive->name --}}
                                        <a href="{{ asset('storage/' . $archive->name) }}" download="{{ $archive->name }}" class="italic text-blue-500 me-2 mb-2">{{ $archive->name }}</a>

                                        {{-- $archive->created_at --}}
                                        <p class="mb-2 md:ml-auto italic text-slate-400">Created at {{ $archive->created_at->format('d M Y, g:i A') }}</p>

                                    </div>
                                    {{-- Baris Pertama End --}}
                                
                                    {{-- Baris Action Start --}}
                                    <div class="action-item hidden mb-4 flex-wrap justify-end">

                                        {{-- Tombol Delete Start --}}
                                        <form action="/dashboard/archive/{{ $archive->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="group h-9 mr-3 px-1 rounded-md flex items-center text-red-500 hover:opacity-80" onclick="return confirm('Are you sure?')">
                                                <i class="fa-solid fa-trash-can"></i>
                                                <span class="ms-2 group-hover:underline">Delete</span>
                                            </button>
                                        </form>
                                        {{-- Tombol Detele End --}}

                                    </div>
                                    {{-- Baris Action End --}}

                                </div>
                            @endforeach
                        @else
                             <p class="text-center font-semibold text-base">No archive found.</p>   
                        @endif

                    </div>
                    {{-- Menampilkan Data End --}}

                    {{-- Area Ganti Halaman Start --}}
                    <div class="flex flex-wrap px-2">

                        {{-- Info Jumlah Data Start --}}
                        <div class="text-sm flex items-center text-slate-400 mb-3">
                            @if ($archives->count())
                                Showing {{ $archives->firstItem() }} to {{ $archives->lastItem() }} of {{ $total }} entries
                            @endif
                        </div>
                        {{-- Info Jumlah Data End --}}

                        {{-- Tombol Ganti Halaman Start --}}
                        <div class="ms-auto mb-3">
                            {{ $archives->links() }}
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
        // Code untuk menampilkan baris Action
        document.addEventListener('DOMContentLoaded', function () {
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
        
    </script> 

@endsection