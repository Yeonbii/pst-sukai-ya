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
    
    <div class="flex h-[44px] items-end">
        <h3 class="font-semibold text-xl">Kelola Chart yang akan Ditampilkan pada Dashboard</h3>
    </div>

    <div class="pt-12 pb-12">
        {{-- Table Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-5">

                <form id="search_form" action="/dashboard/manage-chart" class="w-full flex">
                    <input id="search" name="search" type="search" class="w-full md:max-w-sm text-sm ms-auto py-2 px-4 mb-3 border-2 rounded-md hover:bg-opacity-80 focus:border-secondary focus:outline-none" placeholder="Search" value="{{ $search }}">
                </form>

                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    <div class="w-full text-sm text-left text-gray-500 border-t-2 pt-2 md:pt-7">
                        
                        @if ($charts->count() > 0)

                            @foreach ($charts as $chart)

                                <div class="list-item border-b-2 mb-4 p-2 md:p-7 hover:bg-slate-300 hover:bg-opacity-30" style="display: flex; flex-wrap: wrap;">
                                    <div class="w-full md:w-auto">
                                        <p class="me-2 mb-2"><span class="font-semibold">{{ $chart->no }} - </span> {{ $chart->question->text }}</p>
                                        <p class="me-2 mb-2 font-semibold">Show : {{ ($chart->show == '1') ? 'Yes' : 'No' }}</p>
                                    </div>

                                    <div class="action-item hidden mb-4 flex-wrap justify-end ms-auto">
                                        
                                        @if ($chart->show == '1')
                                            <a href="/dashboard/manage-chart/{{ $chart->id }}/change-show" class="group h-9 mr-3 px-1 rounded-md flex items-center text-dark hover:opacity-80">
                                                <i class="fa-solid fa-eye-slash"></i>
                                                <span class="ms-2 group-hover:underline">Don't show</span>
                                            </a>
                                        @else
                                            <a href="/dashboard/manage-chart/{{ $chart->id }}/change-show" class="group h-9 mr-3 px-1 rounded-md flex items-center text-dark hover:opacity-80">
                                                <i class="fa-solid fa-eye"></i>
                                                <span class="ms-2 group-hover:underline">Show</span>
                                            </a> 
                                        @endif
                                        <a href="/dashboard/manage-chart/{{ $chart->id }}/edit" class="group h-9 mr-3 px-1 rounded-md flex items-center text-blue-500 hover:opacity-80">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <span class="ms-2 group-hover:underline">Edit</span>
                                        </a>
                                        
                                        <form action="/dashboard/manage-chart/{{ $chart->id }}" method="post">
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
                            <p class="text-center font-semibold text-base">No chart found.</p>   
                        @endif 

                    </div>

                    <div class="flex flex-wrap px-2">
                        <div class="text-sm flex items-center text-slate-400 mb-3">
                            @if ($charts->count())
                                Showing {{ $charts->firstItem() }} to {{ $charts->lastItem() }} of {{ $total }} entries
                            @endif
                        </div>
                        <div class="ms-auto mb-3">
                            {{ $charts->links() }}
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