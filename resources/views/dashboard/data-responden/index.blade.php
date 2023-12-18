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

    <div class="flex flex-wrap justify-between items-end h-[44px]">
        <div class="w-full md:w-1/2">
            <h3 class="font-semibold text-xl">Data Responden <span class="text-primary">{{ $title }}</span></h3>
        </div>
    </div>

    <div class="pt-12 pb-12">
        {{-- Table Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-3">

                <div class="flex flex-wrap justify-between items-end mb-3">

                    <div class="flex flex-wrap">

                        <a href="#" target="_blank" class="block w-full md:w-[150px] font-semibold text-sm bg-slate-400 text-white rounded-md py-2 px-8 mb-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Unduh Data</a>

                        <form action="/dashboard/data-responden" method="post">
                            @csrf
                            <button type="submit" class="w-full md:w-auto truncate font-semibold text-sm bg-green-500 text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                                Tandai Semua Data Sudah Dibaca
                            </button>
                        </form>
                        
                    </div>

                    @if ($title === ' - Semua Data Baru')
                        <a href="/dashboard/data-responden" class="w-full md:w-auto truncate font-semibold text-sm bg-blue-500 text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                            Tampilkan Semua Data
                        </a>
                    @else
                        <a href="/dashboard/data-responden?is_read=0" class="w-full md:w-auto truncate font-semibold text-sm bg-blue-500 text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                            Tampilkan Semua Data Baru
                        </a>
                    @endif

                </div>
           
                
                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    <div class="w-full text-sm text-left text-gray-500 border-t-2 pt-2 md:pt-7">

                        @if ($respondens->count())
                            @foreach ($respondens as $responden)
                                <div class="list-item border-b-2 mb-4 p-2 md:p-7 hover:bg-slate-300 hover:bg-opacity-30">
                                    <div class="flex flex-wrap">
                                        <p class="font-semibold me-5 mb-2">{{ $responden->created_at->format('d M Y, g:i A') }}</p>
                                        <p class="me-2 mb-2">{{ $responden->name }}</p>
                                        @if ($responden->is_read == '0')
                                            <p class="me-2 mb-2 text-blue-500">(Baru)</p>
                                        @endif
                                    </div>
                                
                                    <div class="action-item hidden mb-4 flex-wrap justify-end">
                                        <a href="/dashboard/data-responden/{{ $responden->id }}/show" class="group h-9 mr-3 px-1 rounded-md flex items-center text-blue-500 hover:opacity-80">
                                            <i class="fa-solid fa-folder-open"></i>
                                            <span class="ms-2 group-hover:underline">Open</span>
                                        </a>
                                        
                                        <form action="/dashboard/data-responden/{{ $responden->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="group h-9 mr-3 px-1 rounded-md flex items-center text-red-500 hover:opacity-80" onclick="return confirm('Are you sure?')">
                                                <i class="fa-solid fa-trash-can"></i>
                                                <span class="ms-2 group-hover:underline">Delete</span>
                                            </button>
                                        </form>
                                    </div>   
                                </div>
                            @endforeach
                        @else
                             <p class="text-center font-semibold text-base">No responden found.</p>   
                        @endif

                    </div>

                    <div class="flex flex-wrap px-2">
                        <div class="text-sm flex items-center text-slate-400 mb-3">
                            @if ($respondens->count())
                                Showing {{ $respondens->firstItem() }} to {{ $respondens->lastItem() }} of {{ $total }} entries
                            @endif
                        </div>
                        <div class="ms-auto mb-3">
                            {{ $respondens->links() }}
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