@extends('forms.layouts.main')

@section('container')

    <form action="/form/i" method="post">
        @csrf

        {{-- Alert Start --}}
        @if ($errors->any())
            <div id="alert-card">
                <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-red-600 bg-red-600 text-red-600">
                    <div class="ms-4">
                        Terdapat Pertanyaan Wajib yang belum dijawab!
                    </div>
                    <button type="button" class="w-8 h-8 flex justify-center items-center ms-auto" onclick="document.querySelector('#alert-card').classList.toggle('hidden');">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
        @endif
        {{-- Alert End --}}

        <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
            <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Identitas</p>
            
            @php
                $no_question = 1;
            @endphp

            @foreach ($questions_i as $question)
                
                @if ($question->input_type == '1')
                    {{-- 1 -> Input : Text --}}
                    <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                            @if ($question->is_required == '1')
                                <span class="text-red-500">(wajib)</span>
                            @endif
                        </label>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Catatan Pertanyaan Start --}}
                        @if ($question->need_note == 1)
                            {{-- Proses mengubah Teks Catatan jika terdapat link*...*link --}}
                            @php
                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                            @endphp
                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                        @endif
                        {{-- Catatan Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="text" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                            @if (session()->has('form_i'))
                                value="{{ $form_i['i_'.$no_question] }}"
                            @else
                                value="{{ old('i_' . $no_question) }}"
                            @endif
                            {{ ($question->maks_char != 0) ? 'maxlength='.$question->maks_char : '' }} 
                        >
                        {{-- Input Answer End --}}

                        {{-- jika pertanyaan wajib tetapi belum dijawab Start --}}
                        @if ($question->is_required == '1')
                            @error('i_' . $no_question)
                                <p class="text-xs font-semibold text-red-500 mt-1">Pertanyaan belum dijawab!</p>
                            @enderror
                        @endif
                        {{-- jika pertanyaan wajib tetapi belum dijawab End --}}

                    </div>

                @elseif($question->input_type == '2')
                    {{-- 2 -> Input : Numeric --}}
                    <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                            @if ($question->is_required == '1')
                                <span class="text-red-500">(wajib)</span>
                            @endif
                        </label>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Catatan Pertanyaan Start --}}
                        @if ($question->need_note == 1)
                            {{-- Proses mengubah Teks Catatan jika terdapat link*...*link --}}
                            @php
                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                            @endphp
                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                        @endif
                        {{-- Catatan Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="number" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                            @if (session()->has('form_i'))
                                value="{{ $form_i['i_'.$no_question] }}"
                            @else
                                value="{{ old('i_' . $no_question) }}"
                            @endif
                        >
                        {{-- Input Answer End --}}

                        {{-- jika pertanyaan wajib tetapi belum dijawab Start --}}
                        @if ($question->is_required == '1')
                            @error('i_' . $no_question)
                                <p class="text-xs font-semibold text-red-500 mt-1">Pertanyaan belum dijawab!</p>
                            @enderror
                        @endif
                        {{-- jika pertanyaan wajib tetapi belum dijawab End --}}

                    </div>

                @elseif($question->input_type == '3')
                    {{-- 3 -> Input : Date --}}
                    <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                            @if ($question->is_required == '1')
                                <span class="text-red-500">(wajib)</span>
                            @endif
                        </label>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Catatan Pertanyaan Start --}}
                        @if ($question->need_note == 1)
                            {{-- Proses mengubah Teks Catatan jika terdapat link*...*link --}}
                            @php
                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                            @endphp
                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                        @endif
                        {{-- Catatan Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="date" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                            @if (session()->has('form_i'))
                                value="{{ $form_i['i_'.$no_question] }}"
                            @else
                                value="{{ old('i_' . $no_question) }}"
                            @endif
                        >
                        {{-- Input Answer End --}}

                        {{-- jika pertanyaan wajib tetapi belum dijawab Start --}}
                        @if ($question->is_required == '1')
                            @error('i_' . $no_question)
                                <p class="text-xs font-semibold text-red-500 mt-1">Pertanyaan belum dijawab!</p>
                            @enderror
                        @endif
                        {{-- jika pertanyaan wajib tetapi belum dijawab End --}}

                    </div>
                
                @elseif($question->input_type == '4')
                    {{-- 4 -> Input : (Contoh No. Telp) --}}
                    <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                            @if ($question->is_required == '1')
                                <span class="text-red-500">(wajib)</span>
                            @endif
                        </label>
                        {{-- Teks Peranyaan End --}}

                        {{-- Catatan Pertanyaan Start --}}
                        @if ($question->need_note == 1)
                            {{-- Proses mengubah Teks Catatan jika terdapat link*...*link --}}
                            @php
                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                            @endphp
                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                        @endif
                        {{-- Catatan Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="text" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                            @if (session()->has('form_i'))
                                value="{{ $form_i['i_'.$no_question] }}"
                            @else
                                value="{{ old('i_' . $no_question) }}"
                            @endif
                            maxlength="13"
                        >
                        {{-- Input Answer End --}}

                        {{-- jika pertanyaan wajib tetapi belum dijawab Start --}}
                        @if ($question->is_required == '1')
                            @error('i_' . $no_question)
                                <p class="text-xs font-semibold text-red-500 mt-1">Pertanyaan belum dijawab!</p>
                            @enderror
                        @endif
                        {{-- jika pertanyaan wajib tetapi belum dijawab End --}}

                    </div>

                @elseif($question->input_type == '5')
                    {{-- 5 -> Select : (Pilih salah satu) --}}
                    <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <p class="text-sm font-medium mb-2">
                            {{ $question->text }}
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Catatan Pertanyaan Start --}}
                        @if ($question->need_note == 1)
                            {{-- Proses mengubah Teks Catatan jika terdapat link*...*link --}}
                            @php
                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                            @endphp
                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                        @endif
                        {{-- Catatan Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <div id="i_{{ $no_question }}" class="mt-3">
                            @php
                                $no_option = 1;
                            @endphp
                            @foreach ($question->options as $option)    
                                <div class="flex items-center mb-4">
                                    
                                    <input type="radio" name="i_{{ $no_question }}" id="i_{{ $no_question }}_{{ $no_option }}" value="{{ $option->value }}" class="w-4 h-4 flex-shrink-0"
                                        @if (session()->has('form_i'))
                                            {{ ($form_i['i_'.$no_question]  == $option->value) ? 'checked' : '' }}
                                        @else
                                            {{ (old('i_' . $no_question) == $option->value) ? 'checked' : '' }}
                                        @endif           
                                    >

                                    {{-- Proses mengubah Teks Option jika terdapat link*...*link --}}
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                    @endphp

                                    <label for="i_{{ $no_question }}_{{ $no_option }}" class="ms-2 text-sm font-medium">
                                        {!! $modifiedText !!}
                                    </label>
                                    
                                </div>
                                @php
                                    $no_option++
                                @endphp
                            @endforeach

                        </div>
                        {{-- Input Answer End --}}

                        {{-- jika pertanyaan wajib tetapi belum dijawab Start --}}
                        @if ($question->is_required == '1')
                            @error('i_' . $no_question)
                                <p class="text-xs font-semibold text-red-500 mt-1">Pertanyaan belum dijawab!</p>
                            @enderror
                        @endif
                        {{-- jika pertanyaan wajib tetapi belum dijawab End --}}

                    </div>

                @elseif($question->input_type == '7')
                    {{-- 7 -> Select : Yes or No --}}
                    <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <p class="text-sm font-medium mb-2">
                            {{ $question->text }}
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Catatan Pertanyaan Start --}}
                        @if ($question->need_note == 1)
                            {{-- Proses mengubah Teks Catatan jika terdapat link*...*link --}}
                            @php
                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                            @endphp
                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                        @endif
                        {{-- Catatan Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <div id="i_{{ $no_question }}" class="mt-3">
                            <div class="flex items-center mb-4">
                                <input type="radio" name="i_{{ $no_question }}" id="i_{{ $no_question }}_1" value="Yes" class="w-4 h-4 flex-shrink-0"
                                    @if (session()->has('form_i'))
                                        {{ ($form_i['i_'.$no_question]  == 'Yes') ? 'checked' : '' }}
                                    @else
                                        {{ (old('i_' . $no_question) == 'Yes') ? 'checked' : '' }}
                                    @endif  
                                >
                                <label for="i_{{ $no_question }}_1" class="ms-2 text-sm font-medium">
                                    Yes
                                </label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input type="radio" name="i_{{ $no_question }}" id="i_{{ $no_question }}_2" value="No" class="w-4 h-4 flex-shrink-0"
                                    @if (session()->has('form_i'))
                                        {{ ($form_i['i_'.$no_question]  == 'No') ? 'checked' : '' }}
                                    @else
                                        {{ (old('i_' . $no_question) == 'No') ? 'checked' : '' }}
                                    @endif  
                                >
                                <label for="i_{{ $no_question }}_2" class="ms-2 text-sm font-medium">
                                    No
                                </label>
                            </div>

                        </div>
                        {{-- Input Answer End --}}

                        {{-- jika pertanyaan wajib tetapi belum dijawab Start --}}
                        @if ($question->is_required == '1')
                            @error('i_' . $no_question)
                                <p class="text-xs font-semibold text-red-500 mt-1">Pertanyaan belum dijawab!</p>
                            @enderror
                        @endif
                        {{-- jika pertanyaan wajib tetapi belum dijawab End --}}

                    </div>
                    
                @endif

                @php
                    $no_question++;
                @endphp

            @endforeach
    
        </div>
       
        {{-- Tombol Start --}}
        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
           
            <button type="submit" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-blue-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Lanjut
            </button>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Kembali
            </a>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-red-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Ulang
            </a>

        </div>
        {{-- Tombol End --}}

    </form>

@endsection