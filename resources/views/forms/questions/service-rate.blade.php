@extends('forms.layouts.main')

@section('container')

    <form action="/form/sr" method="post">
        @csrf
        
        <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
            <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Rating Pelayanan</p>

            @php
                    $no_question = 1;
                @endphp

                @foreach ($questions_sr as $question)
                   
                    {{-- 8 -> Rating (Pilih 1 s/d 10) --}}
                    <div id="sr_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                        
                        {{-- Teks Pertanyaan Start --}}
                        <p class="text-sm font-medium mb-2">
                            {{ $question->text }}
                            <span class="text-red-500">(wajib)</span>
                        </p>
                        {{-- Teks Pertanyaan End --}}

                        {{-- Catatan Pertanyaan Start --}}
                        @if ($question->need_note == 1)
                            @php
                                $modifiedText = preg_replace('/link\*(.*?)\*link/', '<a href="$1" target="_blank" class="text-blue-500 italic underline">$1</a>', $question->note);
                            @endphp
                            <p class="text-sm text-slate-500 mb-2 italic opacity-50">{!! nl2br($modifiedText) !!}</p>
                        @endif
                        {{-- Catatan Pertanyaan End --}}

                        {{-- Input Answer Start --}}
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
                                                {{ ($form_sr['sr_'.$no_question]  == $i) ? 'checked' : '' }}
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
                        {{-- Input Answer End --}}

                    </div>    

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

            <div class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg cursor-pointer" onclick="window.history.back()">
                Kembali
            </div>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-red-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Ulang
            </a>

        </div>
        {{-- Tombol End --}}

    </form>

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

@endsection