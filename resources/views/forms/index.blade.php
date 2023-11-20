@extends('forms.layouts.main')

@section('container')

    <h1 class="font-bold text-5xl text-center text-white mb-12 mt-4">Pst! Sukai ya</h1>

    <div class="flex justify-center">
        <div class="w-full bg-white rounded-md mb-5">
            <div class="text-sm p-4">
                <p class="mb-14 text-center">
                    Merupakan media untuk melakukan <span class="font-bold">penilaian dan umpan balik pelayanan</span> yang didapatkan dari PST BPS Kab. Hulu Sungai Utara, <span class="font-bold">termasuk penggunaan Allstats BPS, berbagai macam website BPS, Portal Satu Data HSU (<a href="https://data.hsu.go.id" target="_blank" class="text-blue-500 underline italic">data.hsu.go.id</a>), dan pelayanan melalui Whatsapp.</span>
                </p>
                <p class="text-justify text-secondary border-t border-secondary pt-3">
                    Formulir ini disusun berdasarkan Permenpan RB No. 14/2017 tentang PEDOMAN PENYUSUNAN SURVEI KEPUASAN MASYARAKAT UNIT PENYELENGGARA PELAYANAN PUBLIK.
                </p>
            </div>
        </div>
    </div>

    <div class="flex">
        {{-- <button type="button" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-primary text-white py-2 mx-auto rounded-md w-full md:max-w-xl hover:shadow-lg">Mulai</button> --}}
        <a href="/form/identity" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-primary text-white text-center py-2 mx-auto rounded-md w-full md:max-w-4xl hover:shadow-lg">Mulai</a>
    </div>

@endsection