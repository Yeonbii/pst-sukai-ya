@extends('dashboard.layouts.main')

@section('container')

    <div class="flex h-[44px] items-end">
        <a href="/dashboard/manage-form" class="font-semibold text-xl underline hover:text-primary">Kembali ke Manage Form</a>
    </div>
    
    <div class="py-12 mx-auto md:max-w-2xl">

        {{-- Bagian Identitas Start --}}
        <div class="w-full bg-white rounded-md mb-5 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Identitas</h3>

            <div class="w-full px-2 mb-3">
                <label for="name" class="text-sm font-medium mb-1 block">
                    Nama Lengkap
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="name" id="name" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus>
            </div>

            <div class="w-full px-2 mb-3">
                <label for="gender" class="text-sm font-medium mb-1 block">
                    Jenis Kelamin
                    <span class="text-red-500">(wajib)</span>
                </label>
                <select name="gender" id="gender" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                    <option selected>Pilih</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="w-full px-2 mb-3">
                <label for="completed-education" class="text-sm font-medium mb-1 block">
                    Pendidikan yang ditamatkan
                    <span class="text-red-500">(wajib)</span>
                </label>
                <select name="completed-education" id="completed-education" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                    <option selected>Pilih</option>
                    <option value="<= SMP/sederajat"><= SMP/sederajat</option>
                    <option value="SMA/sederajat">SMA/sederajat</option>
                    <option value="DI/DII/DIII">DI/DII/DIII</option>
                    <option value="DIV/S1">DIV/S1</option>
                    <option value="S2/S3">S2/S3</option>
                </select>
            </div>

            <div class="w-full px-2 mb-3">
                <label for="job" class="text-sm font-medium mb-1 block">
                    Pekerjaan
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="job" id="job" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
            </div>
            
            <div class="w-full px-2 mb-3">
                <label for="email" class="text-sm font-medium mb-1 block">
                    Email
                </label>
                <input type="email" name="email" id="email" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
            </div>

            <div class="w-full px-2 mb-3">
                <label for="no-hp" class="text-sm font-medium mb-1 block">
                    Nomor HP Aktif
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="no-hp" id="no-hp" maxlength="13" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
            </div>
    
            <div class="w-full px-2 mb-3">
                <label for="no-wa" class="text-sm font-medium mb-1 block">
                    Nomor WA
                </label>
                <input type="text" name="no-wa" id="no-wa" maxlength="13" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
            </div>

        </div>
        {{-- Bagian Identitas End --}}

        {{-- Bagian Layanan Start --}}
        <div class="w-full bg-white rounded-md mb-5 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Layanan</h3>

            <div class="w-full px-2 mb-3">
                <label for="date" class="text-sm font-medium mb-1 block">
                    Tanggal pelayanan diterima
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="date" name="date" id="date" class="text-sm border-2 border-slate-300 rounded-md w-full px-2.5 py-2 focus:border-secondary focus:outline-none">
            </div>

            <div class="w-full px-2 mb-3">
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
        {{-- Bagian Layanan End --}}

        {{-- Bagian Nilai Palayanan Start --}}
        <div class="w-full bg-white rounded-md mb-5 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Nilai Pelayanan</h3>

            <div class="w-full px-2 mb-3">
                <label for="service-rate-1" class="text-sm font-medium mb-1 block">
                    Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?
                    <span class="text-red-500">(wajib)</span>
                </label>
                <select name="service-rate-1" id="service-rate-1" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
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
        {{-- Bagian Nilai Pelayanan End --}}

        {{-- Bagian Rating Pelayanan Start --}}
        <div class="w-full bg-white rounded-md mb-5 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Rating Pelayanan</h3>

            <div class="w-full px-2 mb-3">
                <p class="text-sm font-medium mb-1 block">
                    Berikan penilaian pelayanan secara umum yang dilakukan petugas/aplikasi (1= sangat buruk, 10=sangat baik) 
                    <span class="text-red-500">(wajib)</span>
                </p>
                <div id="service-rate-1" class="max-w-lg mx-auto text-sm p-2.5 flex flex-wrap items-center justify-around">

                    <div>
                        <input type="radio" name="service-rate-1" id="1" class="hidden" value="1">
                        <label for="1">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                1
                            </div>
                        </label>
                    </div>   

                    <div>
                        <input type="radio" name="service-rate-1" id="2" class="hidden" value="2">
                        <label for="2">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                2
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="3" class="hidden" value="3">
                        <label for="3">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                3
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="4" class="hidden" value="4">
                        <label for="4">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                4
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="5" class="hidden" value="5">
                        <label for="5">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                5
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="6" class="hidden" value="6">
                        <label for="6">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                6
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="7" class="hidden" value="7">
                        <label for="7">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                7
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="8" class="hidden" value="8">
                        <label for="8">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                8
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="9" class="hidden" value="9">
                        <label for="9">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                9
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="10" class="hidden" value="10">
                        <label for="10">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                10
                            </div>
                        </label>
                    </div>

                </div>
            </div>
       
        </div>
        {{-- Bagian Rating Pelayanan End --}}

        {{-- Bagian Feedback Start --}}
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
        {{-- Bagian Feedback End --}}

        {{-- Bagian Lain-lain Start --}}
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
        {{-- Bagian Lain-lain End --}}
        
    </div>

@endsection