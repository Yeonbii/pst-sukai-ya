@extends('dashboard.layouts.main')

@section('container')

    <div class="flex h-[44px] items-end">
        <h3 class="font-semibold text-xl">Manage Form - Tambah Pertanyaan <span class="text-primary">{{ $part->name }}</span></h3>
        <p id="part_id" class="hidden">{{ $part->id }}</p>
    </div>

    <div class="py-12">

        <form action="{{ route('storeQuestion') }}" method="post">
            @csrf
            <div class="w-full">

                {{-- No Start --}}
                <div id="card-no" class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="flex flex-wrap items-center">
                        
                        <div class="w-full px-2 mb-3">
                            <label for="no" class="text-sm font-medium mb-1 block">
                                No
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <select id="no" name="no" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus required>
                                @for ($i = 1; $i <= $count; $i++)
                                    <option value="{{ $i }}" {{ $i == $count ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        
                    </div>

                </div>
                {{-- No End --}}

                {{-- Body Question Start --}}
                <div id="card-body" class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="w-full px-2 mb-3">
                        <label for="text" class="text-sm font-medium mb-1 block">
                            Isi Pertanyaan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <input type="text" name="text" id="text" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                    </div>

                    <div class="w-full px-2 mb-3">
                        <label for="is_required" class="text-sm font-medium mb-1 block">
                            Apakah wajib dijawab?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <input type="number" name="is_required" id="is_required" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                        <p class="text-sm text-slate-500 my-1 italic opacity-50">1 : Yes <br>0 : No</p>
                    </div>

                    <div class="w-full px-2 mb-3">
                        <label for="need_note" class="text-sm font-medium mb-1 block">
                            Apakah perlu Keterangan?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <input type="number" name="need_note" id="need_note" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                        <p class="text-sm text-slate-500 my-1 italic opacity-50">1 : Yes <br>0 : No</p>
                    </div>

                    <div class=" w-full px-2 mb-3" id="col-note">
                        <label for="note" class="text-sm font-medium mb-1 block">
                            Keterangan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <textarea id="note" name="note" rows="4" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required></textarea>
                    </div>

                </div>
                {{-- Body Question End --}}

                {{-- Triggered Start --}}
                <div id="card-triggered" class="bg-white rounded-md shadow-md mb-9 px-3 py-5">
    
                    <div class="w-full px-2 mb-3">
                        <label for="is_triggered" class="text-sm font-medium mb-1 block">
                            Apakah Pertanyaan hanya akan muncul ketika Responden menjawab Pertanyaan lain dengan jawaban tertentu?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <input type="number" name="is_triggered" id="is_triggered" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                        <p class="text-sm text-slate-500 my-1 italic opacity-50">1 : Yes <br>0 : No</p>
                        <p class="text-sm text-slate-500 my-1 italic opacity-50">Mohon maaf, untuk saat ini hanya untuk 1 Bagian saja 🙏</p>
                    </div>

                </div>
                {{-- Triggered End --}}

                {{-- Input Type Start --}}
                <div id="card-input-type" class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="w-full px-2 mb-3">
                        <label for="input_type" class="text-sm font-medium mb-1 block">
                            Tipe Input
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="input_type" name="input_type" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                            <option disabled selected>Pilih</option>
                            <option value="1" class="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'hidden' }}">Input : Text</option>
                            <option value="2" class="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'hidden' }}">Input : Number</option>
                            <option value="3" class="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'hidden' }}">Input : Date</option>
                            <option value="4" class="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'hidden' }}">Input : (Contoh No. Telp)</option>
                            <option value="5" class="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'hidden' }}">Select : (Pilih salah satu)</option>
                            <option value="6" class="{{ ($part->id == 3) ? '' : 'hidden' }}">Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)</option>
                            <option value="7" class="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'hidden' }}">Select : Yes or No</option>
                            <option value="8" class="{{ ($part->id == 4) ? '' : 'hidden' }}">Rating : (Pilih 1 s/d 10)</option>
                            <option value="9" class="{{ ($part->id == 5) ? '' : 'hidden' }}">Textarea</option>
                        </select>
                    </div>

                </div>
                {{-- Input Type End --}}

                {{-- Input Type Area Start --}}
                <div id="input-type-area">

                    {{-- Input Start --}}
                    <div id="card-input" class="hidden bg-white rounded-md shadow-md mb-9 px-3 py-5">
                        
                        <div id="maks-char-div" class="w-full px-2 mb-3">
                            <label for="maks_char" class="text-sm font-medium mb-1 block">
                                Batas maksimal karakter yang bisa diinputkan (huruf, termasuk spasi)
                                <span class="text-red-500">(wajib)</span>
                            </label>

                            <input type="number" name="maks_char" id="maks_char" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'readonly' }}" {{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'readonly' }} required value="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : '0' }}">
                            
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Masukkan 0 jika Input jawaban diatas adalah 3 atau 4</p>

                        </div>

                    </div>
                    {{-- Input End --}}

                    {{-- Select Start --}}
                    <div id="card-select" class="hidden bg-white rounded-md shadow-md mb-9 px-3 py-5">
                        
                        <div id="has-other-div" class=" w-full px-2 mb-3">
                            <label for="has_other" class="text-sm font-medium mb-1 block">
                                Apakah terdapat pilihan Other?
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            
                            <input type="number" name="has_other" id="has_other" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'readonly' : '' }}" {{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'readonly' : '' }} required value="{{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? '0' : '' }}">
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">1 : Yes <br>0 : No</p>

                        </div>

                        <div id="option-number-div" class="hidden w-full px-2 mb-3">
                            <label for="option_number" class="text-sm font-medium mb-1 block">
                                Jumlah Pilihan
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            
                            <input type="number" name="option_number" id="option_number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'readonly' : '' }}" {{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'readonly' : '' }} required value="{{ ($part->id == 3) ? '4' : (($part->id == 4) ? '10' : (($part->id == 5) ? '0' : '')) }}">
                            
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Jumlah pilihan termasuk pilihan Other</p>
                        </div>

                    </div>
                    {{-- Select End --}}

                </div>
                {{-- Input Type Area End --}}

                {{-- Chart Start --}}
                <div id="card-chart" class="hidden bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div id="has-chart-div" class="w-full px-2 mb-3">
                        <label for="has_chart" class="text-sm font-medium mb-1 block">
                            Apakah ditampilkan sebagai Grafik Pie Chart di Dashboard?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        
                        <input type="number" name="has_chart" id="has_chart" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 1 || $part->id == 2) ? '' : 'readonly' }}" {{ ($part->id == 1 || $part->id == 2) ? '' : 'readonly' }} required value="{{ ($part->id == 1 || $part->id == 2) ? '' : '0' }}">
                        <p class="text-sm text-slate-500 my-1 italic opacity-50">1 : Yes <br>0 : No</p>
                        
                    </div>

                    <div id="title-chart-div" class="hidden w-full px-2 mb-3">
                        <label for="title_chart" class="text-sm font-medium mb-1 block">
                            Judul Chart
                            <span class="text-red-500">(wajib)</span>
                        </label>

                        <input type="text" name="title_chart" id="title_chart" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 1 || $part->id == 2) ? '' : 'readonly' }}" {{ ($part->id == 1 || $part->id == 2) ? '' : 'readonly' }} required value="{{ ($part->id == 1 || $part->id == 2) ? '' : '-' }}">

                    </div>
        
                </div>
                {{-- Chart End --}}


                <div class="flex">
                    <button type="submit" class="font-semibold text-sm bg-primary text-white rounded-md mt-2 me-3 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Simpan</button>
                    <a href="/dashboard/manage-form" class="font-semibold text-sm bg-slate-400 text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Batal</a>
                </div>
                
            </div>
             
        </form>           

    </div>    

    {{-- JS --}}
    <script>
        var partId = document.querySelector('#part_id').textContent;

        // Input Type
        var inputType = document.querySelector('#input_type');

        // Input
        var cardInput = document.querySelector('#card-input');
        var maksCharDiv = document.querySelector('#maks-char-div');
        var maksChar = document.querySelector('#maks_char');

        // Select
        var cardSelect = document.querySelector('#card-select');
        var hasOtherDiv = document.querySelector('#has-other-div');
        var hasOther = document.querySelector('#has_other');
        var optionNumberDiv = document.querySelector('#option-number-div');
        var optionNumber = document.querySelector('#option_number');

        // Chart
        var cardChart = document.querySelector('#card-chart');
        var hasChartDiv = document.querySelector('#has-chart-div');
        var hasChart = document.querySelector('#has_chart');
        var titleChartDiv = document.querySelector('#title-chart-div');
        var titleChart = document.querySelector('#title_chart');

        function refreshInput() {
            maksChar.classList.remove('readonly');
            maksChar.readOnly = false;
            maksChar.value = '';

            cardInput.classList.add('hidden');
        }

        function refreshSelect() {
            hasOther.classList.remove('readonly');
            hasOther.readOnly = false;
            hasOther.value = '';

            optionNumber.classList.remove('readonly');
            optionNumber.readOnly = false;
            optionNumber.value = '';

            cardSelect.classList.add('hidden');
        }

        function refreshChart(){
            hasChart.classList.remove('readonly');
            hasChart.readOnly = false;
            hasChart.value = '';

            titleChart.classList.remove('readonly');
            titleChart.readOnly = false;
            titleChart.value = '';

            cardChart.classList.add('hidden');
        }

        function refreshInputType() {
            if (partId === '1' || partId === '2') {
                refreshInput();
                refreshSelect();
                refreshChart();
            }
            else if (partId === '6') {
                refreshInput();
                refreshSelect();
            }
        }


        document.addEventListener('DOMContentLoaded', function () {
            
            // Ketika input-type diganti
            inputType.addEventListener('change', function() {
                // Refresh setiap Input Type diganti
                refreshInputType();

                // 1 -> Input : Text
                if (inputType.value === '1') {
                    if (partId === '1' || partId === '2') {
                        // Menampilkan card-input
                        cardInput.classList.remove('hidden');
                        
                        // Menonaktifkan Select
                        hasOther.classList.add('readonly');
                        hasOther.readOnly = true;
                        hasOther.value = '0';

                        optionNumber.classList.add('readonly');
                        optionNumber.readOnly = true;
                        optionNumber.value = '0';

                        // Menonaktifkan Chart
                        hasChart.classList.add('readonly');
                        hasChart.readOnly = true;
                        hasChart.value = '0';

                        titleChart.classList.add('readonly');
                        titleChart.readOnly = true;
                        titleChart.value = '-';
                    }
                    else if (partId === '6') {
                        // Menampilkan card-input
                        cardInput.classList.remove('hidden');
                        
                        // Menonaktifkan Select
                        hasOther.classList.add('readonly');
                        hasOther.readOnly = true;
                        hasOther.value = '0';

                        optionNumber.classList.add('readonly');
                        optionNumber.readOnly = true;
                        optionNumber.value = '0';  
                    }
                }
                // 2 -> Input : Numeric
                else if (inputType.value === '2') {
                    if (partId === '1' || partId === '2') {
                        // Menonaktikan Input dikarenakan Numeric tidak bisa mengatur maks-char (maksLength)
                        maksChar.classList.add('readonly');
                        maksChar.readOnly = true;
                        maksChar.value = '0';
                        
                        // Menonaktifkan Select
                        hasOther.classList.add('readonly');
                        hasOther.readOnly = true;
                        hasOther.value = '0';

                        optionNumber.classList.add('readonly');
                        optionNumber.readOnly = true;
                        optionNumber.value = '0';

                        // Menonaktifkan Chart
                        hasChart.classList.add('readonly');
                        hasChart.readOnly = true;
                        hasChart.value = '0';

                        titleChart.classList.add('readonly');
                        titleChart.readOnly = true;
                        titleChart.value = '-';
                    }
                    else if (partId === '6') {
                        // Menonaktikan Input dikarenakan Numeric tidak bisa mengatur maks-char (maksLength)
                        maksChar.classList.add('readonly');
                        maksChar.readOnly = true;
                        maksChar.value = '0';

                        // Menonaktifkan Select
                        hasOther.classList.add('readonly');
                        hasOther.readOnly = true;
                        hasOther.value = '0';

                        optionNumber.classList.add('readonly');
                        optionNumber.readOnly = true;
                        optionNumber.value = '0';
                    }
                }
                // 3 -> Input : Date
                else if (inputType.value === '3') {
                    if (partId === '1' || partId === '2') {
                        // Menonaktikan Input dikarenakan Date tidak bisa mengatur maks-char (maksLength)
                        maksChar.classList.add('readonly');
                        maksChar.readOnly = true;
                        maksChar.value = '0';
                        
                        // Menonaktifkan Select
                        hasOther.classList.add('readonly');
                        hasOther.readOnly = true;
                        hasOther.value = '0';

                        optionNumber.classList.add('readonly');
                        optionNumber.readOnly = true;
                        optionNumber.value = '0';

                        // Menonaktifkan Chart
                        hasChart.classList.add('readonly');
                        hasChart.readOnly = true;
                        hasChart.value = '0';

                        titleChart.classList.add('readonly');
                        titleChart.readOnly = true;
                        titleChart.value = '-';
                    }
                    else if (partId === '6') {
                        // Menonaktikan Input dikarenakan Date tidak bisa mengatur maks-char (maksLength)
                        maksChar.classList.add('readonly');
                        maksChar.readOnly = true;
                        maksChar.value = '0';
                        
                        // Menonaktifkan Select
                        hasOther.classList.add('readonly');
                        hasOther.readOnly = true;
                        hasOther.value = '0';

                        optionNumber.classList.add('readonly');
                        optionNumber.readOnly = true;
                        optionNumber.value = '0';
                    }
                }
                // 4 -> Input : (Phone Number)
                else if (inputType.value === '4') {
                    if (partId === '1' || partId === '2') {
                        // Menonaktikan Input dikarenakan Tipe ini tidak bisa mengatur maks-char (maksLength)
                        maksChar.classList.add('readonly');
                        maksChar.readOnly = true;
                        maksChar.value = '0';
                        
                        // Menonaktifkan Select
                        hasOther.classList.add('readonly');
                        hasOther.readOnly = true;
                        hasOther.value = '0';

                        optionNumber.classList.add('readonly');
                        optionNumber.readOnly = true;
                        optionNumber.value = '0';

                        // Menonaktifkan Chart
                        hasChart.classList.add('readonly');
                        hasChart.readOnly = true;
                        hasChart.value = '0';

                        titleChart.classList.add('readonly');
                        titleChart.readOnly = true;
                        titleChart.value = '-';
                    }
                    else if (partId === '6') {
                        // Menonaktikan Input dikarenakan Tipe ini tidak bisa mengatur maks-char (maksLength)
                        maksChar.classList.add('readonly');
                        maksChar.readOnly = true;
                        maksChar.value = '0';
                        
                        // Menonaktifkan Select
                        hasOther.classList.add('readonly');
                        hasOther.readOnly = true;
                        hasOther.value = '0';

                        optionNumber.classList.add('readonly');
                        optionNumber.readOnly = true;
                        optionNumber.value = '0';
                    }
                }
                // 5 -> Select : (Pilih salah satu)
                else if (inputType.value === '5') {
                    // Menampilkan card-select
                    cardSelect.classList.remove('hidden');
                    
                    // Menonaktifkan Input
                    maksChar.classList.add('readonly');
                    maksChar.readOnly = true;
                    maksChar.value = '0';

                }
                // 7 -> Select : Yes or No
                else if (inputType.value === '7') {
                    // Menonaktifkan Input
                    maksChar.classList.add('readonly');
                    maksChar.readOnly = true;
                    maksChar.value = '0';

                    // Menonaktifkan Select dikarenakan Tipe Ini tidak membutuhkan 2 Hal tersebut
                    hasOther.classList.add('readonly');
                    hasOther.readOnly = true;
                    hasOther.value = '0';

                    optionNumber.classList.add('readonly');
                    optionNumber.readOnly = true;
                    optionNumber.value = '0';

                }

                // 6 -> Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)
                // 8 -> Rating (Pilih 1 s/d 10)
                // 9 -> Textarea
                // Tiga Pilihan diatas tidak memerlukan hal-hal pada card-input, card-select, dan card-chart

            });

            // Ketika has-other di-inputkan
            hasOther.addEventListener('input', function() {
                optionNumberDiv.classList.add('hidden');
                optionNumber.value = '';

                if (hasOther.value === '0' || hasOther.value === '1') {
                    optionNumberDiv.classList.remove('hidden');
                }

                cardChart.classList.add('hidden');
            });

            // Khusus untuk partId 1 dan 2 dikarenakan hanya part itu saja yang bisa mengatur Chart
            if (partId === '1' || partId === '2') {
                // Ketika option-number di-inputkan
                optionNumber.addEventListener('input', function() {
                    cardChart.classList.add('hidden');
                    var bilOptionNumber = parseInt(optionNumber.value, 10);
    
                    if (!isNaN(bilOptionNumber) && bilOptionNumber > 1) {
                        cardChart.classList.remove('hidden');
                    }
                });
            }

            // Ketika has-chart di-inputkan
            hasChart.addEventListener('input', function() {
                titleChartDiv.classList.add('hidden');
                titleChart.classList.remove('readonly');
                titleChart.readOnly = false;
                titleChart.value = '';
                
                if (hasChart.value === '0') {
                    titleChart.classList.add('readonly');
                    titleChart.readOnly = true;
                    titleChart.value = '-';
                }

                else if (hasChart.value === '1') {
                    titleChartDiv.classList.remove('hidden');
                }
            });

        }); 
    </script>    

@endsection