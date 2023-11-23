@extends('forms.layouts.main')

@section('container')

    <form action="">

        <div class="w-full bg-white rounded-md mb-5 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Layanan</h3>

            <div class="flex flex-wrap">

                <div class="w-full px-2 mb-3 md:w-1/2">
                    <label for="date" class="text-sm font-medium mb-1 block">
                        Tanggal pelayanan diterima
                        <span class="text-red-500">(wajib)</span>
                    </label>
                    <input type="date" name="date" id="date" class="text-sm border-2 border-slate-300 rounded-md w-full px-2.5 py-2 focus:border-secondary focus:outline-none">
                </div>

                <div class="w-full px-2 mb-3 md:w-1/2">
                    <label for="service_1" class="text-sm font-medium mb-1 block">
                        Jenis layanan
                        <span class="text-red-500">(wajib)</span>
                    </label>
                    <select name="service_1" id="service_1" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                        <option selected>Pilih</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="Konsultasi">Konsultasi</option>
                        <option value="Rekomendasi">Rekomendasi</option>
                        <option value="Penjualan">Penjualan</option>
                    </select>
                </div>

            </div>

            

            <div class="w-full px-2 mb-3">
                <label for="service_2" class="text-sm font-medium mb-1 block">
                    Media yang digunakan
                    <span class="text-red-500">(wajib)</span>
                </label>
                <select name="service_2" id="service_2" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 overflow-auto focus:border-secondary focus:outline-none" onchange="showOtherInput()">
                    <option selected>Pilih</option>
                    <option value="Datang Langsung ke PST BPS Kab. HSU">Datang Langsung ke PST BPS Kab. HSU</option>
                    <option value="Whatsapp message">Whatsapp message</option>
                    <option value="Website BPS (http://hulusungaiutarakab.bps.go.id)
">Website BPS (http://hulusungaiutarakab.bps.go.id)
</option>
                    <option value="Aplikasi Allstats BPS">Aplikasi Allstats BPS</option>
                    <option value="Email">Email</option>
                    <option value="Romantik Online (http://romantik.bps.go.id)">Romantik Online (http://romantik.bps.go.id)</option>
                    <option value="Surat">Surat</option>
                    <option value="Website PST (pst.bps.go.id)">Website PST (pst.bps.go.id)</option>
                    <option value="Portal satu data HSU (http://data.hsu.go.id)">Portal satu data HSU (http://data.hsu.go.id)</option>
                    <option value="Acil bungas di Perpustakaan STIPER Amuntai">Acil bungas di Perpustakaan STIPER Amuntai</option>
                    <option value="Yang lain">Yang lain</option>
                </select>
                {{-- Ketika Yang lain dipilih --}}
                <input type="text" name="other_service_2" id="other_service_2" class="hidden mt-3 text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
            </div>

            <div class="w-full px-2 mb-3">
                <label for="service_3" class="text-sm font-medium mb-1 block">
                    Petugas yang melayani
                    <span class="text-red-500">(wajib)</span>
                </label>
                <select name="service_3" id="service_3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                    <option selected>Pilih</option>
                    <option value="Masdani">Masdani</option>
                    <option value="Eko W.L.">Eko W.L.</option>
                    <option value="M. Adi W.K.">M. Adi W.K.</option>
                    <option value="Oktaviani">Oktaviani</option>
                    <option value="Hanif Y.R.">Hanif Y.R.</option>
                    <option value="M. Imam S.">M. Imam S.</option>
                    <option value="Safrian F.">Safrian F.</option>
                    <option value="Ghytsa A.J.">Ghytsa A.J.</option>
                    <option value="Faizal R.">Faizal R.</option>
                    <option value="Ariq">Ariq</option>
                    <option value="Ridha">Ridha</option>
                </select>
            </div>
       
        </div>

        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
            
            <a href="/form/service-value" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-blue-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Lanjut
            </a>
            
            <a href="/form/identity" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Kembali
            </a>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-red-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Ulang
            </a>

        </div>

    </form>

    



    {{-- JS Start --}}
    <script>

        function showOtherInput() {
            var service2 = document.querySelector('#service_2');
            var otherService2 = document.querySelector('#other_service_2');

            if (service2.value === 'Yang lain') {
                otherService2.classList.remove('hidden');
                otherService2.required = true;
                otherService2.placeholder = 'Masukkan';
                otherService2.focus();
            } else {
                otherService2.classList.add('hidden');
                otherService2.required = false;
                otherService2.value = '';
            }
        }

    </script>
    {{-- JS End --}}

@endsection