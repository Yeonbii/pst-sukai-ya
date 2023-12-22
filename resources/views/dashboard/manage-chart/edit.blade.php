@extends('dashboard.layouts.main')

@section('container')

    @if ($errors->any())
        <div id="alert-card">
            <div class="w-full mb-5 rounded-md shadow-md font-medium border h-9 p-5 bg-opacity-30 flex items-center border-red-500 bg-red-500 text-red-900">
                <div class="ms-4">
                    Terdapat beberapa kesalahan, silahkan ulangi!
                </div>
                <button type="button" class="w-8 h-8 flex justify-center items-center ms-auto" onclick="closeAlert()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <script>
            var alertCard = document.querySelector('#alert-card');
            function closeAlert() {
                alertCard.classList.add('hidden');
            }
        </script>
    @endif

    <div class="flex h-[44px] items-end">
        <h3 class="font-semibold text-xl">Kelola Chart yang akan Ditampilkan pada Dashboard - <span class="text-primary">Edit Chart</span></h3>
    </div>

    <div class="py-12">

        <div class="bg-white rounded-md shadow-md mb-9 p-7">
        
            <div class="w-full mb-7">
                <label for="text" class="text-sm font-medium mb-2 block">
                    Isi Pertanyaan
                </label>
                <input type="text" name="text" id="text" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="{{ $chart->question->text }}">
            </div>
        
        </div>

        <form action="/dashboard/manage-chart/{{ $chart->id }}/edit" method="post">
            @csrf
            <div class="w-full">

                <div class="bg-white rounded-md shadow-md mb-9 p-7">

                    <div id="no_div" class="w-full mb-7">
                        <label for="no" class="text-sm font-medium mb-2 block">
                            No
                            <span class="text-red-500">(wajib)</span>
                        </label>
                        <select id="no" name="no" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none" autofocus required>
                            @for ($i = 1; $i <= $chart->count(); $i++)
                                <option value="{{ $i }}" {{ ($i == $chart->no) ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div id="show_div" class="w-full mb-7">
                        <p class="text-sm font-medium mb-2">
                            Apakah wajib dijawab?
                            <span class="text-red-500">(wajib)</span>
                        </p>

                        <div id="show" class="mt-3">
                            
                            {{-- Yes --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="show" id="show_1" value="1" class="w-4 h-4 flex-shrink-0" required {{ ($chart->show === '1') ? 'checked' : '' }}>
                                <label for="show_1" class="ms-2 text-sm font-medium">Yes</label>
                            </div>

                            {{-- No --}}
                            <div class="flex items-center mb-4">
                                <input type="radio" name="show" id="show_0" value="0" class="w-4 h-4 flex-shrink-0" required {{ ($chart->show === '0') ? 'checked' : '' }}>
                                <label for="show_0" class="ms-2 text-sm font-medium">No</label>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="flex">
                    <button type="submit" class="font-semibold text-sm bg-primary text-white rounded-md mt-2 me-3 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center" onclick="return confirm('Are you sure?')">Simpan</button>
                    <button type="button" class="font-semibold text-sm bg-slate-400 text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center" onclick="window.history.back();">Batal</button>
                </div>
                
            </div>
             
        </form>           

    </div>    

@endsection