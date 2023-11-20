@extends('forms.layouts.main')

@section('container')

    <form action="">
        
        <h3 class="font-semibold text-lg text-primary mb-5 md:text-2xl">Bagian Nilai Pelayanan</h3>

        <div class="w-full bg-white rounded-md mb-5 p-4">

            <div class="w-full px-2 mb-4">
                <label for="service-3" class="text-sm font-medium mb-1 block">
                    Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?
                    <span class="text-red-500">(wajib)</span>
                </label>
                <select name="service-3" id="service-3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                    <option selected>Pilih</option>
                    <option value="1">(1) Tidak Sesuai</option>
                    <option value="2">(2) Kurang Sesuai</option>
                    <option value="3">(3) Sesuai</option>
                    <option value="4">(4) Sangat Sesuai</option>
                </select>
                <p class="text-sm text-slate-500 my-1 italic opacity-50">
                    Persyaratan pelayanan dapat dilihat pada poster di ruang pelayanan atau di <a href="https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html" class="text-blue-500 underline">{{ Str::limit('https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html', 25) }}</a>
                </p>
            </div>
       
        </div>

        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
            
            <a href="/form/service-rate" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-blue-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Lanjut
            </a>

            <a href="/form/service" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
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