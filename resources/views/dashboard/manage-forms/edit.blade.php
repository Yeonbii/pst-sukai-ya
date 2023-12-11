@extends('dashboard.layouts.main')

@section('container')

    @if ($errors->any())
        <div id="alert-card">
            <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-red-500 bg-red-500 text-red-900">
                <div class="ms-4">
                    Terdapat beberapa kesalahan, silahkan ulangi!
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
        <h3 class="font-semibold text-xl">Manage Form - Tambah Pertanyaan <span class="text-primary">{{ $question->part->name }}</span></h3>
        <p id="part_id" class="hidden">{{ $question->part_id }}</p>
    </div>

    <div class="py-12">

        <form action="/dashboard/manage-form/{{ $question->id }}/edit" method="post">
            @csrf
            <div class="w-full">

                {{-- No Start --}}
                <div id="no_card" class="bg-white rounded-md shadow-md mb-9 p-7">

                    <div id="no_div" class="w-full mb-7">
                        <label for="no" class="text-sm font-medium mb-2 block">
                            No
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="no" name="no" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus required>
                            @for ($i = 1; $i <= $count; $i++)
                                <option value="{{ $i }}" {{ ($i == $question->no) ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                </div>
                {{-- No End --}}

                {{-- Body Question Start --}}
                <div id="body_card" class="bg-white rounded-md shadow-md mb-9 p-7">

                    <div id="text_div" class="w-full mb-7">
                        <label for="text" class="text-sm font-medium mb-2 block">
                            Isi Pertanyaan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <input type="text" name="text" id="text" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required value="{{ $question->text }}">
                    </div>

                    <div id="is_required_div" class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Apakah wajib dijawab?
                            <span class="text-red-500">(wajib)</span>
                        </p>

                        <div id="is_required" class="mt-3">
                            
                            {{-- Yes --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="is_required" id="is_required_1" value="1" class="w-4 h-4 flex-shrink-0" required {{ ($question->is_required === '1') ? 'checked' : '' }}>
                                <label for="is_required_1" class="ms-2 text-sm font-medium">Yes</label>
                            </div>

                            {{-- No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="is_required" id="is_required_0" value="0" class="w-4 h-4 flex-shrink-0" required {{ ($question->is_required === '0') ? 'checked' : '' }}>
                                <label for="is_required_0" class="ms-2 text-sm font-medium">No</label>
                            </div>

                        </div>

                    </div>

                    <div id="need_note_div" class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Apakah perlu Keterangan?
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        
                        <div id="need_note" class="mt-3">
                            
                            {{-- Yes --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="need_note" id="need_note_1" value="1" class="w-4 h-4 flex-shrink-0" required onchange="need_note_change(this)" {{ ($question->need_note === '1') ? 'checked' : '' }}>
                                <label for="need_note_1" class="ms-2 text-sm font-medium">Yes</label>
                            </div>

                            {{-- No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="need_note" id="need_note_0" value="0" class="w-4 h-4 flex-shrink-0" required onchange="need_note_change(this)" {{ ($question->need_note === '0') ? 'checked' : '' }}>
                                <label for="need_note_0" class="ms-2 text-sm font-medium">No</label>
                            </div>

                        </div>

                    </div>

                    <div id="note_div" class="w-full mb-7 {{ ($question->need_note === '1') ? '' : 'hidden' }}">
                        <label for="note" class="text-sm font-medium mb-2 block">
                            Keterangan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <textarea id="note" name="note" rows="4" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>{{ $question->note }}</textarea>
                        <p class="text-sm text-slate-500 mb-2 italic opacity-50">Jika terdapat sebuah link, maka tolong apitkan dengan link*...*link,<br>contoh <span class="font-semibold text-blue-500">link*google.com*link</span></p>
                    </div>

                </div>
                {{-- Body Question End --}}


                {{-- Input Type Start --}}
                <div id="input_type_card" class="bg-white rounded-md shadow-md mb-9 p-7 {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'hidden' : '' }}">

                    <div id="input_type_div" class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Tipe Input
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        
                        <div id="input_type" class="mt-3">

                            {{-- 1 . Input : Text --}}
                            {{-- Hilangkan pilihan ketika Bagian Nilai Pelayanan, Rating Pelayanan, dan Feedback --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'hidden' : '' }}">
                                <input type="radio" name="input_type" id="input_type_1" value="1" class="w-4 h-4 flex-shrink-0" required onchange="input_type_change(this)" {{ ($question->input_type === '1') ? 'checked' : '' }}>
                                <label for="input_type_1" class="ms-2 text-sm font-medium">Input : Text</label>
                            </div>
    
                            {{-- 2. Input : Numeric --}}
                            {{-- Hilangkan pilihan ketika Bagian Nilai Pelayanan, Rating Pelayanan, dan Feedback --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'hidden' : '' }}">
                                <input type="radio" name="input_type" id="input_type_2" value="2" class="w-4 h-4 flex-shrink-0" required onchange="input_type_change(this)" {{ ($question->input_type === '2') ? 'checked' : '' }}>
                                <label for="input_type_2" class="ms-2 text-sm font-medium">Input : Numeric</label>
                            </div>

                            {{-- 3. Input : Date --}}
                            {{-- Hilangkan pilihan ketika Bagian Nilai Pelayanan, Rating Pelayanan, dan Feedback --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'hidden' : '' }}">
                                <input type="radio" name="input_type" id="input_type_3" value="3" class="w-4 h-4 flex-shrink-0" required onchange="input_type_change(this)" {{ ($question->input_type === '3') ? 'checked' : '' }}>
                                <label for="input_type_3" class="ms-2 text-sm font-medium">Input : Date</label>
                            </div>
                            
                            {{-- 4. Input : (Contoh No. Telp) --}}
                            {{-- Hilangkan pilihan ketika Bagian Nilai Pelayanan, Rating Pelayanan, dan Feedback --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'hidden' : '' }}">
                                <input type="radio" name="input_type" id="input_type_4" value="4" class="w-4 h-4 flex-shrink-0" required onchange="input_type_change(this)" {{ ($question->input_type === '4') ? 'checked' : '' }}>
                                <label for="input_type_4" class="ms-2 text-sm font-medium">Input : (Contoh No. Telp)</label>
                            </div>

                            {{-- 5. Select : (Pilih salah satu) --}}
                            {{-- Hilangkan pilihan ketika Bagian Nilai Pelayanan, Rating Pelayanan, dan Feedback --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'hidden' : '' }}">
                                <input type="radio" name="input_type" id="input_type_5" value="5" class="w-4 h-4 flex-shrink-0" required onchange="input_type_change(this)" {{ ($question->input_type === '5') ? 'checked' : '' }}>
                                <label for="input_type_5" class="ms-2 text-sm font-medium">Select : (Pilih salah satu)</label>
                            </div>

                            {{-- 6. Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...) --}}
                            {{-- Pilihan hanya tersedia untuk Bagian Nilai Pelayanan --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 3) ? '' : 'hidden' }}">
                                <input type="radio" name="input_type" id="input_type_6" value="6" class="w-4 h-4 flex-shrink-0" required {{ ($question->part_id == 3) ? 'checked' : '' }}>
                                <label for="input_type_6" class="ms-2 text-sm font-medium">Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)</label>
                            </div>

                            {{-- 7. Select : Yes or No --}}
                            {{-- Hilangkan pilihan ketika Bagian Nilai Pelayanan, Rating Pelayanan, dan Feedback --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'hidden' : '' }}">
                                <input type="radio" name="input_type" id="input_type_7" value="7" class="w-4 h-4 flex-shrink-0" required onchange="input_type_change(this)" {{ ($question->input_type === '7') ? 'checked' : '' }}>
                                <label for="input_type_7" class="ms-2 text-sm font-medium">Select : Yes or No</label>
                            </div>

                            {{-- 8. Rating (Pilih 1 s/d 10) --}}
                            {{-- Pilihan hanya tersedia untuk Bagian Rating Pelayanan --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 4) ? '' : 'hidden' }}">
                                <input type="radio" name="input_type" id="input_type_8" value="8" class="w-4 h-4 flex-shrink-0" required {{ ($question->part_id == 4) ? 'checked' : '' }}>
                                <label for="input_type_8" class="ms-2 text-sm font-medium">Rating (Pilih 1 s/d 10)</label>
                            </div>

                            {{-- 9. Textarea --}}
                            {{-- Pilihan hanya tersedia untuk Bagian Feedback dan Other --}}
                            <div class="flex items-center mb-4 {{ ($question->part_id == 5 || $question->part_id == 6) ? '' : 'hidden' }}">
                                <input type="radio" name="input_type" id="input_type_9" value="9" class="w-4 h-4 flex-shrink-0" required {{ ($question->part_id == 5 || $question->input_type === '9') ? 'checked' : '' }} onchange="input_type_change(this)">
                                <label for="input_type_9" class="ms-2 text-sm font-medium">Textarea</label>
                            </div>

                        </div>

                    </div>

                </div>
                {{-- Input Type End --}}

                {{-- Input Type Area Start --}}
                <div id="input_type_area">

                    {{-- Input Start --}}
                    <div id="input_card" class="bg-white rounded-md shadow-md mb-9 p-7 {{ ($question->input_type === '1') ? '' : 'hidden' }}">

                        <p class="text-sm font-semibold mb-7 border-b-2 pb-3">Khusus untuk Tipe Input : Input</p>
                        <div id="maks_char_div" class="w-full mb-7">
                            <label for="maks_char" class="text-sm font-medium mb-2 block">
                                Batas maksimal karakter yang bisa diinputkan (huruf, termasuk spasi)
                                <span class="text-red-500">(wajib)</span>
                            </label>

                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">Masukkan 0 jika tidak mempunyai batasan <br>Jika mempunyai batasan, maka masukkan antara 1 s/d 50</p>

                            <input type="number" name="maks_char" id="maks_char" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($question->part_id == 1 || $question->part_id == 2 || $question->part_id == 6) ? '' : 'readonly' }}" {{ ($question->part_id == 1 || $question->part_id == 2 || $question->part_id == 6) ? '' : 'readonly' }} required value="{{ ($question->part_id == 1 || $question->part_id == 2 || $question->part_id == 6) ? $question->maks_char : '0' }}">

                        </div>

                    </div>
                    {{-- Input End --}}

                    {{-- Select Start --}}
                    <div id="select_card" class="bg-white rounded-md shadow-md mb-9 p-7 {{ ($question->input_type === '5') ? '' : 'hidden'  }}">
                        
                        <p class="text-sm font-semibold mb-7 border-b-2 pb-3">Khusus untuk Tipe Input : Select dan Rating</p>

                        <div id="has_other_div" class=" w-full mb-7">
                            <p class="text-sm font-medium mb-2">
                                Apakah terdapat pilihan Other (Yang Lain)?
                                <span class="text-red-500">(wajib)</span>
                            </p>
                            
                            <div id="has_other" class="mt-3">
                            
                                {{-- Yes --}}
                                <div class="flex items-center mb-4">
                                    <input type="radio" name="has_other" id="has_other_1" value="1" class="w-4 h-4 flex-shrink-0" required {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'disabled' : ''}} {{ ($question->has_other === '1') ? 'checked' : '' }}>
                                    <label for="has_other_1" class="ms-2 text-sm font-medium">Yes</label>
                                </div>
    
                                {{-- No --}}
                                <div class="flex items-center mb-4">
                                    <input type="radio" name="has_other" id="has_other_0" value="0" class="w-4 h-4 flex-shrink-0" required {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'checked' : '' }} {{ ($question->has_other === '0') ? 'checked' : '' }}>
                                    <label for="has_other_0" class="ms-2 text-sm font-medium">No</label>
                                </div>
    
                            </div>

                        </div>

                        <div id="option_number_div" class="w-full mb-7">
                            <label for="option_number" class="text-sm font-medium mb-2 block">
                                Jumlah Pilihan
                                <span class="text-red-500">(wajib)</span>
                            </label>

                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">Jika terdapat pilih Other, maka Jumlah Pilihan termasuk pilihan Other <br>Masukkan antara 1 s/d 30</p>
                            
                            <input type="number" name="option_number" id="option_number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'readonly' : '' }}" {{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? 'readonly' : '' }} required value="{{ ($question->part_id == 3 || $question->part_id == 4 || $question->part_id == 5) ? '0' : $question->option_number }}">
                            

                        </div>

                    </div>
                    {{-- Select End --}}

                </div>
                {{-- Input Type Area End --}}

                {{-- Chart Start --}}
                <div id="chart_card" class="bg-white rounded-md shadow-md mb-9 p-7 {{ ($question->input_type === '5' && ($question->part_id == 1 || $question->part_id == 2)) ? '' : 'hidden'  }}">

                    <p class="text-sm font-semibold mb-7 border-b-2 pb-3">Grafik Pie Chart</p>

                    <div id="has_chart_div" class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Apakah ditampilkan sebagai Grafik Pie Chart di Dashboard?
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        
                        <div id="has_chart" class="mt-3">
                            
                            {{-- Yes --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="has_chart" id="has_chart_1" value="1" class="w-4 h-4 flex-shrink-0" required {{ ($question->part_id == 1 || $question->part_id == 2) ? '' : 'disabled' }} {{ ($question->has_chart === '1') ? 'checked' : '' }}>
                                <label for="has_chart_1" class="ms-2 text-sm font-medium">Yes</label>
                            </div>

                            {{-- No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="has_chart" id="has_chart_0" value="0" class="w-4 h-4 flex-shrink-0" required {{ ($question->part_id == 1 || $question->part_id == 2) ? '' : 'checked' }} {{ ($question->has_chart === '0') ? 'checked' : '' }}>
                                <label for="has_chart_0" class="ms-2 text-sm font-medium">No</label>
                            </div>

                        </div>
                        
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

        var part_id = document.querySelector('#part_id').textContent;

        // Note
        var note_div = document.querySelector('#note_div');
        var note = document.querySelector('#note');

        // Input
        var input_card = document.querySelector('#input_card');
        var maks_char_div = document.querySelector('#maks_char_div');
        var maks_char = document.querySelector('#maks_char');

        // Select
        var select_card = document.querySelector('#select_card');
        var has_other_div = document.querySelector('#has_other_div');
        var has_other = document.querySelector('#has_other');
        var option_number_div = document.querySelector('#option_number_div');
        var option_number = document.querySelector('#option_number');

        // Chart
        var chart_card = document.querySelector('#chart_card');
        var has_chart_div = document.querySelector('#has_chart_div');
        var has_chart = document.querySelector('#has_chart');
        
        // FUngsi Lock Input
        function lock_input(lock, value) {
            lock.classList.add('readonly');
            lock.readOnly = true;
            lock.value = value;
        }

        function refresh_input(refresh) {
            refresh.classList.remove('readonly');
            refresh.readOnly = false;
            refresh.value = '';
        }

        // Fungsi Lock Radio
        function lock_radio(lock, pilih) {
            var lock_pilihan = lock.querySelectorAll('input[type="radio"]');

            lock_pilihan.forEach(function(element) {
                element.checked = false;
                element.disabled = true;
            });

            lock_pilihan[pilih].checked = true;
            lock_pilihan[pilih].disabled = false;
        }

        // Fungsi Refresh Radio
        function refresh_radio(refresh) {
            var refresh_pilihan = refresh.querySelectorAll('input[type="radio"]');

            refresh_pilihan.forEach(function(element) {
                element.checked = false;
                element.disabled = false;
            });
        }

        // Ketika Need Note dipilih
        function need_note_change(pilih) {
            
            // Jika Yes
            if (pilih.value === '1') {
                note_div.classList.remove('hidden');

                refresh_input(note, '');
            }
            
            // Jika No
            else if (pilih.value === '0') {
                note_div.classList.add('hidden');

                lock_input(note, '-');
            }

        }

        // Ketika Input Type dipilih
        function input_type_change(pilih) {
            input_card.classList.add('hidden');
            select_card.classList.add('hidden');

            refresh_input(maks_char);

            refresh_radio(has_other);
            refresh_input(option_number);

            if (part_id === '1' || part_id === '2') {
                chart_card.classList.add('hidden');
                refresh_radio(has_chart);
            }

            // Jika Input : Text
            if (pilih.value === '1') {
                input_card.classList.remove('hidden');

                lock_radio(has_other, 1);
                lock_input(option_number, '0');

                if (part_id === '1' || part_id === '2') {
                    lock_radio(has_chart, 1);
                }
            }

            // Jika Input : Numeric, Input : Date, Input : (Contoh No. Telp)
            else if (pilih.value === '2' || pilih.value === '3' || pilih.value === '4') {
                lock_input(maks_char, '0');

                lock_radio(has_other, 1);
                lock_input(option_number, '0');

                if (part_id === '1' || part_id === '2') {
                    lock_radio(has_chart, 1);
                }
            }

            // Jika Select : (Pilih salah satu)
            else if (pilih.value === '5'){
                select_card.classList.remove('hidden');

                lock_input(maks_char, '0');

                if (part_id === '1' || part_id === '2') {
                    chart_card.classList.remove('hidden');
                }
            }

            // Jika Select : Yes or No
            else if (pilih.value === '7'){
                lock_input(maks_char, '0');

                lock_radio(has_other, 1);
                lock_input(option_number, '0');

                if (part_id === '1' || part_id === '2') {
                    chart_card.classList.remove('hidden');
                }
            }

            // Jika Textarea
            else if (pilih.value === '9'){
                if (part_id === '6') {
                    lock_input(maks_char, '0');

                    lock_radio(has_other, 1);
                    lock_input(option_number, '0');
                }
            }
            
        }
         
    </script>    

@endsection