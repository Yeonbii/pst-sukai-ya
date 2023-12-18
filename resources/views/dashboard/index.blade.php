@extends('dashboard.layouts.main')

@section('container')

    <div class="flex justify-between items-end h-[44px]">

        <h3 class="font-semibold text-xl">Dashboard</h3>

        {{-- Month Picker --}}
        <button type="button" class="font-semibold text-sm bg-primary text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Bulan Ini</button>

    </div>

    <div class="index pt-12 pb-9">
        <h3 class="font-semibold text-base md:text-xl mb-5">Hasil Hitung Cepat BPS Kabupaten Hulu Sungai Utara</h3>
        <div class="flex flex-wrap">

            <!-- Jumlah Responden Start -->
            <div class="w-full lg:w-1/2 xl:w-1/4">
                <div class="flex bg-white rounded-md shadow-sm p-2 mb-5 h-[100px] lg:me-5">
                    <div class="w-1/4 flex items-center justify-center me-2 bg-secondary rounded-sm text-white text-lg">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="w-3/4 flex flex-col text-sm">
                        <h6 class="mb-2 font-semibold">Jumlah Responden</h6>
                        <div class="value mt-auto">
                            <p  class="border-b-2 border-secondary py-1 mb-1 text-secondary font-semibold">{{ $respondens->count() }}</p>
                            <p class="truncate">{{ $respondens->where('is_read', '0')->count() }} Responden Baru</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumlah Responden End -->
            
            <!-- IKM Start -->
            <div class="w-full lg:w-1/2 xl:w-1/4">
                <div class="flex bg-white rounded-md shadow-sm p-2 mb-5 h-[100px] lg:me-5">
                    <div class="w-1/4 flex items-center justify-center me-2 bg-primary rounded-sm text-white text-lg">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div class="w-3/4 flex flex-col text-sm">
                        <h6 class="mb-2 font-semibold">IKM</h6>
                        <div class="value mt-auto">
                            <p  class="border-b-2 border-primary py-1 mb-1 text-primary font-semibold">89.45</p>
                            <p>Skala 0-100</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- IKM End -->

        </div>
    </div>

    <div class="chart pb-12">

        <a href="/dashboard/manage-chart" class="font-semibold text-base bg-white text-dark flex justify-center items-center w-full rounded-md mb-5 py-2 hover:bg-dark hover:text-white focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 duration-300 shadow-sm">
            Kelola Chart yang akan Ditampilkan
        </a>

        <div class="flex flex-wrap">

            {{-- Chart Start --}}
            <div class="w-full md:w-1/2">
                <div class="bg-white rounded-md shadow-md p-2 mb-5">
                    <h6 class="m-2 border-b-2 font-semibold">Grafik 1</h6>
                    <div class="flex flex-col items-center justify-center">
                        <div class="w-full max-w-[300px] mb-9">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="w-full max-w-[300px]">
                            <div class="flex items-center text-sm">
                                <div class="h-2 min-w-[28px] bg-[#ef4444] me-2"></div>
                                <p class="truncate">
                                    Red
                                </p>
                                <p class="ms-auto">
                                    300
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            {{-- Chart End --}}

        </div>
    </div>

    {{-- Script cdn Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- JS untuk Chart --}}
    <script>
        let color = ['#ef4444', '#3b82f6', '#eab308']

        const data = {
            labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                color[0],
                color[1],
                color[2]
                ],
                hoverOffset: 4
            }]
        };

        const config = {
        type: 'pie',
        data: data,
        };

        var myChart = new Chart(
            document.querySelector('#myChart'),
            config
        );
    </script>
      
@endsection