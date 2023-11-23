@extends('forms.layouts.main')

@section('container')

    <form action="">
        
        

        <div class="w-full bg-white rounded-md mb-5 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Lain-lain</h3>

            <div class="w-full px-2 mb-3">
                <label for="testimony" class="text-sm font-medium mb-1 block">
                    Testimoni pian dalam menerima pelayanan
                    <span class="text-red-500">(wajib)</span>
                </label>
                <textarea name="testimony" id="testimony" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none"></textarea>
            </div>

            <div class="w-full px-2 mb-3">
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

            <div class="w-full px-2 mb-3">

                <div class="text-sm font-medium mb-2 block">
                    Saya bersedia diberikan informasi  melalui WA/Email mengenai
                </div>

                <div class="flex items-center mb-2">
                    <input id="rilis-data-statistik" type="checkbox" name="rilis-data-statistik" value="1" class="w-4 h-4">
                    <label for="rilis-data-statistik" class="ms-2 text-sm">Rilis Data Statistik</label>
                </div>
                
                <div class="flex items-center mb-2">
                    <input id="rilis-buku_publikasi-statistik" type="checkbox" name="rilis-buku_publikasi-statistik" value="1" class="w-4 h-4">
                    <label for="rilis-buku_publikasi-statistik" class="ms-2 text-sm">Rilis Buku/Publikasi Statistik</label>
                </div>
                
                <div class="flex items-center mb-2">
                    <input id="informasi_berita-kegiatan" type="checkbox" name="informasi_berita-kegiatan" value="1" class="w-4 h-4">
                    <label for="informasi_berita-kegiatan" class="ms-2 text-sm">Informasi/Berita Kegiatan</label>
                </div>

            </div>
       
        </div>

        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
            
            <a href="/form/confirm" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-green-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Selesai
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