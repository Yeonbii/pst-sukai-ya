@extends('forms.layouts.main')

@section('container')

    <form action="">
        
        <h3 class="font-semibold text-lg text-primary mb-5 md:text-2xl">Bagian Lain-lain</h3>

        <div class="w-full bg-white rounded-md mb-5 p-4">

            <div class="w-full px-2 mb-3">
                <label for="testimony" class="text-sm font-medium mb-1 block">
                    Video/Audio Testimoni pian dalam menerima pelayanan
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="file" name="testimony" id="testimony" class="text-sm border-2 border-slate-300 rounded-md w-full pe-2.5 file:cursor-pointer file:px-3 file:py-2 file:mr-2.5 file:bg-slate-300 file:rounded-l-sm file:border-none file:text-secondary file:hover:opacity-70 file:transition file:duration-200 file:ease-in-out focus:border-secondary focus:outline-none">
            </div>

            <div class="w-full px-2 mb-4">
                <label for="contact-preference" class="text-sm font-medium mb-1 block">
                    Apakah bersedia dihubungi jika terpilih menjadi sampel survei kepuasan sejenis?
                    <span class="text-red-500">(wajib)</span>
                </label>
                <select name="contact-preference" id="contact-preference" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                    <option selected>Pilih</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="w-full px-2 mb-4">

                <div class="text-sm font-medium mb-1 block">
                    Saya bersedia diberikan informasi  melalui WA/Email mengenai
                </div>

                <div class="flex items-center mb-4">
                    <input id="rilis-data-statistik" type="checkbox" name="rilis-data-statistik" value="1" class="w-4 h-4">
                    <label for="rilis-data-statistik" class="ms-2 text-sm">Rilis Data Statistik</label>
                </div>
                
                <div class="flex items-center mb-4">
                    <input id="rilis-buku_publikasi-statistik" type="checkbox" name="rilis-buku_publikasi-statistik" value="1" class="w-4 h-4">
                    <label for="rilis-buku_publikasi-statistik" class="ms-2 text-sm">Rilis Buku/Publikasi Statistik</label>
                </div>
                
                <div class="flex items-center mb-4">
                    <input id="informasi_berita-kegiatan" type="checkbox" name="informasi_berita-kegiatan" value="1" class="w-4 h-4">
                    <label for="informasi_berita-kegiatan" class="ms-2 text-sm">Informasi/Berita Kegiatan</label>
                </div>

            </div>
       
        </div>

        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
            
            <a href="" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-blue-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Lanjut
            </a>

            <a href="/form/feedback" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
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