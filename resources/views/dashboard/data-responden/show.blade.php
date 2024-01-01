@extends('dashboard.layouts.main')

@section('container')

    <div class="flex flex-wrap mb-5 md:mb-2 justify-between items-end h-[44px]">
        <div class="w-full md:w-1/2">
            <h3 class="font-semibold text-xl">Data Responden - <span class="text-primary">{{ $responden->name }}</span></h3>
        </div>
    </div>
   
    <p class="text-sm text-slate-400 italic">Created at {{ $responden->created_at->format('d M Y, g:i A') }}</p>

    <div class="pt-12 pb-12 px-4 mx-auto md:max-w-2xl">

        {{-- Bagian Identitas Start --}}
        <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
            <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Identitas</p>
            
            @if ($questions_i->count() > 0)

                @php
                    $no_question = 1;
                @endphp

                @foreach ($questions_i as $question)
                   
                    <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                        </label>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="text" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                            value="{{ $question->pivot->value }}"
                        >
                        {{-- Input Answer End --}}

                    </div>

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
                   
                    <div id="s_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="s_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                        </label>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="text" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                            value="{{ $question->pivot->value }}"
                        >
                        {{-- Input Answer End --}}

                    </div>

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
                   
                    <div id="sv_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                
                        {{-- Teks Pertanyaan Start --}}
                        <p class="text-sm font-medium mb-2">
                            {{ $question->text }}
                        </p>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="text" name="sv_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                            @foreach ($question->options as $option)

                                {{-- Check apakah option adalah jawaban responden --}}
                                @if ($option->value == $question->pivot->value)
                                    
                                    @php
                                        $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $option->text);
                                    @endphp

                                    value="({{ $option->value }}) {{ $modifiedText }}"

                                @endif
                                {{-- Check End --}}

                            @endforeach                            
                        >
                        {{-- Input Answer End --}}

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
                   
                    <div id="sr_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                                
                        {{-- Teks Pertanyaan Start --}}
                        <p class="text-sm font-medium mb-2">
                            {{ $question->text }}
                        </p>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <div id="sr_{{ $no_question }}" class="mt-3">

                            <div class="service-rate max-w-lg mx-auto text-sm p-2.5 flex flex-wrap items-center justify-around">

                                @php
                                    $option_number = 10;
                                @endphp

                                @for ($i = 1; $i <= $option_number; $i++)
                                    
                                    <div class="cursor-pointer w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white {{ ($question->pivot->value  == $i) ? 'selected-selection' : 'unselected-selection' }}">
                                        {{ $i }}
                                    </div>

                                @endfor
                
                            </div>

                        </div>
                        {{-- Input Answer End --}}

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
                   
                    <div id="f_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                                
                        {{-- Teks Pertanyaan Start --}}
                        <p class="text-sm font-medium mb-2">
                            {{ $question->text }}
                        </p>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <textarea name="f_{{ $no_question }}" id="f_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly>{{ $question->pivot->value }}</textarea>
                        {{-- Input Answer End --}}

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
                   
                    <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="o_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                        </label>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        @if ($question->input_type == '9')
                            <textarea name="o_{{ $no_question }}" id="o_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly >{{ $question->pivot->value }}</textarea>
                        @else
                            <input type="text" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                value="{{ $question->pivot->value }}"
                            >
                        @endif
                        {{-- Input Answer End --}}

                    </div>

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

@endsection