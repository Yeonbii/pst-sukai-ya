@extends('dashboard.layouts.main')

@section('container')

    <div class="flex h-[44px] items-end">
        <h3 class="font-semibold text-xl">Manage Form - Edit Options</h3>
    </div>
   
    <div class="py-12">
        
        <div class="bg-white rounded-md shadow-md mb-9 p-7">
        
            <div class="w-full mb-7">
                <label for="text" class="text-sm font-medium mb-2 block">
                    Isi Pertanyaan
                </label>
                <input type="text" name="text" id="text" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="{{ $question->text }}">
            </div>
            
            <div class="w-full mb-7">
                <label for="input_type" class="text-sm font-medium mb-2 block">
                    Tipe Input
                </label>
                <input type="text" name="input_type" id="input_type" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="{{ $input_type }}">
            </div>

            @if ($question->input_type == '5')
                <div class="w-full mb-7">
                    <label for="option_number" class="text-sm font-medium mb-2 block">
                        Jumlah Pilihan
                    </label>
                    <input type="text" name="option_number" id="option_number" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="{{ $question->option_number }}">
                </div>
            @endif

            <div class="flex">
                <a href="/dashboard/manage-form/{{ $question->id }}/edit" class="font-semibold text-sm bg-primary border-2 border-primary text-white rounded-md py-2.5 px-8 mb-3 ms-auto w-full hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center md:max-w-xs">Ganti</a>
            </div>
        
        </div>

        <form action="/dashboard/manage-form/{{ $question->id }}/edit-options" method="post">
            @csrf

            <div id="option-container" class="bg-white rounded-md shadow-md mb-9 p-7">
                
                <p class="text-sm text-slate-500 mb-5 italic opacity-50">Jika terdapat sebuah link, maka tolong apitkan dengan link*...*link,<br>contoh <span class="font-semibold text-blue-500">link*google.com*link</span></p>

                @php
                    if ($question->input_type == '5') {
                        $number = $question->option_number;
                    }
                    else if ($question->input_type == '6') {
                        $number = 4;
                    }
                @endphp

                @for ($i = 1; $i <= $number; $i++)
                    <div class="flex items-center mb-7">
                        <label for="option_{{ $i }}" class="text-sm font-medium block p-2.5 bg-dark text-white rounded-l-md border-2 border-dark">
                            {{ $i }}
                        </label>
                        <input type="number" name="no_{{ $i }}" class="hidden" value="{{ $i }}">
                        <input type="text" name="option_{{ $i }}" id="option_{{ $i }}" class="text-sm border-2 border-slate-300 rounded-r-md w-full p-2.5 focus:border-secondary focus:outline-none" value="{{ $question->options[$i-1]->text }}">
                    </div>
                @endfor 
    
            </div>

            <div class="flex">
                <button type="submit" value="save" class="font-semibold text-sm bg-primary text-white rounded-md mt-2 me-3 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center" onclick="return confirm('Are you sure?')">Simpan</button>
                <a href="/dashboard/manage-form" class="font-semibold text-sm bg-slate-400 text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Batal</a>
            </div>

        </form>
        
    </div>


@endsection