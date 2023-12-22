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
            <h3 class="font-semibold text-xl">Data Responden <span class="text-primary">{{ $filter_all }}</span></h3>
        </div>
    </div>

    <div class="pt-12 pb-12">
        {{-- Table Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md px-4 py-12 mb-3">

                <div class="flex flex-wrap justify-between items-end mb-3">

                    <div class="flex flex-wrap w-full md:w-auto">

                        <a href="#" target="_blank" class="block w-full md:w-[150px] font-semibold text-sm bg-slate-400 text-white rounded-md py-2 px-8 mb-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Unduh Data</a>
                        
                        <div id="filter-button" class="w-full md:w-auto md:min-w-[150px] md:max-w-[250px] truncate font-semibold text-sm bg-primary text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                            {{ $filter_month }}
                        </div>


                        <div id="filter-month" class="fixed z-[99] inset-0 bg-black bg-opacity-50 hidden">
                            <div id="filter-area" class="bg-white shadow-lg ms-auto p-4 pt-12 flex flex-col w-[300px]">
                                
                                <p class="font-semibold text-xl text-primary my-5 text-center italic">Filter Bulan</p>

                                <form id="month_form" action="/dashboard/data-responden">
                                    
                                    @if ($check_read)
                                        <input type="hidden" name="is_read" value="{{ request('is_read') }}">
                                    @endif

                                    <div id="year_div" class="w-full mb-7">
                                        <label for="year" class="text-sm font-medium mb-2 block">
                                            Tahun
                                            <span class="text-red-500">(wajib)</span>
                                        </label>
                                        <select id="year" name="year" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus required>
                                            @for ($i = $oldest_year; $i <= $year; $i++)
                                                <option value="{{ $i }}" {{ ($i == $year) ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                
                                    <div id="month_div" class="w-full mb-7">
                                        <label for="month" class="text-sm font-medium mb-2 block">
                                            Bulan
                                            <span class="text-red-500">(wajib)</span>
                                        </label>
                                        <select id="month" name="month" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus required>
                                            <option value="01" {{ ($month == '01') ? 'selected' : '' }}>Januari</option>
                                            <option value="02" {{ ($month == '02') ? 'selected' : '' }}>Februari</option>
                                            <option value="03" {{ ($month == '03') ? 'selected' : '' }}>Maret</option>
                                            <option value="04" {{ ($month == '04') ? 'selected' : '' }}>April</option>
                                            <option value="05" {{ ($month == '05') ? 'selected' : '' }}>Mei</option>
                                            <option value="06" {{ ($month == '06') ? 'selected' : '' }}>Juni</option>
                                            <option value="07" {{ ($month == '07') ? 'selected' : '' }}>Juli</option>
                                            <option value="08" {{ ($month == '08') ? 'selected' : '' }}>Agustus</option>
                                            <option value="09" {{ ($month == '09') ? 'selected' : '' }}>September</option>
                                            <option value="10" {{ ($month == '10') ? 'selected' : '' }}>Oktober</option>
                                            <option value="11" {{ ($month == '11') ? 'selected' : '' }}>November</option>
                                            <option value="12" {{ ($month == '12') ? 'selected' : '' }}>Desember</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="text-base font-semibold bg-slate-300 rounded-md w-full p-2 mb-3 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer">Pilih</button>
                                </form>

                                <a href="/dashboard/data-responden" class="text-base font-semibold text-white bg-primary rounded-md p-2 mt-auto mb-3 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer">Tampilkan Semua</a>

                                <div id="close-filter" class="text-base font-semibold text-white bg-dark rounded-md p-2 mb-12 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer">Tutup</div>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="flex flex-wrap w-full md:w-auto">

                        <form action="/dashboard/data-responden" method="post" class="w-full md:w-auto">
                            @csrf
                            <button type="submit" class="w-full md:w-auto truncate font-semibold text-sm bg-green-500 text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                                Tandai Semua Data Sudah Dibaca
                            </button>
                        </form>

                        @if ($filter_all === ' - Semua Data Baru')
                            <a
                            @if ($check_month)
                                href="/dashboard/data-responden?year={{ request('year') }}&month={{ request('month') }}"    
                            @else
                                href="/dashboard/data-responden" 
                            @endif
                            class="w-full md:w-auto truncate font-semibold text-sm bg-blue-500 text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                                Tampilkan Semua Data
                            </a>
                        @else
                            <a 
                            @if ($check_month)
                                href="/dashboard/data-responden?year={{ request('year') }}&month={{ request('month') }}&is_read=0"
                            @else
                                href="/dashboard/data-responden?is_read=0"  
                            @endif
                            class="w-full md:w-auto truncate font-semibold text-sm bg-blue-500 text-white rounded-md py-2 px-8 mb-3 lg:ms-3 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">
                                Tampilkan Semua Data Baru
                            </a>
                        @endif

                    </div>

                </div>
           
                
                {{-- Table Start --}}
                <div class="relative overflow-x-auto rounded-md mb-2">

                    <div class="w-full text-sm text-left text-gray-500 border-t-2 pt-2 md:pt-7">

                        @if ($respondens->count())
                            @foreach ($respondens as $responden)
                                <div class="list-item border-b-2 mb-4 p-2 md:p-7 hover:bg-slate-300 hover:bg-opacity-30">
                                    <div class="flex flex-wrap w-full">
                                        <p class="me-2 mb-2">{{ $responden->name }}</p>
                                        @if ($responden->is_read == '0')
                                            <p class="me-2 mb-2 text-blue-500">(Baru)</p>
                                        @endif
                                        @php
                                            if ($responden->month == '01') {
                                                $m = 'Jan';
                                            } elseif ($responden->month == '02') {
                                                $m = 'Feb';
                                            } elseif ($responden->month == '03') {
                                                $m = 'Mar';
                                            } elseif ($responden->month == '04') {
                                                $m = 'Apr';
                                            } elseif ($responden->month == '05') {
                                                $m = 'May';
                                            } elseif ($responden->month == '06') {
                                                $m = 'Jun';
                                            } elseif ($responden->month == '07') {
                                                $m = 'Jul';
                                            } elseif ($responden->month == '08') {
                                                $m = 'Agt';
                                            } elseif ($responden->month == '09') {
                                                $m = 'Sept';
                                            } elseif ($responden->month == '10') {
                                                $m = 'Oct';
                                            } elseif ($responden->month == '11') {
                                                $m = 'Nov';
                                            } else {
                                                $m = 'Dec';
                                            }
                                        @endphp
                                        <p class="mb-2 md:ml-auto italic text-slate-400">Service received on {{ $m }} {{ $responden->year }}</p>
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

            var filterButton = document.querySelector('#filter-button');
            var filterMonth = document.querySelector('#filter-month');
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

            filterButton.addEventListener('click', function() {
                filterMonth.classList.remove('hidden');
                filterMonth.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            });

            closeFilter.addEventListener('click', function() {
                filterMonth.classList.add('hidden');
                filterMonth.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            });

        });
        
    </script>    

@endsection