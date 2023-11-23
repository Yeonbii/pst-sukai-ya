@extends('forms.layouts.main')

@section('container')

    <form action="">
        
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

        <div class="flex flex-wrap items-center justify-between md:flex-row-reverse">
            
            <a href="/form/feedback" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-blue-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Lanjut
            </a>

            <a href="/form/service-value" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-yellow-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Kembali
            </a>

            <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-red-500 text-white text-center py-2 rounded-md w-full md:max-w-[200px] mb-3 hover:shadow-lg">
                Ulang
            </a>

        </div>

    </form>

    



    {{-- JS Start --}}
    <script>

        var serviceRate1 = document.querySelector('#service-rate-1');
        var selection = serviceRate1.querySelectorAll('label');

        selection.forEach(function(element) {
            element.addEventListener('click', function() {
                selection.forEach(function(e) {
                    e.querySelector('div').classList.remove('selected-selection');
                    e.querySelector('div').classList.add('unselected-selection');
                });
                element.querySelector('div').classList.remove('unselected-selection');
                element.querySelector('div').classList.add('selected-selection');
            });
        });

    </script>
    {{-- JS End --}}

@endsection