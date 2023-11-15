@extends('dashboard.layouts.main')

@section('container')

    <div class="w-full mb-3">
        <h3 class="font-semibold text-xl">Manage Form - Tambah Pertanyaan</h3>
    </div>

    <div class="pt-12 pb-12">
        {{-- Table Start --}}
        <div class="w-full">
            <div class="bg-white rounded-md shadow-md mb-5">

                <div class="flex flex-wrap items-center mb-2">

                    <div class="w-full md:w-1/2 p-5">
                        <label for="part" class="text-sm font-semibold mb-2">Part</label>
                        <input type="text" name="part" id="part" class="text-sm border-2 border-dark rounded-md w-full px-2 py-1 focus:border-secondary focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-30" autofocus>
                    </div>

                </div>

            </div>
        </div>            
        {{-- Table End --}}
    </div>    

@endsection