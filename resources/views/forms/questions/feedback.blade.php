@extends('forms.layouts.main')

@section('container')

    <form action="/form/f" method="post">
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
            
            <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Feedback</p>
    
                @php
                    $no_question = 1;
                @endphp

                @foreach ($questions_f as $question)
                   
                    {{-- 9 -> Textarea --}}
                    <div id="f_{{ $no_question }}_div" class="w-full pb-7 pt-5 {{ ($question->no == 1) ? '' : 'border-t-2' }}">
                        
                        {{-- Teks Pertanyaan Start --}}
                        <p class="text-sm font-medium mb-2">
                            {{ $question->text }}
                            @if ($question->is_required == '1')
                                <span class="text-red-500">(wajib)</span>
                            @endif
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
                        <textarea name="f_{{ $no_question }}" id="f_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">@if (session()->has('form_f')){{ $form_f['f_'.$no_question] }}@else{{ old('f_' . $no_question) }}@endif</textarea>
                        {{-- Input Answer End --}}

                        {{-- jika pertanyaan wajib tetapi belum dijawab Start --}}
                        @if ($question->is_required == '1')
                            @error('f_' . $no_question)
                                <p class="text-xs font-semibold text-red-500 mt-1">Pertanyaan belum dijawab!</p>
                            @enderror
                        @endif
                        {{-- jika pertanyaan wajib tetapi belum dijawab End --}}

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

@endsection