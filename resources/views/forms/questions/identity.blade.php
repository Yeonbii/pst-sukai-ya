@extends('forms.layouts.main')

@section('container')

    <form action="">
        
       

        <div class="w-full bg-white rounded-md mb-5 p-4">

            <h3 class="font-semibold text-lg px-2 pb-2 mb-5 border-b md:text-3xl">Bagian Identitas</h3>

            <div class="w-full px-2 mb-3">
                <label for="name" class="text-sm font-medium mb-1 block">
                    Nama Lengkap
                    <span class="text-red-500">(wajib)</span>
                </label>
                <input type="text" name="name" id="name" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus>
            </div>

            <div class="flex flex-wrap">

                <div class="w-full px-2 mb-3 md:w-1/2">
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

                <div class="w-full px-2 mb-3 md:w-1/2">
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
            
            <div class="flex flex-wrap">

                <div class="w-full px-2 mb-3 md:w-1/2">
                    <label for="no-hp" class="text-sm font-medium mb-1 block">
                        Nomor HP Aktif
                        <span class="text-red-500">(wajib)</span>
                    </label>
                    <input type="text" name="no-hp" id="no-hp" maxlength="13" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                </div>
        
                <div class="w-full px-2 mb-3 md:w-1/2">
                    <div class="flex items-center mb-2 md:mb-1">
                        <input id="is-same" type="checkbox" value="" class="w-4 h-4 me-2">
                        <label for="is-same" class="text-sm font-medium block">
                            Nomor WA adalah Nomor HP?
                        </label>
                    </div>
                    <input type="text" name="no_wa" id="no-wa" maxlength="13" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                </div>

            </div>

        </div>

        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
           
            <a href="/form/service" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-blue-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Lanjut
            </a>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Kembali
            </a>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-red-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Ulang
            </a>

        </div>

    </form>

    



    {{-- JS Start --}}
    <script>
        var checkbox = document.querySelector('#is-same');
        var inputNoHp = document.querySelector('#no-hp');
        var inputNoWa = document.querySelector('#no-wa');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                // Checkbox dicentang, isi input no-wa dengan nilai input no-hp
                inputNoWa.value = inputNoHp.value;

                // Set atribut readonly pada input no-wa
                inputNoWa.setAttribute('readonly','readonly');

                inputNoWa.classList.add('readonly');
            } else {
                // Checkbox tidak dicentang, hapus atribut readonly pada input no-wa
                inputNoWa.removeAttribute('readonly');
                inputNoWa.classList.remove('readonly');
                inputNoWa.value = ''; // Reset nilai input no-wa
            }
        });

        inputNoHp.addEventListener('input', function() {
            // Perbarui nilai input no-wa saat nilai input no-hp berubah
            if (checkbox.checked) {
                inputNoWa.value = inputNoHp.value;
            }
        });
    </script>
    {{-- JS End --}}

@endsection