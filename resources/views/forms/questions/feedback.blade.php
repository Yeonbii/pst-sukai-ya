@extends('forms.layouts.main')

@section('container')

    <form action="">
        
        

        <div class="w-full bg-white rounded-md mb-5 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Feedback</h3>

            <div class="w-full px-2 mb-3">
                <label for="feedback" class="text-sm font-medium mb-1 block">
                    Tuliskan komentar, kritik, maupun saran untuk perbaikan layanan selanjutnya sebagai bahan evaluasi
                    <span class="text-red-500">(wajib)</span>
                </label>
                <textarea name="feedback" id="feedback" rows="4" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"></textarea>
            </div>
       
        </div>

        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
            
            <a href="/form/others" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-blue-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Lanjut
            </a>

            <a href="/form/service-rate" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Kembali
            </a>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-red-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Ulang
            </a>

        </div>

    </form>

    



    {{-- JS Start --}}
    <script>

    </script>
    {{-- JS End --}}

@endsection