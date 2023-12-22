@extends('dashboard.layouts.main')

@section('container')
    {{-- Script cdn Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let colors = @json($colors);
    </script>


    <div class="flex justify-between items-end h-[44px]">

        <h3 class="font-semibold text-xl">Dashboard</h3>

        {{-- Month Picker --}}
        <div id="filter-button" class="font-semibold w-auto min-w-[150px] max-w-[250px] truncate text-sm bg-primary text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center cursor-pointer">{{ $filter_month }}</div>

        <div id="filter-month" class="fixed z-[99] inset-0 bg-black bg-opacity-50 hidden">
            <div id="filter-area" class="bg-white shadow-lg ms-auto p-4 pt-12 flex flex-col w-[300px]">
                
                <p class="font-semibold text-xl text-primary my-5 text-center italic">Pilih Bulan & Tahun</p>

                <form id="month_form" action="/dashboard">
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

                <a href="/dashboard" class="text-base font-semibold text-white bg-primary rounded-md p-2 mt-auto mb-3 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer">Bulan Ini</a>

                <div id="close-filter" class="text-base font-semibold text-white bg-dark rounded-md p-2 mb-12 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer">Tutup</div>
            </div>
            
        </div>

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
                            <p  class="border-b-2 border-primary py-1 mb-1 text-primary font-semibold">{{ $ikm_result }}</p>
                            <p>Skala 0-100</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- IKM End -->

        </div>
    </div>

    <div class="chart pb-12">

        <a href="/dashboard/manage-chart" class="font-semibold text-base bg-white text-dark flex justify-center items-center w-full rounded-md mb-5 py-2 hover:bg-opacity-70 duration-300 shadow-md">
            Kelola Chart yang akan Ditampilkan
        </a>

        @if (($respondens->count() > 0) && ($charts->count() > 0))

            <div class="flex flex-wrap">
                @php
                    $no = 1;
                @endphp
            
                @foreach ($charts as $chart)
                    {{-- Chart Start --}}
                    <div class="w-full {{ ($no % 2 == 0) ? 'md:ps-2' : 'md:pe-2' }} md:w-1/2">
                        <div class="bg-white rounded-md shadow-md p-2 mb-10">
                            <h6 class="m-2 border-b-2 font-semibold truncate">{{ $chart->question->text }}</h6>
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-full max-w-[200px] mb-9 mt-7">
                                    <canvas id="myChart-{{ $no }}"></canvas>
                                </div>
                                <div class="w-full px-4 md:px-28 mb-5">
                                    @php
                                        $no_o = 0;
                                        $answerCounts = DB::table('answers')
                                            ->join('respondens', 'answers.responden_id', '=', 'respondens.id')
                                            ->where('answers.question_id', $chart->question_id)
                                            ->where('respondens.year', $year)
                                            ->where('respondens.month', $month)
                                            ->groupBy('answers.value')
                                            ->select('answers.value', DB::raw('count(*) as count'))
                                            ->get();
            
                                        // Inisialisasi array $answers dengan nilai 0 untuk setiap opsi
                                        $answers = [];
                                        foreach ($chart->question->options as $option) {
                                            $answers[$option->value] = 0;
                                        }
            
                                        // Mengisi array $answers dengan nilai yang sesuai dari query
                                        foreach ($answerCounts as $ac) {
                                            $answers[$ac->value] = $ac->count;
                                        }
            
                                        // Menghitung total jawaban
                                        $totalAnswers = array_sum($answers);
            
                                        $chartData = [];
                                        foreach ($answers as $value => $count) {
                                            $chartData[] = ['value' => $value, 'count' => $count];
                                        }
                                    @endphp
            
                                    @foreach ($chart->question->options as $option)
                                        <div class="flex items-center text-sm">
                                            <div class="h-2 min-w-[28px] me-2" style="background-color: {{ $colors[$no_o % count($colors)] }}"></div>
                                            @php
                                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                            @endphp
                                            <p class="truncate me-4">
                                                {!! $modifiedText !!}
                                            </p>
                                            <p class="ms-auto">
                                                @php
                                                    $percentage = number_format(($answers[$option->value] / $totalAnswers) * 100, 1);
                                                @endphp
                                                {{ $percentage }}%
                                            </p>
                                        </div>
                                        @php
                                            $no_o++;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Chart End --}}
            
                    <script>
                        // Chart
                        let chartData{{ $no }} = @json($chartData);
            
                        let data{{ $no }} = [];
                        let backgroundColors{{ $no }} = [];
            
                        for (let key in chartData{{ $no }}) {
                            if (chartData{{ $no }}.hasOwnProperty(key)) {
                                data{{ $no }}.push(chartData{{ $no }}[key].count);
                                // Memilih warna sesuai urutan
                                let colorIndex = data{{ $no }}.length - 1;
                                backgroundColors{{ $no }}.push(colors[colorIndex % colors.length]);
                            }
                        }
            
                        const dataConfig{{ $no }} = {
                            datasets: [{
                                data: data{{ $no }},
                                backgroundColor: backgroundColors{{ $no }},
                                hoverOffset: 4
                            }]
                        };
            
                        const chartConfig{{ $no }} = {
                            type: 'pie',
                            data: dataConfig{{ $no }},
                            options: {
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                events: []
                            }
                        };
            
                        var myChart{{ $no }} = new Chart(
                            document.querySelector('#myChart-{{ $no }}'),
                            chartConfig{{ $no }}
                        );
                    </script>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </div> 

        @else

            <p class="text-center font-semibold text-base mt-10">No chart or responden found.</p>   

        @endif

    </div>

    

    <script>
        // JS umum
        var filterButton = document.querySelector('#filter-button');
        var filterMonth = document.querySelector('#filter-month');
        var closeFilter = document.querySelector('#close-filter');

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
    </script>
      
@endsection