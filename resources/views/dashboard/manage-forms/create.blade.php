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
                <div id="card-no" class="bg-white rounded-md shadow-md mb-9 p-7">

                    <div class="w-full mb-7">
                        <label for="no" class="text-sm font-medium mb-2 block">
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
                {{-- No End --}}

                {{-- Body Question Start --}}
                <div id="card-body" class="bg-white rounded-md shadow-md mb-9 p-7">

                    <div class="w-full mb-7">
                        <label for="text" class="text-sm font-medium mb-2 block">
                            Isi Pertanyaan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <input type="text" name="text" id="text" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required>
                    </div>

                    <div class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Apakah wajib dijawab?
                            <span class="text-red-500">(wajib)</span>
                        </p>

                        <div id="is_required" class="mt-3">
                            
                            {{-- Yes --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="is_required" id="is_required_1" value="1" class="w-4 h-4 flex-shrink-0" required>
                                <label for="is_required_1" class="ms-2 text-sm font-medium">Yes</label>
                            </div>

                            {{-- No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="is_required" id="is_required_0" value="0" class="w-4 h-4 flex-shrink-0" required>
                                <label for="is_required_0" class="ms-2 text-sm font-medium">No</label>
                            </div>

                        </div>

                    </div>

                    <div class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Apakah perlu Keterangan?
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        
                        <div id="need_note" class="mt-3">
                            
                            {{-- Yes --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="need_note" id="need_note_1" value="1" class="w-4 h-4 flex-shrink-0" required>
                                <label for="need_note_1" class="ms-2 text-sm font-medium">Yes</label>
                            </div>

                            {{-- No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="need_note" id="need_note_0" value="0" class="w-4 h-4 flex-shrink-0" required>
                                <label for="need_note_0" class="ms-2 text-sm font-medium">No</label>
                            </div>

                        </div>

                    </div>

                    <div class="w-full mb-7">
                        <label for="note" class="text-sm font-medium mb-2 block">
                            Keterangan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <textarea id="note" name="note" rows="4" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" required></textarea>
                    </div>

                </div>
                {{-- Body Question End --}}

                {{-- Triggered Start --}}
                <div id="card-triggered" class="bg-white rounded-md shadow-md mb-9 p-7">
    
                    <div class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Apakah Pertanyaan hanya akan muncul ketika Responden menjawab Pertanyaan lain dengan jawaban tertentu?
                            <span class="text-red-500">(wajib)</span>
                        </p>

                        <p class="text-sm text-slate-500 mb-2 italic opacity-50">Mohon maaf, untuk saat ini hanya untuk 1 Bagian saja 🙏</p>
                        
                        <div id="is_triggered" class="mt-3">
                            
                            {{-- Yes --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="is_triggered" id="is_triggered_1" value="1" class="w-4 h-4 flex-shrink-0" required>
                                <label for="is_triggered_1" class="ms-2 text-sm font-medium">Yes</label>
                            </div>

                            {{-- No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="is_triggered" id="is_triggered_0" value="0" class="w-4 h-4 flex-shrink-0" required>
                                <label for="is_triggered_0" class="ms-2 text-sm font-medium">No</label>
                            </div>

                        </div>

                    </div>

                </div>
                {{-- Triggered End --}}

                {{-- Input Type Start --}}
                <div id="card-input-type" class="bg-white rounded-md shadow-md mb-9 p-7">

                    <div class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Tipe Input
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        
                        <div id="type_input" class="mt-3">

                            {{-- 1 . Input : Text --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_1" value="1" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_1" class="ms-2 text-sm font-medium">Input : Text</label>
                            </div>
    
                            {{-- 2. Input : Numeric --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_2" value="2" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_2" class="ms-2 text-sm font-medium">Input : Numeric</label>
                            </div>

                            {{-- 3. Input : Date --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_3" value="3" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_3" class="ms-2 text-sm font-medium">Input : Date</label>
                            </div>
                            
                            {{-- 4. Input : (Contoh No. Telp) --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_4" value="4" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_4" class="ms-2 text-sm font-medium">Input : (Contoh No. Telp)</label>
                            </div>

                            {{-- 5. Select : (Pilih salah satu) --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_5" value="5" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_5" class="ms-2 text-sm font-medium">Select : (Pilih salah satu)</label>
                            </div>

                            {{-- 6. Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...) --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_6" value="6" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_6" class="ms-2 text-sm font-medium">Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)</label>
                            </div>

                            {{-- 7. Select : Yes or No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_7" value="7" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_7" class="ms-2 text-sm font-medium">Select : Yes or No</label>
                            </div>

                            {{-- 8. Rating (Pilih 1 s/d 10) --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_8" value="8" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_8" class="ms-2 text-sm font-medium">Rating (Pilih 1 s/d 10)</label>
                            </div>

                            {{-- 9. Textarea --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="type_input" id="type_input_9" value="9" class="w-4 h-4 flex-shrink-0" required>
                                <label for="type_input_9" class="ms-2 text-sm font-medium">Textarea</label>
                            </div>

                        </div>

                    </div>

                </div>
                {{-- Input Type End --}}

                {{-- Input Type Area Start --}}
                <div id="input-type-area">

                    {{-- Input Start --}}
                    <div id="card-input" class="bg-white rounded-md shadow-md mb-9 p-7">

                        <p class="text-sm font-semibold mb-7 border-b-2 pb-3">Khusus untuk Tipe Input : Input</p>
                        
                        <div id="maks-char-div" class="w-full mb-7">
                            <label for="maks_char" class="text-sm font-medium mb-2 block">
                                Batas maksimal karakter yang bisa diinputkan (huruf, termasuk spasi)
                                <span class="text-red-500">(wajib)</span>
                            </label>

                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">Masukkan 0 jika Input jawaban diatas adalah 3 atau 4</p>

                            <input type="number" name="maks_char" id="maks_char" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'readonly' }}" {{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : 'readonly' }} required value="{{ ($part->id == 1 || $part->id == 2 || $part->id == 6) ? '' : '0' }}">
                            
                        </div>

                    </div>
                    {{-- Input End --}}

                    {{-- Select Start --}}
                    <div id="card-select" class="bg-white rounded-md shadow-md mb-9 p-7">
                        
                        <p class="text-sm font-semibold mb-7 border-b-2 pb-3">Khusus untuk Tipe Input : Select dan Rating</p>

                        <div id="has-other-div" class=" w-full mb-7">
                            <p class="text-sm font-medium mb-2">
                                Apakah terdapat pilihan Other?
                                <span class="text-red-500">(wajib)</span>
                            </p>
                            
                            <div id="has_other" class="mt-3">
                            
                                {{-- Yes --}}
                                <div class="flex items-center mb-4">
                                    <input type="radio" name="has_other" id="has_other_1" value="1" class="w-4 h-4 flex-shrink-0" required {{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'disabled' : '' }}>
                                    <label for="has_other_1" class="ms-2 text-sm font-medium">Yes</label>
                                </div>
    
                                {{-- No --}}
                                <div class="flex items-center mb-4">
                                    <input type="radio" name="has_other" id="has_other_0" value="0" class="w-4 h-4 flex-shrink-0" required {{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'checked' : '' }}>
                                    <label for="has_other_0" class="ms-2 text-sm font-medium">No</label>
                                </div>
    
                            </div>

                        </div>

                        <div id="option-number-div" class="w-full mb-7">
                            <label for="option_number" class="text-sm font-medium mb-2 block">
                                Jumlah Pilihan
                                <span class="text-red-500">(wajib)</span>
                            </label>

                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">Jumlah pilihan termasuk pilihan Other</p>
                            
                            <input type="number" name="option_number" id="option_number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none {{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'readonly' : '' }}" {{ ($part->id == 3 || $part->id == 4 || $part->id == 5) ? 'readonly' : '' }} required value="{{ ($part->id == 3) ? '4' : (($part->id == 4) ? '10' : (($part->id == 5) ? '0' : '')) }}">
                            
                        </div>

                    </div>
                    {{-- Select End --}}

                </div>
                {{-- Input Type Area End --}}

                {{-- Chart Start --}}
                <div id="card-chart" class="bg-white rounded-md shadow-md mb-9 p-7">

                    <p class="text-sm font-semibold mb-7 border-b-2 pb-3">Grafik Pie Chart</p>

                    <div id="has-chart-div" class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Apakah ditampilkan sebagai Grafik Pie Chart di Dashboard?
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        
                        <div id="has_chart" class="mt-3">
                            
                            {{-- Yes --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="has_chart" id="has_chart_1" value="1" class="w-4 h-4 flex-shrink-0" required {{ ($part->id == 1 || $part->id == 2) ? '' : 'disabled' }}>
                                <label for="has_chart_1" class="ms-2 text-sm font-medium">Yes</label>
                            </div>

                            {{-- No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="has_chart" id="has_chart_0" value="0" class="w-4 h-4 flex-shrink-0" required {{ ($part->id == 1 || $part->id == 2) ? '' : 'checked' }}>
                                <label for="has_chart_0" class="ms-2 text-sm font-medium">No</label>
                            </div>

                        </div>
                        
                    </div>

                    <div id="title-chart-div" class="w-full mb-7">
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


        document.addEventListener('DOMContentLoaded', function () {
                        
        });
         
    </script>    

@endsection