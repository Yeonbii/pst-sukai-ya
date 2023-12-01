@extends('dashboard.layouts.main')

@section('container')

    <div class="flex h-[44px] items-end">
        <h3 class="font-semibold text-xl">Manage Form - Tambah Pertanyaan</h3>
    </div>

    <div class="py-12">

        <form action="">
            @csrf
            <div class="w-full">

                {{-- Part and No Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="flex flex-wrap items-center">

                        <div class="w-full px-2 mb-3 md:w-1/2">
                            <label for="part" class="text-sm font-medium mb-1 block">
                                Bagian
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <select id="part" name="part" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus>
                                <option>Pilih</option>
                                <option value="1">Identitas</option>
                                <option value="2">Layanan</option>
                                <option value="3">Nilai Pelayanan</option>
                                <option value="4">Rating Pelayanan</option>
                                <option value="5">Feedback</option>
                                <option value="6">Lain-lain</option>
                            </select>
                        </div>
                        
                        <div class="w-full px-2 mb-3 md:w-1/2">
                            <label for="no" class="text-sm font-medium mb-1 block">
                                No
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <select id="no" name="no" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected>4</option>
                            </select>
                        </div>
                        
                    </div>

                </div>
                {{-- Part and No End --}}

                {{-- Body Question Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="w-full px-2 mb-3">
                        <label for="text" class="text-sm font-medium mb-1 block">
                            Isi Pertanyaan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <input type="text" name="text" id="text" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                    </div>

                    <div class="w-full px-2 mb-3">
                        <label for="required" class="text-sm font-medium mb-1 block">
                            Apakah wajib dijawab?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="required" name="required" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <option>Pilih</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>

                    <div class="w-full px-2 mb-3">
                        <label for="need-note" class="text-sm font-medium mb-1 block">
                            Apakah perlu Keterangan?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="need-note" name="need-note" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <option>Pilih</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>

                    <div class="hidden w-full px-2 mb-3" id="col-note">
                        <label for="note" class="text-sm font-medium mb-1 block">
                            Keterangan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <textarea id="note" name="note" rows="4" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"></textarea>
                    </div>

                </div>
                {{-- Body Question End --}}

                {{-- Input Type Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="w-full px-2 mb-3">
                        <label for="input-type" class="text-sm font-medium mb-1 block">
                            Tipe Input
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="input-type" name="input-type" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus>
                            <option>Pilih</option>
                            <option value="1" class="hidden">Input : Text</option>
                            <option value="2" class="hidden">Textarea (Paragraf atau semacamnya)</option>
                            <option value="3" class="hidden">Select (Pilih Salah Satu)</option>
                            <option value="4" class="hidden">Rating</option>
                            <option value="5" class="hidden">Checkbox (Pilih beberapa yang benar)</option>
                        </select>
                    </div>

                    {{-- Input : Text Start --}}
                    <div class="hidden" id="input-text-selected">

                        <div class="w-full px-2 mb-3">
                            <label for="maks-input" class="text-sm font-medium mb-1 block">
                                Batas maksimal karakter yang bisa diinputkan
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <input type="number" name="maks-input" id="maks-input" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">jika tidak mempunyai batasan, masukkan 0</p>
                        </div>

                    </div>
                    {{-- Input : Text End --}}

                    {{-- Textarea Start --}}
                    <div class="hidden" id="textarea-selected">

                        <div class="w-full px-2 mb-3">
                            <label for="row" class="text-sm font-medium mb-1 block">
                                Ukuran panjang kolom textarea dalam satuan baris
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <input type="number" name="row" id="row" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Rekomendasi 3 atau 4 baris</p>
                        </div>

                    </div>
                    {{-- Textarea End --}}

                    {{-- Selection Start --}}
                    <div class="hidden" id="selection-selected">

                        <div id="is-number-div" class="hidden w-full px-2 mb-3">
                            <label for="is-number" class="text-sm font-medium mb-1 block">
                                Apakah value (nilai) yang akan dikirim berupa angka 1, 2, 3, ...?
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <select id="is-number" name="is-number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                                <option>Pilih</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Pilih yes, jika pilihan pertanyaan adalah seperti ini Pilihan = "Tidak Setuju", Value = 4</p>
                        </div>
                        
                        <div id="has-other-div" class="hidden w-full px-2 mb-3">
                            <label for="has-other" class="text-sm font-medium mb-1 block">
                                Apakah terdapat pilihan Other?
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <select id="has-other" name="has-other" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                                <option>Pilih</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <div class="w-full px-2 mb-3">
                            <label for="selection-number" class="text-sm font-medium mb-1 block">
                                Jumlah Pilihan
                                <span class="text-red-500">(wajib)</span>
                            </label>
                            <input type="number" name="selection-number" id="selection-number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Nilai default untuk Nilai Pelayanan adalah 4</p>
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Nilai default untuk Rating Pelayanan adalah 10</p>
                            <p class="text-sm text-slate-500 my-1 italic opacity-50">Jumlah pilihan termasuk pilihan Other</p>
                        </div>

                    </div>
                    {{-- Selection End --}}


                </div>
                {{-- Input Type End --}}

                {{-- Chart Start --}}
                <div id="card-chart" class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                    <div class="w-full px-2 mb-3">
                        <label for="need-chart" class="text-sm font-medium mb-1 block">
                            Apakah ditampilkan sebagai Grafik Pie Chart di Dashboard?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="need-chart" name="need-chart" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <option>Pilih</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>

                    <div class="hidden w-full px-2 mb-3" id="col-chart">
                        <label for="title" class="text-sm font-medium mb-1 block">Judul Chart</label>
                        <input type="text" name="title" id="title" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                    </div>
        
                </div>
                {{-- Chart End --}}

                {{-- Triggered Start --}}
                <div id="card-triggered" class="bg-white rounded-md shadow-md mb-9 px-3 py-5">
                    
                    <div class="w-full px-2 mb-3">
                        <label for="is-triggered" class="text-sm font-medium mb-1 block">
                            Apakah Pertanyaan hanya akan muncul ketika Responden menjawab Pertanyaan lain dengan jawaban tertentu?
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="is-triggered" name="is-triggered" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <option>Pilih</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>

                </div>
                {{-- Triggered End --}}

                <div class="flex">
                    <a href="/dashboard/manage-form/selection" class="font-semibold text-sm bg-primary text-white rounded-md mt-2 me-3 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Simpan</a>
                    <a href="/dashboard/manage-form" class="font-semibold text-sm bg-slate-400 text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Batal</a>
                </div>
                
            </div>
             
        </form>           

    </div>    

    {{-- JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            // Deklarasi Variabel Global
            var part = document.querySelector('#part');
            var needNoteSelect = document.querySelector('#need-note');
            var colNote = document.querySelector('#col-note');
            var inputType = document.querySelector('#input-type');
            var maksInput = document.querySelector('#maks-input');
            var row = document.querySelector('#row');
            var selectionNumber = document.querySelector('#selection-number');
            var isNumberDiv = document.querySelector("#is-number-div");
            var isNumber = document.querySelector('#is-number');
            var hasOtherDiv = document.querySelector("#has-other-div");
            var hasOther = document.querySelector('#has-other');
            var inputTextSelected = document.querySelector('#input-text-selected');
            var textareaSelected = document.querySelector('#textarea-selected');
            var selectionSelected = document.querySelector('#selection-selected');
            var cardChart = document.querySelector('#card-chart');
            var needChartSelect = document.querySelector('#need-chart');
            var colChart = document.querySelector('#col-chart');

            function inputTypeSelected () {
                // Menghilangkan input-text-selected
                inputTextSelected.classList.add('hidden');
                maksInput.value = '0';

                // Menghilangkan textarea-selected
                textareaSelected.classList.add('hidden');
                row.value = '0';

                // Menghilangkan selection-selected
                selectionSelected.classList.add('hidden');
                selectionNumber.value = '0';

                isNumberDiv.classList.add('hidden');
                isNumber.value = 'No';
                
                hasOtherDiv.classList.add('hidden');
                hasOther.value = 'No';
            }

            // Ketika User memilih Part
            part.addEventListener('change', function() {
                
                for (var i = 1; i < inputType.options.length; i++) {
                    inputType.options[i].classList.add('hidden');
                }

                // Pengkondisian Bagian Part

                // Untuk Part Identitas dan Layanan
                if (part.value === '1' || part.value === '2' ){
                    inputType.options[1].classList.remove('hidden');
                    inputType.options[2].classList.remove('hidden');
                    inputType.options[3].classList.remove('hidden');
                    inputType.options[5].classList.remove('hidden');
                }
                
                // Untuk Part Nilai Pelayanan
                else if (part.value === '3') {
                    inputType.options[3].classList.remove('hidden');
                } 

                // Untuk Part Rating Pelayanan
                else if (part.value === '4') {
                    inputType.options[4].classList.remove('hidden');
                }

                // Untuk Part Feedback
                else if (part.value === '5') {
                    inputType.options[2].classList.remove('hidden');
                } 

                // Untuk Part Other
                else if (part.value === '6') {
                    inputType.options[1].classList.remove('hidden');
                    inputType.options[2].classList.remove('hidden');
                    inputType.options[3].classList.remove('hidden');
                    inputType.options[5].classList.remove('hidden');
                    inputType.options[6].classList.remove('hidden');
                }

                inputType.value = 'Pilih';

                inputTypeSelected();

            });
            
            
    
            // Jika Pertanyaan perlu Keterangan
            needNoteSelect.addEventListener('change', function () {
                
                var note = document.querySelector('#note');

                colNote.classList.add('hidden');
                note.value = '-';

                if (needNoteSelect.value === 'Yes') {
                    colNote.classList.remove('hidden');
                    note.value = '';
                }

            });

            inputType.addEventListener('change', function() {
                
                inputTypeSelected();

                if (inputType.value === '1') {
                    inputTextSelected.classList.remove('hidden');
                    
                }

                else if (inputType.value === '2') {
                    textareaSelected.classList.remove('hidden');
                    row.value = '3';
                }

                else if (inputType.value === '3' || inputType.value === '4' || inputType.value === '5') {
                    selectionSelected.classList.remove('hidden');
                    selectionNumber.value = '1';

                    if (inputType.value === '3') {
                        isNumberDiv.classList.remove('hidden');
                        isNumber.value = 'Pilih';
                    }
                }
            });

            isNumber.addEventListener('change', function() {
                hasOtherDiv.classList.add('hidden');
                hasOther.value = 'No';

                if (isNumber.value === 'No') {
                    hasOtherDiv.classList.remove('hidden');
                    hasOther.value = 'Pilih';
                }
            });

            
            // Jika Pertanyaan ingin ditampilkan pada Dashboard sebagai Grafik Pie Chart
            needChartSelect.addEventListener('change', function () {
                var title = document.querySelector('#title');
                
                colChart.classList.add('hidden');
                title.value = '-';

                if (needChartSelect.value === 'Yes') {
                    colChart.classList.remove('hidden');
                    title.value = '';
                } 

            });

        });
    </script>    

@endsection