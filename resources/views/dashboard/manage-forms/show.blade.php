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
            
                    <p class="text-base font-semibold mb-7 border-b-2 pb-3">Bagian Identitas</p>
                    
                    @php
                        $no_question = 1;
                    @endphp
                    @foreach ($questions as $question)
                        @if ($question->part_id == 1)
                            
                            @if ($question->input_type == '1')
                                {{-- 1 -> Input : Text --}}
                                <div id="i_{{ $no_question }}_div" class="w-full mb-7">

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
                                <div id="i_{{ $no_question }}_div" class="w-full mb-7">

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
                                <div id="i_{{ $no_question }}_div" class="w-full mb-7">

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
                                <div id="i_{{ $no_question }}_div" class="w-full mb-7">

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
                                <div id="i_{{ $no_question }}_div" class="w-full mb-7">
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
                                <div id="i_{{ $no_question }}_div" class="w-full mb-7">
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
                            

                        @endif
                        @php
                            $no_question++;
                        @endphp
                    @endforeach
            
                </div>
                {{-- Bagian Identitas End --}}

                {{-- Bagian Layanan Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold mb-7 border-b-2 pb-3">Bagian Layanan</p>
                    
                    @php
                        $no_question = 1;
                    @endphp
                    @foreach ($questions as $question)
                        @if ($question->part_id == 2)
                            
                            @if ($question->input_type == '1')
                                {{-- 1 -> Input : Text --}}
                                <div id="s_{{ $no_question }}_div" class="w-full mb-7">

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
                                <div id="s_{{ $no_question }}_div" class="w-full mb-7">

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
                                <div id="s_{{ $no_question }}_div" class="w-full mb-7">

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
                                <div id="s_{{ $no_question }}_div" class="w-full mb-7">

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
                                <div id="s_{{ $no_question }}_div" class="w-full mb-7">
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
                                <div id="i_{{ $no_question }}_div" class="w-full mb-7">
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
                            

                        @endif
                        @php
                            $no_question++;
                        @endphp
                    @endforeach
            
                </div>
                {{-- Bagian Layanan End --}}
            
                {{-- Bagian Rating Pelayanan Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold mb-7 border-b-2 pb-3">Bagian Rating Pelayanan</p>
                    
                    {{-- Radio --}}
                    <div class="w-full mb-7">
                        <p class="text-sm font-medium mb-2 block">
                            Berikan penilaian pelayanan secara umum yang dilakukan petugas/aplikasi (1= sangat buruk, 10=sangat baik) 
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        <div class="service-rate max-w-lg mx-auto text-sm p-2.5 flex flex-wrap items-center justify-around">
            
                            <div>
                                <input type="radio" name="sr_1" id="1" class="hidden" value="1">
                                <label for="1">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        1
                                    </div>
                                </label>
                            </div>   
            
                            <div>
                                <input type="radio" name="sr_1" id="2" class="hidden" value="2">
                                <label for="2">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        2
                                    </div>
                                </label>
                            </div>
            
                            <div>
                                <input type="radio" name="sr_1" id="3" class="hidden" value="3">
                                <label for="3">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        3
                                    </div>
                                </label>
                            </div>
            
                            <div>
                                <input type="radio" name="sr_1" id="4" class="hidden" value="4">
                                <label for="4">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        4
                                    </div>
                                </label>
                            </div>
            
                            <div>
                                <input type="radio" name="sr_1" id="5" class="hidden" value="5">
                                <label for="5">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        5
                                    </div>
                                </label>
                            </div>
            
                            <div>
                                <input type="radio" name="sr_1" id="6" class="hidden" value="6">
                                <label for="6">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        6
                                    </div>
                                </label>
                            </div>
            
                            <div>
                                <input type="radio" name="sr_1" id="7" class="hidden" value="7">
                                <label for="7">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        7
                                    </div>
                                </label>
                            </div>
            
                            <div>
                                <input type="radio" name="sr_1" id="8" class="hidden" value="8">
                                <label for="8">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        8
                                    </div>
                                </label>
                            </div>
            
                            <div>
                                <input type="radio" name="sr_1" id="9" class="hidden" value="9">
                                <label for="9">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        9
                                    </div>
                                </label>
                            </div>
            
                            <div>
                                <input type="radio" name="sr_1" id="10" class="hidden" value="10">
                                <label for="10">
                                    <div class="w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                        10
                                    </div>
                                </label>
                            </div>
            
                        </div>
                    </div>
            
                </div>
                {{-- Bagian Rating Pelayanan End --}}
            
                {{-- Bagian Feedback Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold mb-7 border-b-2 pb-3">Bagian Feedback</p>
            
                    <div class="w-full mb-7">
                        <label for="f_1" class="text-sm font-medium mb-2 block">
                            Tuliskan komentar, kritik, maupun saran untuk perbaikan layanan selanjutnya sebagai bahan evaluasi
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <textarea name="f_1" id="f_1" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"></textarea>
                    </div>
            
                </div>
                {{-- Bagian Feedback End --}}
            
                {{-- Bagian Lain-lain Start --}}
                <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
                    <p class="text-base font-semibold mb-7 border-b-2 pb-3">Bagian Lain-lain</p>
            
                    <div class="w-full mb-7">
                        <label for="o_1" class="text-sm font-medium mb-1 block">
                            Testimoni pian dalam menerima pelayanan
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <textarea name="o_1" id="o_1" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"></textarea>
                    </div>
            
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
