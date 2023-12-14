@extends('forms.layouts.main')

@section('container')

    <form action="/form/f" method="post">
        @csrf

        <div class="bg-white rounded-md shadow-md mb-9 p-7">
            
            <p class="text-base font-semibold border-b-2 pb-3 md:text-2xl">Bagian Feedback</p>
    
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

                        <textarea name="f_{{ $no_question }}" id="f_{{ $no_question }}" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" {{ ($question->is_required == '1') ? 'required' : '' }} >@if (session()->has('form_f')){{ $form_f['f_'.$no_question] }}@endif</textarea>

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