@extends('dashboard.layouts.main')

@section('container')

    <div class="flex h-[44px] items-end">
        <h3 class="font-semibold text-xl">Manage Form - Tambah Pertanyaan <span class="text-primary">{{ $part->name }}</span></h3>
        <p id="part-id" class="hidden">{{ $part->id }}</p>
    </div>

    <div class="py-12">

        <form action="">
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
                        <label for="is-required" class="text-sm font-medium mb-1 block">
                            Apakah wajib dijawab?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="is-required" name="is-required" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                            <option disabled selected>Pilih</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>

                    <div class="w-full px-2 mb-3">
                        <label for="need-note" class="text-sm font-medium mb-1 block">
                            Apakah perlu Keterangan?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="need-note" name="need-note" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                            <option disabled selected>Pilih</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
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
                        <label for="is-triggered" class="text-sm font-medium mb-1 block">
                            Apakah Pertanyaan hanya akan muncul ketika Responden menjawab Pertanyaan lain dengan jawaban tertentu?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="is-triggered" name="is-triggered" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <option disabled selected>Pilih</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                        <p class="text-sm text-slate-500 my-1 italic opacity-50">Mohon maaf, untuk saat ini hanya untuk 1 Bagian saja 🙏</p>
                    </div>

                </div>
                {{-- Triggered End --}}

                {{-- Input Type Start --}}
                <div id="card-input-type" class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="w-full px-2 mb-3">
                        <label for="input-type" class="text-sm font-medium mb-1 block">
                            Tipe Input
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="input-type" name="input-type" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                            <option disabled selected>Pilih</option>
                            <option value="Input" class="{{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'hidden' : '' }}">Input (Text, Number, Date)</option>
                            <option value="Select" class="{{ ($part->id == 4 || $part->id == 5) ? 'hidden' : '' }}">Select (Pilih Salah Satu)</option>
                            <option value="Rating" class="{{ ($part->id == 4) ? '' : 'hidden' }}">Rating</option>
                            <option value="Checkbox" class="{{ ($part->id == 6) ? '' : 'hidden' }}">Checkbox (Pilih beberapa yang benar)</option>
                            <option value="Textarea" class="{{ ($part->id == 5 || $part->id == 6) ? '' : 'hidden' }}">Textarea (Paragraf atau semacamnya)</option>
                        </select>
                    </div>

                </div>
                {{-- Input Type End --}}

                {{-- Input Type Area Start --}}
                <div id="input-type-area">

                    {{-- Input Start --}}
                    <div id="card-input" class="hidden bg-white rounded-md shadow-md mb-9 px-3 py-5">
                        
                        <div class="w-full px-2 mb-3">
                            <h3 class="border-b-2 text-sm font-semibold pb-2">Type Input : Input (Text, Number, Date)</h3>
                        </div>

                        <div id="is-date-div" class=" w-full px-2 mb-3">
                            <label for="is-date" class="text-sm font-medium mb-1 block">
                                Apakah merupakan pertanyaan dengan jawaban suatu tanggal?
                                <span class="text-red-500">(wajib)</span>
                            </label>

                            <div id="dynamic-is-date">
                                @if ($part->id == 1 || $part->id == 2 || $part->id == 6)
                                    <select id="is-date" name="is-date" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                                        <option disabled selected>Pilih</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                @else
                                    <input type="text" name="is-date" id="is-date" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly required value="No">
                                @endif
                            </div>

                        </div>

                        <div id="is-number-phone-div" class=" w-full px-2 mb-3">
                            <label for="is-number-phone" class="text-sm font-medium mb-1 block">
                                Apakah merupakan pertanyaan dengan jawaban suatu nomor seperti no. Telp?
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            
                            <div id="dynamic-is-number-phone">
                                @if ($part->id == 1 || $part->id == 2 || $part->id == 6)
                                    <select id="is-number-phone" name="is-number-phone" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                                        <option disabled selected>Pilih</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                @else
                                    <input type="text" name="is-number-phone" id="is-number-phone" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly required value="No">
                                @endif
                            </div>
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Pilih No jika input adalah Tanggal</p>
                        
                        </div>

                        <div id="is-number-div" class=" w-full px-2 mb-3">
                            <label for="is-number" class="text-sm font-medium mb-1 block">
                                Apakah merupakan pertanyaan dengan jawaban suatu bilangan (angka)?
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            
                            <div id="dynamic-is-number">
                                @if ($part->id == 1 || $part->id == 2 || $part->id == 6)
                                    <select id="is-number" name="is-number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                                        <option disabled selected>Pilih</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                @else
                                    <input type="text" name="is-number" id="is-number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly required value="No">
                                @endif
                            </div>

                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Pilih No jika Input adalah Tanggal atau No. Telp</p>

                        </div>

                        <div class="w-full px-2 mb-3">
                            <label for="maks-char" class="text-sm font-medium mb-1 block">
                                Batas maksimal karakter yang bisa diinputkan (huruf, termasuk spasi)
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <input type="number" name="maks-char" id="maks-char" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'readonly' }}" {{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'readonly' }} required value="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : '0' }}">
                            
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Masukkan 0 jika Input adalah Tanggal atau No. Telp atau tidak mempunyai batasan</p>

                        </div>

                    </div>
                    {{-- Input End --}}

                    {{-- Selection Start --}}
                    <div id="card-selection" class="hidden bg-white rounded-md shadow-md mb-9 px-3 py-5">

                        <div class="w-full px-2 mb-3">
                            <h3 class="border-b-2 text-sm font-semibold pb-2">Type Input : Select, Rating, Checkbox</h3>
                        </div>

                        <div id="is-order-div" class=" w-full px-2 mb-3">
                            <label for="is-order" class="text-sm font-medium mb-1 block">
                                Apakah value (nilai) yang akan dikirim berupa angka 1, 2, 3, ...?
                                <span class="text-red-500">(wajib)</span>
                            </label>

                            <div id="dynamic-is-order">                                    
                                @if($part->id == 3 || $part->id == 4)
                                    <input type="text" name="is-order" id="is-order" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly required value="Yes">
                                @else
                                    <input type="text" name="is-order" id="is-order" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly required value="No">
                                @endif
                            </div>

                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Pilih yes, jika pilihan pertanyaan adalah seperti ini Pilihan = "Tidak Setuju", Value = 4</p>
                        </div>
                        
                        <div id="has-other-div" class=" w-full px-2 mb-3">
                            <label for="has-other" class="text-sm font-medium mb-1 block">
                                Apakah terdapat pilihan Other?
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            
                            <div id="dynamic-has-other">
                                @if ($part->id == 3 || $part->id == 4 || $part->id == 5)
                                    <input type="text" name="has-other" id="has-other" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly required value="No">
                                @else
                                    <select id="has-other" name="has-other" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                                        <option disabled selected>Pilih</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                @endif
                            </div>

                        </div>

                        <div class="w-full px-2 mb-3">
                            <label for="selection-number" class="text-sm font-medium mb-1 block">
                                Jumlah Pilihan
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <input type="number" name="selection-number" id="selection-number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 4 || $part->id == 5) ? 'readonly' : '' }}" {{ ($part->id == 4 || $part->id == 5) ? 'readonly' : '' }} required value="{{ ($part->id == 4) ? '10' : '' }}{{ ($part->id == 5) ? '0' : '' }}">
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Jumlah pilihan termasuk pilihan Other</p>
                        </div>

                    </div>
                    {{-- Selection End --}}

                    {{-- Textarea Start --}}
                    <div id="card-textarea" class="hidden bg-white rounded-md shadow-md mb-9 px-3 py-5">

                        <div class="w-full px-2 mb-3">
                            <h3 class="border-b-2 text-sm font-semibold pb-2">Type Input : Textarea</h3>
                        </div>

                        <div class="w-full px-2 mb-3">
                            <label for="row" class="text-sm font-medium mb-1 block">
                                Ukuran panjang kolom textarea dalam satuan baris
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <input type="number" name="row" id="row" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 5 || $part->id == 6) ? '' : 'readonly' }}" {{ ($part->id == 5 || $part->id == 6) ? '' : 'readonly' }} required value="{{ ($part->id == 5 || $part->id == 6) ? '' : '0' }}">
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Rekomendasi 3 atau 4 baris</p>
                        </div>

                    </div>
                    {{-- Textarea End --}}

                </div>
                {{-- Input Type Area End --}}

                {{-- Chart Start --}}
                <div id="card-chart" class="hidden bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="w-full px-2 mb-3">
                        <label for="has-chart" class="text-sm font-medium mb-1 block">
                            Apakah ditampilkan sebagai Grafik Pie Chart di Dashboard?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        
                        <div id="dynamic-has-chart">
                            @if ($part->id == 1 || $part->id == 2)
                                <select id="has-chart" name="has-chart" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                                    <option disabled selected>Pilih</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            @else
                                <input type="text" name="has-chart" id="has-chart" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly required value="No">
                            @endif
                        </div>
                        
                    </div>

                    <div class=" w-full px-2 mb-3" id="col-chart">
                        <label for="title-chart" class="text-sm font-medium mb-1 block">
                            Judul Chart
                            <span class="text-red-500">(wajib)</span>
                        </label>

                        <input type="text" name="title-chart" id="title-chart" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 1 || $part->id == 2) ? '' : 'readonly' }}" {{ ($part->id == 1 || $part->id == 2) ? '' : 'readonly' }} required value="{{ ($part->id == 1 || $part->id == 2) ? '' : '-' }}">

                        <p class="text-sm text-slate-500 my-1 italic opacity-50">Masukkan - jika jawaban diatas adalah No</p>
                    </div>
        
                </div>
                {{-- Chart End --}}


                <div class="flex">
                    <a href="/dashboard/manage-form/selection" class="font-semibold text-sm bg-primary text-white rounded-md mt-2 me-3 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Simpan</a>
                    <a href="/dashboard/manage-form" class="font-semibold text-sm bg-slate-400 text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Batal</a>
                </div>
                
            </div>
             
        </form>           

    </div>    

    {{-- JS --}}
    <script>
        // Tipe Input : Input
        var cardInput = document.querySelector('#card-input');
        var dynamicIsDate = document.querySelector('#dynamic-is-date');
        var isDate = document.querySelector('#is-date');
        
        var dynamicIsNumberPhone = document.querySelector('#dynamic-is-number-phone');
        var isNumberPhone = document.querySelector('#is-number-phone');
        
        var dynamicIsNumber = document.querySelector('#dynamic-is-number');
        var isNumber = document.querySelector('#is-number');

        var maksChar = document.querySelector('#maks-char');

        // Tipe Input : Select, Rating, Checkbox
        var cardSelection = document.querySelector('#card-selection');
        var dynamicIsOrder = document.querySelector('#dynamic-is-order');
        var isOrder = document.querySelector('#is-order');

        var dynamicHasOther = document.querySelector('#dynamic-has-other');
        var hasOther = document.querySelector('#has-other');

        var selectionNumber = document.querySelector('#selection-number');

        // Tipe Input : Textarea
        var cardTextarea = document.querySelector('#card-textarea');
        var row = document.querySelector('#row');

        // Chart
        var cardChart = document.querySelector('#card-chart');
        var dynamicHasChart = document.querySelector('#dynamic-has-chart');
        var hasChart = document.querySelector('#has-chart');
        var titleChart = document.querySelector('#title-chart');

        function addSelectElement(container, name, selected) {
            container.innerHTML = '';

            var selectElement = document.createElement('select');
            selectElement.id = name;
            selectElement.name = name;
            selectElement.className = 'text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none';
            selectElement.required = true;

            var optionElement1 = document.createElement('option');
            optionElement1.text = 'Pilih';
            optionElement1.disabled = true;
            if (selected === 'Pilih') {
                optionElement1.selected = true;
            }            
            selectElement.add(optionElement1);

            var optionElement2 = document.createElement('option');
            optionElement2.text = 'Yes';
            if (selected === 'Yes') {
                optionElement2.selected = true;
            }
            selectElement.add(optionElement2);

            var optionElement3 = document.createElement('option');
            optionElement3.text = 'No';
            if (selected === 'No') {
                optionElement3.selected = true;
            }
            selectElement.add(optionElement3);

            container.appendChild(selectElement);
        }

        function addInputElement(container, name, value) {
            container.innerHTML = '';

            var inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.id = name;
            inputElement.name = name;
            inputElement.className = 'text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly';
            inputElement.readOnly = true;
            inputElement.required = true;
            inputElement.value = value;

            container.appendChild(inputElement);
        }

        function refreshInput() {
            addSelectElement(dynamicIsDate, 'is-date', 'Pilih');
            addSelectElement(dynamicIsNumberPhone, 'is-number-phone', 'Pilih');
            addSelectElement(dynamicIsNumber, 'is-number', 'Pilih');
            maksChar.classList.remove('readonly');
            maksChar.readOnly = false;
            maksChar.value = '';
        }

        function refreshSelection() {
            addSelectElement(dynamicHasOther, 'has-other', 'Pilih');
            selectionNumber.classList.remove('readonly');
            selectionNumber.readOnly = false;
            selectionNumber.value = '';
        }

        function refreshTextarea(){
            row.classList.remove('readonly');
            row.readOnly = false;
            row.value = '';
        }

        function refreshChart(){
            addSelectElement(dynamicHasChart, 'has-chart', 'Pilih');
            titleChart.classList.remove('readonly');
            titleChart.readOnly = false;
            titleChart.value = '';
        }

        function refresh(partId) {
            // Bagian Identitas dan Bagian Layanan
            if (partId === '1' || partId === '2') {
                refreshInput();
                refreshSelection();
                refreshChart();
                cardChart.classList.add('hidden');
            }

            // Bagian Lain-lain
            else if (partId === '6') {
                refreshInput();
                refreshSelection();
                refreshTextarea();
            }

            cardInput.classList.add('hidden');
            cardSelection.classList.add('hidden');
            cardTextarea.classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function () {
            var inputType = document.querySelector('#input-type');
            var partId = document.querySelector('#part-id').textContent;
            
            inputType.addEventListener('change', function() {
                refresh(partId);

                if (inputType.value === 'Input') {
                    if (partId === '1' || partId === '2') {
                        addInputElement(dynamicHasOther, 'has-other', 'No');
                        selectionNumber.classList.add('readonly');
                        selectionNumber.readOnly = true;
                        selectionNumber.value = '0';

                        addInputElement(dynamicHasChart, 'has-chart', 'No');
                        titleChart.classList.add('readonly');
                        titleChart.readOnly = true;
                        titleChart.value = '-';
                    }
                    else if (partId === '6') {
                        addInputElement(dynamicHasOther, 'has-other', 'No');
                        selectionNumber.classList.add('readonly');
                        selectionNumber.readOnly = true;
                        selectionNumber.value = '0';

                        row.classList.add('readonly');
                        row.readOnly = true;
                        row.value = '0';
                    }

                    cardInput.classList.remove('hidden');
                } 
                else if (inputType.value === 'Select') {
                    if (partId === '1' || partId === '2') {
                        addInputElement(dynamicIsDate, 'is-date', 'No');
                        addInputElement(dynamicIsNumberPhone, 'is-number-phone', 'No');
                        addInputElement(dynamicIsNumber, 'is-number', 'No');
                        maksChar.classList.add('readonly');
                        maksChar.readOnly = true;
                        maksChar.value = '0';

                        cardChart.classList.remove('hidden');
                    }
                    else if (partId === '6') {
                        addInputElement(dynamicIsDate, 'is-date', 'No');
                        addInputElement(dynamicIsNumberPhone, 'is-number-phone', 'No');
                        addInputElement(dynamicIsNumber, 'is-number', 'No');
                        maksChar.classList.add('readonly');
                        maksChar.readOnly = true;
                        maksChar.value = '0';

                        row.classList.add('readonly');
                        row.readOnly = true;
                        row.value = '0';
                    }

                    cardSelection.classList.remove('hidden');
                }
                else if (inputType.value === 'Checkbox') {
                    addInputElement(dynamicIsDate, 'is-date', 'No');
                    addInputElement(dynamicIsNumberPhone, 'is-number-phone', 'No');
                    addInputElement(dynamicIsNumber, 'is-number', 'No');
                    maksChar.classList.add('readonly');
                    maksChar.readOnly = true;
                    maksChar.value = '0';

                    addInputElement(dynamicHasOther, 'has-other', 'No');

                    row.classList.add('readonly');
                    row.readOnly = true;
                    row.value = '0';

                    cardSelection.classList.remove('hidden');
                }
                else if (inputType.value === 'Textarea') {
                    addInputElement(dynamicIsDate, 'is-date', 'No');
                    addInputElement(dynamicIsNumberPhone, 'is-number-phone', 'No');
                    addInputElement(dynamicIsNumber, 'is-number', 'No');
                    maksChar.classList.add('readonly');
                    maksChar.readOnly = true;
                    maksChar.value = '0';

                    addInputElement(dynamicHasOther, 'has-other', 'No');
                    selectionNumber.classList.add('readonly');
                    selectionNumber.readOnly = true;
                    selectionNumber.value = '0';

                    cardTextarea.classList.remove('hidden');
                }
            });

        }); 
    </script>    

@endsection