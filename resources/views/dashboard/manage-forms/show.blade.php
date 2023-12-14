<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-dark">
    
    <header class="w-full flex items-center">
        <div class="container py-6">
            <a href="/dashboard/manage-form" class="font-bold text-lg underline py-3 text-light hover:text-primary">
                Kembali ke Manage Form
            </a>
        </div>
    </header>

    <main class="pt-9 pb-12">
        <div class="container">
            
            <div class="px-4 mx-auto md:max-w-2xl">

                {{-- Bagian Identitas Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Identitas</p>
                    
                    @if ($questions_i->count() > 0)

                        @php
                            $no_question = 1;
                        @endphp

                        @foreach ($questions_i as $question)
                           
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

                                    <input type="text" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="number" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="date" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="text" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }}     
                                        value="{{ old('i_'.$no_question) }}" 
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
                                                    {{ (old('i_'.$no_question) == $option->value) ? 'checked' : '' }}
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
                                                {{ (old('i_'.$no_question) == 'Yes') ? 'checked' : '' }}
                                            >
                                            <label for="i_{{ $no_question }}_1" class="ms-2 text-sm font-medium">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="flex items-center mb-4">
                                            <input type="radio" name="i_{{ $no_question }}" id="i_{{ $no_question }}_2" value="No" class="w-4 h-4 flex-shrink-0"
                                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                                {{ (old('i_'.$no_question) == 'No') ? 'checked' : '' }}
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

                    @else
                        <p class="text-center text-slate-400">There are no questions for this part </p>
                    @endif
            
                </div>
                {{-- Bagian Identitas End --}}

                {{-- Bagian Layanan Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Layanan</p>
                    
                    @if ($questions_s->count() > 0)

                        @php
                            $no_question = 1;
                        @endphp

                        @foreach ($questions_s as $question)
                           
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

                                    <input type="text" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="number" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="date" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="text" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }}     
                                        value="{{ old('i_'.$no_question) }}" 
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
                                                    {{ (old('i_'.$no_question) == $option->value) ? 'checked' : '' }}
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
                                                {{ (old('i_'.$no_question) == 'Yes') ? 'checked' : '' }}
                                            >
                                            <label for="s_{{ $no_question }}_1" class="ms-2 text-sm font-medium">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="flex items-center mb-4">
                                            <input type="radio" name="s_{{ $no_question }}" id="s_{{ $no_question }}_2" value="No" class="w-4 h-4 flex-shrink-0"
                                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                                {{ (old('i_'.$no_question) == 'No') ? 'checked' : '' }}
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

                    @else
                        <p class="text-center text-slate-400">There are no questions for this part </p>
                    @endif
            
                </div>
                {{-- Bagian Layanan End --}}
            
                {{-- Bagian Nilai Pelayanan Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Nilai Pelayanan</p>
                    
                    @if ($questions_sv->count() > 0)

                        @php
                            $no_question = 1;
                        @endphp

                        @foreach ($questions_sv as $question)
                           
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
                                                {{ (old('i_'.$no_question) == $option->value) ? 'checked' : '' }}
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

                    @else
                        <p class="text-center text-slate-400">There are no questions for this part </p>
                    @endif
                    
            
                </div>
                {{-- Bagian Nilai Pelayanan End --}}

                {{-- Bagian Rating Pelayanan Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Rating Pelayanan</p>

                    @if ($questions_sr->count() > 0)

                        @php
                            $no_question = 1;
                        @endphp

                        @foreach ($questions_sr as $question)
                           
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
                                                    {{ (old('i_'.$no_question) == $i) ? 'checked' : '' }}
                                                >
                                                <label for="{{ $i }}">
                                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white {{ (old('i_'.$no_question) == $i) ? 'selected-selection' : 'unselected-selection' }}">
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

                    @else
                        <p class="text-center text-slate-400">There are no questions for this part </p>
                    @endif
            
                </div>
                {{-- Bagian Rating Pelayanan End --}}
            
                {{-- Bagian Feedback Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Feedback</p>
            
                    @if ($questions_f->count() > 0)

                        @php
                            $no_question = 1;
                        @endphp

                        @foreach ($questions_f as $question)
                           
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
        
                                <textarea name="f_{{ $no_question }}" id="f_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" {{ ($question->is_required == '1') ? 'required' : '' }}></textarea>
        
                            </div>    

                            @php
                                $no_question++;
                            @endphp
                            
                        @endforeach

                    @else
                        <p class="text-center text-slate-400">There are no questions for this part </p>
                    @endif
            
                </div>
                {{-- Bagian Feedback End --}}
            
                {{-- Bagian Lain-lain Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Lain-lain</p>
            
                    @if ($questions_o->count() > 0)

                        @php
                            $no_question = 1;
                        @endphp

                        @foreach ($questions_o as $question)
                           
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

                                    <input type="text" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="number" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="date" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }} 
                                        value="{{ old('i_'.$no_question) }}"
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

                                    <input type="text" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"
                                        {{ ($question->is_required == '1') ? 'required' : '' }}     
                                        value="{{ old('i_'.$no_question) }}" 
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
                                                    {{ (old('i_'.$no_question) == $option->value) ? 'checked' : '' }}
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
                                                {{ (old('i_'.$no_question) == 'Yes') ? 'checked' : '' }}
                                            >
                                            <label for="o_{{ $no_question }}_1" class="ms-2 text-sm font-medium">
                                                Yes
                                            </label>
                                        </div>

                                        <div class="flex items-center mb-4">
                                            <input type="radio" name="o_{{ $no_question }}" id="o_{{ $no_question }}_2" value="No" class="w-4 h-4 flex-shrink-0"
                                                {{ ($question->is_required == '1') ? 'required' : '' }} 
                                                {{ (old('i_'.$no_question) == 'No') ? 'checked' : '' }}
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
            
                                    <textarea name="o_{{ $no_question }}" id="o_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" {{ ($question->is_required == '1') ? 'required' : '' }}></textarea>
            
                                </div>

                            @endif

                            @php
                                $no_question++;
                            @endphp

                        @endforeach

                    @else
                        <p class="text-center text-slate-400">There are no questions for this part </p>
                    @endif
            
                </div>
                {{-- Bagian Lain-lain End --}}


            </div>

        </div>
    </main>

    {{-- JS Start --}}
    <script>

        var serviceRate = document.querySelectorAll('.service-rate');

        if (serviceRate.length > 0) {
            serviceRate.forEach(function (sr) {
                var selection = sr.querySelectorAll('label');

                selection.forEach(function (element) {
                    element.addEventListener('click', function () {
                        selection.forEach(function (e) {
                            e.querySelector('div').classList.remove('selected-selection');
                            e.querySelector('div').classList.add('unselected-selection');
                        });

                        element.querySelector('div').classList.remove('unselected-selection');
                        element.querySelector('div').classList.add('selected-selection');
                    });
                });
            });
        }

    </script>
    {{-- JS End --}}

</body>
</html>
