@extends('forms.layouts.main')

@section('container')

    <form action="/form/confirm" method="post">
        @csrf

        <p class="font-bold text-xl text-center text-white mb-5 mt-4">Apakah anda yakin dengan data yang dimasukkan sudah benar dan sesuai?
            <br>Jika tidak, silahkan cek kembali data tersebut di bawah ini :)</p>

        {{-- Tombol Start --}}
        <div class="flex flex-wrap items-center justify-around md:flex-row-reverse mb-12">
           
            <button type="submit" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-primary text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Yakin, kirim
            </button>

            <a href="/form/i" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-slate-400 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Tidak, kembali
            </a>

        </div>
        {{-- Tombol End --}}
        
        {{-- Bagian Identitas Start --}}
        @if ($questions->where('part_id', 1)->count() > 0)
            <div class="bg-white rounded-md shadow-md mb-9 p-7">
                
                <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Identitas</p>
                
                @php
                    $no_question = 1;
                @endphp

                @foreach ($questions->where('part_id', 1) as $question)
                    
                    @if ($question->input_type == '1')
                        {{-- 1 -> Input : Text --}}
                        <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </label>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <input type="text" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                @if (session()->has('form_i'))
                                    value="{{ $form_i['i_'.$no_question] }}"
                                @endif
                                {{ ($question->maks_char != 0) ? 'maxlength='.$question->maks_char : '' }} 
                            >

                        </div>

                    @elseif($question->input_type == '2')
                        {{-- 2 -> Input : Numeric --}}
                        <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </label>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <input type="number" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                @if (session()->has('form_i'))
                                    value="{{ $form_i['i_'.$no_question] }}"
                                @endif
                            >
                        </div>

                    @elseif($question->input_type == '3')
                        {{-- 3 -> Input : Date --}}
                        <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </label>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <input type="date" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                @if (session()->has('form_i'))
                                    value="{{ $form_i['i_'.$no_question] }}"
                                @endif
                            >
                        </div>
                    
                    @elseif($question->input_type == '4')
                        {{-- 4 -> Input : (Contoh No. Telp) --}}
                        <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </label>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <input type="text" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                {{ ($question->is_required == '1') ? 'required' : '' }}     
                                @if (session()->has('form_i'))
                                    value="{{ $form_i['i_'.$no_question] }}"
                                @endif
                                maxlength="13"
                            >
                        </div>

                    @elseif($question->input_type == '5')
                        {{-- 5 -> Select : (Pilih salah satu) --}}
                        <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                            <p class="text-sm font-medium mb-2">
                                {{ $question->text }}
                                <span class="text-red-500">(wajib)</span>
                            </p>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <div id="i_{{ $no_question }}" class="mt-3">
                                @php
                                    $no_option = 1;
                                @endphp
                                @foreach ($question->options as $option)    
                                    <div class="flex items-center mb-4">
                                        <input type="radio" name="i_{{ $no_question }}" id="i_{{ $no_question }}_{{ $no_option }}" value="{{ $option->value }}" class="w-4 h-4 flex-shrink-0"
                                            {{ ($question->is_required == '1') ? 'required' : '' }} 
                                            @if (session()->has('form_i'))
                                                {{ ($form_i['i_'.$no_question]  == $option->value) ? 'checked' : 'disabled' }}
                                            @endif           
                                        >
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

                        </div>

                    @elseif($question->input_type == '7')
                        {{-- 7 -> Select : Yes or No --}}
                        <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                            <p class="text-sm font-medium mb-2">
                                {{ $question->text }}
                                <span class="text-red-500">(wajib)</span>
                            </p>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <div id="i_{{ $no_question }}" class="mt-3">
                                <div class="flex items-center mb-4">
                                    <input type="radio" name="i_{{ $no_question }}" id="i_{{ $no_question }}_1" value="Yes" class="w-4 h-4 flex-shrink-0"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        @if (session()->has('form_i'))
                                            {{ ($form_i['i_'.$no_question]  == 'Yes') ? 'checked' : 'disabled' }}
                                        @endif  
                                    >
                                    <label for="i_{{ $no_question }}_1" class="ms-2 text-sm font-medium">
                                        Yes
                                    </label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input type="radio" name="i_{{ $no_question }}" id="i_{{ $no_question }}_2" value="No" class="w-4 h-4 flex-shrink-0"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        @if (session()->has('form_i'))
                                            {{ ($form_i['i_'.$no_question]  == 'No') ? 'checked' : 'disabled' }}
                                        @endif  
                                    >
                                    <label for="i_{{ $no_question }}_2" class="ms-2 text-sm font-medium">
                                        No
                                    </label>
                                </div>

                            </div>

                        </div>
                    @endif

                    @php
                        $no_question++;
                    @endphp

                @endforeach
        
            </div>   
        @endif
        {{-- Bagian Identitas End --}}

        {{-- Bagian Service Start --}}
        @if ($questions->where('part_id', 2)->count() > 0)
            <div class="bg-white rounded-md shadow-md mb-9 p-7">
                
                <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Layanan</p>
                
                @php
                    $no_question = 1;
                @endphp

                @foreach ($questions->where('part_id', 2) as $question)
                    
                    @if ($question->input_type == '1')
                        {{-- 1 -> Input : Text --}}
                        <div id="s_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            <label for="s_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </label>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <input type="text" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                @if (session()->has('form_s'))
                                    value="{{ $form_s['s_'.$no_question] }}"
                                @endif
                                {{ ($question->maks_char != 0) ? 'maxlength='.$question->maks_char : '' }} 
                            >

                        </div>

                    @elseif($question->input_type == '2')
                        {{-- 2 -> Input : Numeric --}}
                        <div id="s_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            <label for="s_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </label>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <input type="number" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                @if (session()->has('form_s'))
                                    value="{{ $form_s['s_'.$no_question] }}"
                                @endif
                            >
                        </div>

                    @elseif($question->input_type == '3')
                        {{-- 3 -> Input : Date --}}
                        <div id="s_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            <label for="s_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </label>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <input type="date" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                @if (session()->has('form_s'))
                                    value="{{ $form_s['s_'.$no_question] }}"
                                @endif
                            >
                        </div>
                    
                    @elseif($question->input_type == '4')
                        {{-- 4 -> Input : (Contoh No. Telp) --}}
                        <div id="s_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            <label for="s_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </label>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <input type="text" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                {{ ($question->is_required == '1') ? 'required' : '' }}     
                                @if (session()->has('form_s'))
                                    value="{{ $form_s['s_'.$no_question] }}"
                                @endif
                                maxlength="13"
                            >
                        </div>

                    @elseif($question->input_type == '5')
                        {{-- 5 -> Select : (Pilih salah satu) --}}
                        <div id="s_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                            <p class="text-sm font-medium mb-2">
                                {{ $question->text }}
                                <span class="text-red-500">(wajib)</span>
                            </p>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <div id="s_{{ $no_question }}" class="mt-3">
                                @php
                                    $no_option = 1;
                                @endphp
                                @foreach ($question->options as $option)    
                                    <div class="flex items-center mb-4">
                                        <input type="radio" name="s_{{ $no_question }}" id="s_{{ $no_question }}_{{ $no_option }}" value="{{ $option->value }}" class="w-4 h-4 flex-shrink-0"
                                            {{ ($question->is_required == '1') ? 'required' : '' }} 
                                            @if (session()->has('form_s'))
                                                {{ ($form_s['s_'.$no_question]  == $option->value) ? 'checked' : 'disabled' }}
                                            @endif           
                                        >
                                        @php
                                            $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                        @endphp
                                        <label for="s_{{ $no_question }}_{{ $no_option }}" class="ms-2 text-sm font-medium">
                                            {!! $modifiedText !!}
                                        </label>
                                    </div>
                                    @php
                                        $no_option++
                                    @endphp
                                @endforeach

                            </div>

                        </div>

                    @elseif($question->input_type == '7')
                        {{-- 7 -> Select : Yes or No --}}
                        <div id="s_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                            <p class="text-sm font-medium mb-2">
                                {{ $question->text }}
                                <span class="text-red-500">(wajib)</span>
                            </p>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <div id="s_{{ $no_question }}" class="mt-3">
                                <div class="flex items-center mb-4">
                                    <input type="radio" name="s_{{ $no_question }}" id="s_{{ $no_question }}_1" value="Yes" class="w-4 h-4 flex-shrink-0"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        @if (session()->has('form_s'))
                                            {{ ($form_s['s_'.$no_question]  == 'Yes') ? 'checked' : 'disabled' }}
                                        @endif  
                                    >
                                    <label for="s_{{ $no_question }}_1" class="ms-2 text-sm font-medium">
                                        Yes
                                    </label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input type="radio" name="s_{{ $no_question }}" id="s_{{ $no_question }}_2" value="No" class="w-4 h-4 flex-shrink-0"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        @if (session()->has('form_s'))
                                            {{ ($form_s['s_'.$no_question]  == 'No') ? 'checked' : 'disabled' }}
                                        @endif  
                                    >
                                    <label for="s_{{ $no_question }}_2" class="ms-2 text-sm font-medium">
                                        No
                                    </label>
                                </div>

                            </div>

                        </div>
                    @endif

                    @php
                        $no_question++;
                    @endphp

                @endforeach
        
            </div>    
        @endif
        {{-- Bagian Service End --}}

        {{-- Bagian Service Value Start --}}
        @if ($questions->where('part_id', 3)->count() > 0)
            <div class="bg-white rounded-md shadow-md mb-9 p-7">
                
                <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Nilai Pelayanan</p>
                
                    @php
                        $no_question = 1;
                    @endphp

                    @foreach ($questions->where('part_id', 3) as $question)
                    
                        {{-- 6 -> Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...) --}}
                        <div id="sv_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                            <p class="text-sm font-medium mb-2">
                                {{ $question->text }}
                                <span class="text-red-500">(wajib)</span>
                            </p>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <div id="sv_{{ $no_question }}" class="mt-3">
                                @php
                                    $no_option = 1;
                                @endphp
                                @foreach ($question->options as $option)    
                                    <div class="flex items-center mb-4">
                                        <input type="radio" name="sv_{{ $no_question }}" id="sv_{{ $no_question }}_{{ $no_option }}" value="{{ $option->value }}" class="w-4 h-4 flex-shrink-0"
                                            {{ ($question->is_required == '1') ? 'required' : '' }} 
                                            @if (session()->has('form_sv'))
                                                {{ ($form_sv['sv_'.$no_question]  == $option->value) ? 'checked' : 'disabled' }}
                                            @endif   
                                        >
                                        @php
                                            $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                        @endphp
                                        <label for="sv_{{ $no_question }}_{{ $no_option }}" class="ms-2 text-sm font-medium">
                                            {!! $modifiedText !!}
                                        </label>
                                    </div>
                                    @php
                                        $no_option++
                                    @endphp
                                @endforeach

                            </div>

                        </div>    

                        @php
                            $no_question++;
                        @endphp
                        
                    @endforeach
        
            </div>     
        @endif
        {{-- Bagian Service Value End --}}

        {{-- Bagian Service Rate Start --}}
        @if ($questions->where('part_id', 4)->count() > 0)
            <div class="bg-white rounded-md shadow-md mb-9 p-7">
                
                <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Rating Pelayanan</p>

                @php
                        $no_question = 1;
                    @endphp

                    @foreach ($questions->where('part_id', 4) as $question)
                    
                        {{-- 8 -> Rating (Pilih 1 s/d 10) --}}
                        <div id="sr_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                            <p class="text-sm font-medium mb-2">
                                {{ $question->text }}
                                <span class="text-red-500">(wajib)</span>
                            </p>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <div id="sr_{{ $no_question }}" class="mt-3">

                                <div class="service-rate max-w-lg mx-auto text-sm p-2.5 flex flex-wrap items-center justify-around">
        
                                    @php
                                        $option_number = 10;
                                    @endphp

                                    @for ($i = 1; $i <= $option_number; $i++)
                                        
                                        <div>
                                            <input type="radio" name="sr_{{ $no_question }}" id="{{ $i }}" class="hidden" value="{{ $i }}"
                                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                                @if (session()->has('form_sr'))
                                                    {{ ($form_sr['sr_'.$no_question]  == $i) ? 'checked' : 'disabled' }}
                                                @endif  
                                            >
                                            <label for="{{ $i }}">
                                                <div class="cursor-pointer w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white 
                                                    @if (session()->has('form_sr'))
                                                        {{ ($form_sr['sr_'.$no_question]  == $i) ? 'selected-selection' : 'unselected-selection' }}
                                                    @else
                                                        unselected-selection
                                                    @endif"
                                                >
                                                    {{ $i }}
                                                </div>
                                            </label>
                                        </div> 

                                    @endfor
                    
                                </div>

                            </div>

                        </div>    

                        @php
                            $no_question++;
                        @endphp
                        
                    @endforeach
        
            </div>    
        @endif
        {{-- Bagian Service Rate End --}}

        {{-- Bagian Feedback Start --}}
        @if ($questions->where('part_id', 5)->count() > 0)
            <div class="bg-white rounded-md shadow-md mb-9 p-7">
                
                <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Feedback</p>
        
                    @php
                        $no_question = 1;
                    @endphp

                    @foreach ($questions->where('part_id', 5) as $question)
                    
                        {{-- 9 -> Textarea --}}
                        <div id="f_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                            <p class="text-sm font-medium mb-2">
                                {{ $question->text }}
                                @if ($question->is_required == '1')
                                    <span class="text-red-500">(wajib)</span>
                                @endif
                            </p>

                            @if ($question->need_note == 1)
                                @php
                                    $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                @endphp
                                <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                            @endif

                            <textarea name="f_{{ $no_question }}" id="f_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly {{ ($question->is_required == '1') ? 'required' : '' }} >@if (session()->has('form_f')){{ $form_f['f_'.$no_question] }}@endif</textarea>

                        </div>    

                        @php
                            $no_question++;
                        @endphp
                        
                    @endforeach
        
            </div>    
        @endif
        {{-- Bagian Feedback End --}}

        {{-- Bagian Others Start --}}
        @if ($questions->where('part_id', 6)->count() > 0)
            <div class="bg-white rounded-md shadow-md mb-9 p-7">
                
                <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Lain-lain</p>
        
                    @php
                        $no_question = 1;
                    @endphp

                    @foreach ($questions->where('part_id', 6) as $question)
                    
                        @if ($question->input_type == '1')
                            {{-- 1 -> Input : Text --}}
                            <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                                <label for="o_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                    {{ $question->text }}
                                    @if ($question->is_required == '1')
                                        <span class="text-red-500">(wajib)</span>
                                    @endif
                                </label>

                                @if ($question->need_note == 1)
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                    @endphp
                                    <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                                @endif

                                <input type="text" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                    {{ ($question->is_required == '1') ? 'required' : '' }} 
                                    @if (session()->has('form_o'))
                                        value="{{ $form_o['o_'.$no_question] }}"
                                    @endif
                                    {{ ($question->maks_char != 0) ? 'maxlength='.$question->maks_char : '' }} 
                                >

                            </div>

                        @elseif($question->input_type == '2')
                            {{-- 2 -> Input : Numeric --}}
                            <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                                <label for="o_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                    {{ $question->text }}
                                    @if ($question->is_required == '1')
                                        <span class="text-red-500">(wajib)</span>
                                    @endif
                                </label>

                                @if ($question->need_note == 1)
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                    @endphp
                                    <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                                @endif

                                <input type="number" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                    {{ ($question->is_required == '1') ? 'required' : '' }} 
                                    @if (session()->has('form_o'))
                                        value="{{ $form_o['o_'.$no_question] }}"
                                    @endif
                                >
                            </div>

                        @elseif($question->input_type == '3')
                            {{-- 3 -> Input : Date --}}
                            <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                                <label for="o_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                    {{ $question->text }}
                                    @if ($question->is_required == '1')
                                        <span class="text-red-500">(wajib)</span>
                                    @endif
                                </label>

                                @if ($question->need_note == 1)
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                    @endphp
                                    <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                                @endif

                                <input type="date" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                    {{ ($question->is_required == '1') ? 'required' : '' }} 
                                    @if (session()->has('form_o'))
                                        value="{{ $form_o['o_'.$no_question] }}"
                                    @endif
                                >
                            </div>
                        
                        @elseif($question->input_type == '4')
                            {{-- 4 -> Input : (Contoh No. Telp) --}}
                            <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                                <label for="o_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                    {{ $question->text }}
                                    @if ($question->is_required == '1')
                                        <span class="text-red-500">(wajib)</span>
                                    @endif
                                </label>

                                @if ($question->need_note == 1)
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                    @endphp
                                    <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                                @endif

                                <input type="text" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                    {{ ($question->is_required == '1') ? 'required' : '' }}     
                                    @if (session()->has('form_o'))
                                        value="{{ $form_o['o_'.$no_question] }}"
                                    @endif
                                    maxlength="13"
                                >
                            </div>

                        @elseif($question->input_type == '5')
                            {{-- 5 -> Select : (Pilih salah satu) --}}
                            <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                                <p class="text-sm font-medium mb-2">
                                    {{ $question->text }}
                                    <span class="text-red-500">(wajib)</span>
                                </p>

                                @if ($question->need_note == 1)
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                    @endphp
                                    <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                                @endif
        
                                <div id="o_{{ $no_question }}" class="mt-3">
                                    @php
                                        $no_option = 1;
                                    @endphp
                                    @foreach ($question->options as $option)    
                                        <div class="flex items-center mb-4">
                                            <input type="radio" name="o_{{ $no_question }}" id="o_{{ $no_question }}_{{ $no_option }}" value="{{ $option->value }}" class="w-4 h-4 flex-shrink-0"
                                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                                @if (session()->has('form_o'))
                                                    {{ ($form_o['o_'.$no_question]  == $option->value) ? 'checked' : 'disabled' }}
                                                @endif  
                                            >
                                            @php
                                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                            @endphp
                                            <label for="o_{{ $no_question }}_{{ $no_option }}" class="ms-2 text-sm font-medium">
                                                {!! $modifiedText !!}
                                            </label>
                                        </div>
                                        @php
                                            $no_option++
                                        @endphp
                                    @endforeach
        
                                </div>
        
                            </div>

                        @elseif($question->input_type == '7')
                            {{-- 7 -> Select : Yes or No --}}
                            <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                                <p class="text-sm font-medium mb-2">
                                    {{ $question->text }}
                                    <span class="text-red-500">(wajib)</span>
                                </p>

                                @if ($question->need_note == 1)
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                    @endphp
                                    <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                                @endif
        
                                <div id="o_{{ $no_question }}" class="mt-3">
                                    <div class="flex items-center mb-4">
                                        <input type="radio" name="o_{{ $no_question }}" id="o_{{ $no_question }}_1" value="Yes" class="w-4 h-4 flex-shrink-0"
                                            {{ ($question->is_required == '1') ? 'required' : '' }} 
                                            @if (session()->has('form_o'))
                                                {{ ($form_o['o_'.$no_question]  == 'Yes') ? 'checked' : 'disabled' }}
                                            @endif 
                                        >
                                        <label for="o_{{ $no_question }}_1" class="ms-2 text-sm font-medium">
                                            Yes
                                        </label>
                                    </div>

                                    <div class="flex items-center mb-4">
                                        <input type="radio" name="o_{{ $no_question }}" id="o_{{ $no_question }}_2" value="No" class="w-4 h-4 flex-shrink-0"
                                            {{ ($question->is_required == '1') ? 'required' : '' }} 
                                            @if (session()->has('form_o'))
                                                {{ ($form_o['o_'.$no_question]  == 'No') ? 'checked' : 'disabled' }}
                                            @endif 
                                        >
                                        <label for="o_{{ $no_question }}_2" class="ms-2 text-sm font-medium">
                                            No
                                        </label>
                                    </div>
        
                                </div>
        
                            </div>

                        @elseif($question->input_type == '9')
                            {{-- 9 -> Textarea --}}
                            <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                                <p class="text-sm font-medium mb-2">
                                    {{ $question->text }}
                                    @if ($question->is_required == '1')
                                        <span class="text-red-500">(wajib)</span>
                                    @endif
                                </p>

                                @if ($question->need_note == 1)
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                                    @endphp
                                    <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                                @endif
        
                                <textarea name="o_{{ $no_question }}" id="o_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly {{ ($question->is_required == '1') ? 'required' : '' }} >@if (session()->has('form_o')){{ $form_o['o_'.$no_question] }}@endif</textarea>
        
                            </div>

                        @endif

                        @php
                            $no_question++;
                        @endphp

                    @endforeach
        
            </div>    
        @endif
        {{-- Bagian Others End --}}

    </form>

@endsection