@extends('forms.layouts.main')

@section('container')

    <form action="">

        <p class="font-bold text-xl text-center text-white mb-5 mt-4">Apakah anda yakin dengan data masukkan sudah benar dan sesuai?
            <br>Jika tidak, silahkan cek kembali data tersebut di bawah ini :)</p>

        {{-- Tombol Start --}}
        <div class="flex flex-wrap items-center justify-around md:flex-row-reverse mb-12">
           
            <a href="/form/service" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-primary text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Yakin, kirim
            </a>

            <a href="/form/identity" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-slate-400 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Tidak, kembali
            </a>

        </div>
        {{-- Tombol End --}}
        
        {{-- Bagian Identitas Start --}}
        <div class="w-full bg-white rounded-md mb-10 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Identitas</h3>

            <div class="w-full px-2 mb-3">
                <label for="name" class="text-sm font-medium mb-1 block">
                    Nama Lengkap
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="name" id="name" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="Alexander Kahfi">
            </div>

            <div class="flex flex-wrap">

                <div class="w-full px-2 mb-3 md:w-1/2">
                    <label for="gender" class="text-sm font-medium mb-1 block">
                        Jenis Kelamin
                        <span class="text-red-500">(wajib)</span>
                    </label>
                    <input type="text" name="gender" id="gender" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="Laki-laki">
                </div>

                <div class="w-full px-2 mb-3 md:w-1/2">
                    <label for="completed-education" class="text-sm font-medium mb-1 block">
                        Pendidikan yang ditamatkan
                        <span class="text-red-500">(wajib)</span>
                    </label>
                    <input type="text" name="completed-education" id="completed-education" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="DIV/S1">
                </div>

            </div>

            <div class="w-full px-2 mb-3">
                <label for="job" class="text-sm font-medium mb-1 block">
                    Pekerjaan
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="job" id="job" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="Programmer">
            </div>
            
            <div class="w-full px-2 mb-3">
                <label for="email" class="text-sm font-medium mb-1 block">
                    Email
                </label>
                <input type="email" name="email" id="email" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="alexanderkahfi@gbox.id">
            </div>
            
            <div class="flex flex-wrap">

                <div class="w-full px-2 mb-3 md:w-1/2">
                    <label for="no-hp" class="text-sm font-medium mb-1 block">
                        Nomor HP Aktif
                        <span class="text-red-500">(wajib)</span>
                    </label>
                    <input type="text" name="no-hp" id="no-hp" maxlength="13" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="081234123412">
                </div>
        
                <div class="w-full px-2 mb-3 md:w-1/2">
                    <div class="flex items-center mb-2 md:mb-1">
                        <input id="is-same" type="checkbox" value="" class="w-4 h-4 me-2" checked disabled>
                        <label for="is-same" class="text-sm font-medium block">
                            Nomor WA adalah Nomor HP?
                        </label>
                    </div>
                    <input type="text" name="no_wa" id="no-wa" maxlength="13" class="text-sm border-b border-slate-300 w-full p-2.5 readonly rounded-md" readonly value="081234123412">
                </div>

            </div>

        </div>
        {{-- Bagian Identitas End --}}

        {{-- Bagian Service Start --}}
        <div class="w-full bg-white rounded-md mb-10 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Layanan</h3>

            <div class="flex flex-wrap">

                <div class="w-full px-2 mb-3 md:w-1/2">
                    <label for="date" class="text-sm font-medium mb-1 block">
                        Tanggal pelayanan diterima
                        <span class="text-red-500">(wajib)</span>
                    </label>
                    <input type="date" name="date" id="date" class="text-sm border-b border-slate-300 w-full px-2.5 py-2" readonly value="2023-08-01">
                </div>

                <div class="w-full px-2 mb-3 md:w-1/2">
                    <label for="service_1" class="text-sm font-medium mb-1 block">
                        Jenis layanan
                        <span class="text-red-500">(wajib)</span>
                    </label>
                    <input type="text" name="service_1" id="service_1" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="Perpustakaan">
                </div>

            </div>

            

            <div class="w-full px-2 mb-3">
                <label for="service_2" class="text-sm font-medium mb-1 block">
                    Media yang digunakan
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="service_2" id="service_2" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="Entahlah">

                {{-- Ketika Yang lain dipilih --}}
                {{-- <input type="text" name="other_service_2" id="other_service_2" class="mt-3 text-sm border-b border-slate-300 w-full p-2.5" readonly value="Entahlah"> --}}
            </div>

            <div class="w-full px-2 mb-3">
                <label for="service_3" class="text-sm font-medium mb-1 block">
                    Petugas yang melayani
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="service_3" id="service_3" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="Safrian F.">
            </div>
       
        </div>
        {{-- Bagian Service End --}}

        {{-- Bagian Service Value Start --}}
        <div class="w-full bg-white rounded-md mb-10 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Nilai Pelayanan</h3>

            <div class="w-full px-2 mb-3">
                <label for="service-value-1" class="text-sm font-medium mb-1 block">
                    Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="service-value-1" id="service-value-1" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="(3) Sesuai">
                <p class="text-sm text-slate-500 my-1 italic opacity-50">
                    Persyaratan pelayanan dapat dilihat pada poster di ruang pelayanan atau di <a href="https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html" class="text-blue-500 underline">{{ Str::limit('https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html', 25) }}</a>
                </p>
            </div>
       
        </div>
        {{-- Bagian Service Value End --}}

        {{-- Bagian Service Rate Start --}}
        <div class="w-full bg-white rounded-md mb-10 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Rating Pelayanan</h3>

            <div class="w-full px-2 mb-3">
                <p class="text-sm font-medium mb-1 block">
                    Berikan penilaian pelayanan secara umum yang dilakukan petugas/aplikasi (1= sangat buruk, 10=sangat baik) 
                    <span class="text-red-500">(wajib)</span>
                </p>
                <div id="service-rate-1" class="max-w-lg mx-auto text-sm p-2.5 flex flex-wrap items-center justify-around">

                    <div>
                        <input type="radio" name="service-rate-1" id="1" class="hidden" value="1" disabled>
                        <label for="1">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                1
                            </div>
                        </label>
                    </div>   

                    <div>
                        <input type="radio" name="service-rate-1" id="2" class="hidden" value="2" disabled>
                        <label for="2">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                2
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="3" class="hidden" value="3" disabled>
                        <label for="3">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                3
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="4" class="hidden" value="4" disabled>
                        <label for="4">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                4
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="5" class="hidden" value="5" disabled>
                        <label for="5">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                5
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="6" class="hidden" value="6" disabled>
                        <label for="6">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                6
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="7" class="hidden" value="7" disabled checked>
                        <label for="7">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center selected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                7
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="8" class="hidden" value="8" disabled>
                        <label for="8">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                8
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="9" class="hidden" value="9" disabled>
                        <label for="9">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                9
                            </div>
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="service-rate-1" id="10" class="hidden" value="10" disabled>
                        <label for="10">
                            <div class="w-9 h-9 mx-1.5 mb-3 rounded-md flex justify-center items-center unselected-selection border-2 border-dark border-opacity-30 hover:bg-dark hover:text-white">
                                10
                            </div>
                        </label>
                    </div>

                </div>
            </div>
       
        </div>
        {{-- Bagian Service Rate End --}}

        {{-- Bagian Feedback Start --}}
        <div class="w-full bg-white rounded-md mb-10 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Feedback</h3>
            
            <div class="w-full px-2 mb-3">
                <label for="feedback" class="text-sm font-medium mb-1 block">
                    Tuliskan komentar, kritik, maupun saran untuk perbaikan layanan selanjutnya sebagai bahan evaluasi
                    <span class="text-red-500">(wajib)</span>
                </label>
                <textarea name="feedback" id="feedback" rows="4" class="text-sm border-b border-slate-300 w-full p-2.5" readonly>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae distinctio officiis placeat. Nesciunt facilis sequi, sapiente quod accusantium iure aliquam eos ducimus corrupti expedita quam quo velit harum ipsa nam autem libero labore dolores. Exercitationem quaerat, reiciendis porro ut ea sapiente? Perspiciatis quam neque iure vel iusto, aspernatur at. Enim nam, asperiores in qui distinctio deleniti? Rem vero minus porro. Libero porro excepturi quas nemo obcaecati similique tempora, officiis repudiandae ex consectetur rerum sequi quidem enim ut! Quam cupiditate quia voluptas sapiente provident reprehenderit. Architecto harum aut itaque aspernatur officia commodi totam voluptates quibusdam rerum debitis dolores repudiandae iusto quod quidem sunt nemo, quae atque! Id iste reiciendis animi similique dignissimos est! Sunt autem dolore esse et unde corrupti praesentium vitae soluta voluptatibus fugit, quod, inventore ex molestiae ratione quas officiis, ullam beatae commodi corporis? Quam perferendis natus sunt quae nostrum! Iste quae quidem beatae quisquam tempora harum ab accusantium eaque, aspernatur possimus, obcaecati illo est in perspiciatis odit. Voluptatem voluptatum impedit eveniet pariatur provident voluptatibus. Nemo voluptate temporibus illo, aspernatur dolorem dolore ipsum iure suscipit vitae necessitatibus voluptas molestiae ex cum voluptates hic autem ea quasi eum ad consectetur rem ratione blanditiis. Saepe, accusantium. Rerum aut omnis aperiam officia.</textarea>
            </div>
       
        </div>
        {{-- Bagian Feedback End --}}

        {{-- Bagian Others Start --}}
        <div class="w-full bg-white rounded-md mb-10 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Lain-lain</h3>

            <div class="w-full px-2 mb-3">
                <label for="testimony" class="text-sm font-medium mb-1 block">
                    Testimoni pian dalam menerima pelayanan
                    <span class="text-red-500">(wajib)</span>
                </label>
                <textarea name="testimony" id="testimony" rows="3" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5" readonly>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni alias cumque et nulla quibusdam asperiores enim pariatur voluptates praesentium eos culpa vel, esse non aliquam temporibus itaque corrupti? Animi, tenetur quis. Cupiditate numquam quos dolore libero beatae delectus amet a eos minus fugiat. Voluptas quod eos incidunt voluptatum at libero.</textarea>
            </div>

            <div class="w-full px-2 mb-3">
                <label for="contact-preference" class="text-sm font-medium mb-1 block">
                    Apakah bersedia dihubungi jika terpilih menjadi sampel survei kepuasan sejenis?
                    <span class="text-red-500">(wajib)</span>
                </label>

                <input type="text" name="contact-preference" id="contact-preference" class="hidden" readonly value="0">
                <div class="text-sm border-b border-slate-300 w-full p-2.5">
                    Tidak
                </div>
                
            </div>

            <div class="w-full px-2 mb-3">

                <div class="text-sm font-medium mb-2 block">
                    Saya bersedia diberikan informasi  melalui WA/Email mengenai
                </div>

                <div class="flex items-center mb-2">
                    <input id="rilis-data-statistik" type="checkbox" name="rilis-data-statistik" value="1" class="w-4 h-4" checked disabled>
                    <label for="rilis-data-statistik" class="ms-2 text-sm">Rilis Data Statistik</label>
                </div>
                
                <div class="flex items-center mb-2">
                    <input id="rilis-buku_publikasi-statistik" type="checkbox" name="rilis-buku_publikasi-statistik" value="1" class="w-4 h-4" disabled>
                    <label for="rilis-buku_publikasi-statistik" class="ms-2 text-sm">Rilis Buku/Publikasi Statistik</label>
                </div>
                
                <div class="flex items-center mb-2">
                    <input id="informasi_berita-kegiatan" type="checkbox" name="informasi_berita-kegiatan" value="1" class="w-4 h-4" disabled>
                    <label for="informasi_berita-kegiatan" class="ms-2 text-sm">Informasi/Berita Kegiatan</label>
                </div>

            </div>
       
        </div>
        {{-- Bagian Others End --}}

    </form>

    



    {{-- JS Start --}}
    <script>

    </script>
    {{-- JS End --}}

@endsection