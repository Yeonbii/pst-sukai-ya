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
                    
                    <div id="i_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="i_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                        </label>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="text" name="i_{{ $no_question }}" id="i_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                            value="{{ $form_i['i_'.$no_question] }}"
                        >
                        {{-- Input Answer End --}}

                    </div>

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
                    
                    <div id="s_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                        {{-- Teks Pertanyaan Start --}}
                        <label for="s_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                            {{ $question->text }}
                        </label>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Input Answer Start --}}
                        <input type="text" name="s_{{ $no_question }}" id="s_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                            value="{{ $form_s['s_'.$no_question] }}"
                        >
                        {{-- Input Answer End --}}

                    </div>

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
                                    @if ($option->value == $form_sv['sv_'.$no_question])
                                        
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
                                        
                                        <div class="cursor-pointer w-9 h-9 mx-1 mb-3 rounded-md flex justify-center items-center border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white {{ ($form_sr['sr_'.$no_question]  == $i) ? 'selected-selection' : 'unselected-selection' }}">
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
                    
                        <div id="f_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                            
                            {{-- Teks Pertanyaan Start --}}
                            <p class="text-sm font-medium mb-2">
                                {{ $question->text }}
                            </p>
                            {{-- Teks Pertanyaan End --}}

                            {{-- Input Answer Start --}}
                            <textarea name="f_{{ $no_question }}" id="f_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly>@if (session()->has('form_f')){{ $form_f['f_'.$no_question] }}@endif</textarea>
                            {{-- Input Answer End --}}

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
                    
                        <div id="o_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">

                            {{-- Teks Pertanyaan Start --}}
                            <label for="o_{{ $no_question }}" class="text-sm font-medium mb-2 block">
                                {{ $question->text }}
                            </label>
                            {{-- Teks Pertanyaan End --}}

                            {{-- Input Answer Start --}}
                            @if ($question->input_type == '9')
                                <textarea name="o_{{ $no_question }}" id="o_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly >@if (session()->has('form_o')){{ $form_o['o_'.$no_question] }}@endif</textarea>
                            @else
                                <input type="text" name="o_{{ $no_question }}" id="o_{{ $no_question }}" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none readonly" readonly
                                    value="{{ $form_o['o_'.$no_question] }}"
                                >
                            @endif
                            {{-- Input Answer End --}}

                        </div>

                        @php
                            $no_question++;
                        @endphp

                    @endforeach
        
            </div>    
        @endif
        {{-- Bagian Others End --}}

    </form>

@endsection