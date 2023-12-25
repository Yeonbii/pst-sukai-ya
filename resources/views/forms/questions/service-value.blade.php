@extends('forms.layouts.main')

@section('container')

    <form action="/form/sv" method="post">
        @csrf

        <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
            <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Nilai Pelayanan</p>
            
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
                                        @if (session()->has('form_sv'))
                                            {{ ($form_sv['sv_'.$no_question]  == $option->value) ? 'checked' : '' }}
                                        @endif   
                                    >
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                    @endphp
                                    <label for="sv_{{ $no_question }}_{{ $no_option }}" class="ms-2 text-sm font-medium">
                                        ({{ $no_option }}) {!! $modifiedText !!}
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

        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
            
            <button type="submit" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-blue-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Lanjut
            </button>

            <div class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg cursor-pointer" onclick="window.history.back()">
                Kembali
            </div>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-red-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Ulang
            </a>

        </div>

    </form>

@endsection