@extends('dashboard.layouts.main')

@section('container')

    <div class="flex h-[44px] items-end">
        <h3 class="font-semibold text-xl">Manage Form - Selection</h3>
    </div>

    <div class="py-12">

        <form action="">
            @csrf
            <div class="bg-white rounded-md shadow-md mb-9 px-3 py-5">
            
                <div class="w-full px-2 mb-3">
                    <label for="text" class="text-sm font-medium mb-1 block">
                        Isi Pertanyaan
                    </label>
                    <input type="text" name="text" id="text" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?">
                </div>
                
                <div class="w-full px-2 mb-3">
                    <label for="is-number" class="text-sm font-medium mb-1 block">
                        Apakah value (nilai) yang akan dikirim berupa angka 1, 2, 3, ...?
                    </label>
                    <input type="text" name="is-number" id="is-number" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="Yes">
                </div>
                
                <div class="w-full px-2 mb-3">
                    <label for="has-other" class="text-sm font-medium mb-1 block">
                        Apakah terdapat pilihan Other?
                    </label>
                    <input type="text" name="has-other" id="has-other" class="text-sm border-b border-slate-300 w-full p-2.5" readonly value="No">
                </div>

                <div class="flex">
                    <button type="button" id="save" class="font-semibold text-sm bg-primary border-2 border-primary text-white rounded-md py-2.5 px-8 mb-3 ms-auto w-full hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center md:max-w-xs">Ganti</button>
                </div>
            
            </div>
    
            <div class="flex flex-wrap items-center mb-3 md:flex-nowrap">
                <input type="number" name="selection-number" id="selection-number" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 mb-3 focus:border-secondary focus:outline-none md:rounded-r-none" placeholder="Jumlah Pilihan">
                <button type="button" id="save" class="font-semibold text-sm bg-primary border-2 border-primary text-white rounded-md py-2.5 px-8 mb-3 w-full hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center md:max-w-xs md:rounded-l-none">Ganti Jumlah Pilihan</button>
            </div>
    
            <div class="bg-white rounded-md shadow-md mb-9 px-3 py-5">
    
                <div class="flex items-center px-2 mb-3">
                    <label for="option-1" class="text-sm font-medium block p-2.5 bg-dark text-white rounded-l-md border-2 border-dark">
                        1
                    </label>
                    <input type="text" name="option-1" id="option-1" class="text-sm border-2 border-slate-300 rounded-r-md w-full p-2.5 focus:border-secondary focus:outline-none">
                </div>
    
            </div>

            <div class="flex">
                <button type="submit" value="save" class="font-semibold text-sm bg-primary text-white rounded-md mt-2 me-3 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Simpan</button>
                <a href="/dashboard/manage-form" class="font-semibold text-sm bg-slate-400 text-white rounded-md mt-2 py-2 px-8 hover:bg-opacity-80 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30 text-center">Batal</a>
            </div>

        </form>
        
    </div>

@endsection