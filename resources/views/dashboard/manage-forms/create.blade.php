@extends('dashboard.layouts.main')

@section('container')

    <div class="w-full mb-3">
        <h3 class="font-semibold text-xl">Manage Form - Tambah Pertanyaan</h3>
    </div>

    <div class="pt-12 pb-12">

        <div class="w-full">

            <div class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                <div class="flex flex-wrap items-center">

                    <div class="w-full px-2 mb-3 md:w-1/2">
                        <label for="part" class="text-sm font-medium mb-1 block">Part</label>
                        <select id="part" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                            <option selected class="p-2.5">Pilih</option>
                            <option class="p-2.5" value="US">United States</option>
                            <option class="p-2.5" value="CA">Canada</option>
                            <option class="p-2.5" value="FR">France</option>
                            <option class="p-2.5" value="DE">Germany</option>
                        </select>
                    </div>
                    
                    <div class="w-full px-2 mb-3 md:w-1/2">
                        <label for="no" class="text-sm font-medium mb-1 block">No</label>
                        <input type="text" name="no" id="no" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                    </div>

                </div>

            </div>

            <div class="bg-white rounded-md shadow-md mb-9 px-3 py-5">

                <div class="w-full px-2 mb-3">
                    <label for="part" class="text-sm font-medium mb-1 block">Part</label>
                    <select id="part" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                        <option selected class="p-2.5">Pilih</option>
                        <option class="p-2.5" value="US">United States</option>
                        <option class="p-2.5" value="CA">Canada</option>
                        <option class="p-2.5" value="FR">France</option>
                        <option class="p-2.5" value="DE">Germany</option>
                    </select>
                </div>

                <div class="w-full px-2 mb-3">
                    <label for="no" class="text-sm font-medium mb-1 block">No</label>
                    <input type="text" name="no" id="no" class="text-sm border-2 border-slate-300 rounded-md w-full p-2.5 focus:border-secondary focus:outline-none">
                </div>

            </div>
            
        </div>            

    </div>    

@endsection