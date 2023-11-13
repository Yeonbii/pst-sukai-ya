@extends('dashboard.layouts.main')

@section('container')

    <div class="flex justify-between items-end">

        <h3 class="font-semibold text-xl">Dashboard</h3>

        {{-- Month Picker --}}
        <button class="font-semibold text-sm bg-primary text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Bulan Ini</button>

    </div>

    <div class="index pt-12">
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
                            <p  class="border-b-2 border-secondary py-1 mb-1 text-secondary font-semibold">100</p>
                            <p>2 Responden Baru</p>
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

    <div class="chart pt-12 pb-12">
        <div class="flex flex-wrap">

            {{-- Chart Start --}}
            <div class="w-full md:w-1/2">
                <div class="bg-white rounded-md shadow-md p-2 mb-5">
                    <h6 class="m-2 border-b-2 font-semibold">Grafik 1</h6>
                    <div class="flex items-center justify-center">
                        <div class="h-[300px] mb-9">
                            <canvas id="myChart"></canvas>
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
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    tooltip: {
                        enabled: false
                    },
                    datalabels: {
                        formatter: function(value, context) {
                            const datapoints = context.chart.data.datasets[0].data;
                            function totalSum(total, datapoint) {
                                return total + datapoint;
                            }
                            const totalValue = datapoints.reduce(totalSum, 0);
                            const percentageValue = ((value / totalValue) * 100).toFixed(2);

                            return percentageValue + '%';
                        },
                        color: 'white',
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        var myChart = new Chart(
            document.querySelector('#myChart'),
            config
        );
    </script>
      
@endsection