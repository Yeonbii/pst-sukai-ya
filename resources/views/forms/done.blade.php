@extends('forms.layouts.main')

@section('container')

    <h1 class="font-bold text-4xl text-center text-white mt-4">Terima Kasih Sebanyak-banyaknya</h1>
    <h1 class="font-bold text-4xl text-center text-primary mb-9 mt-3 md:mb-12">ヾ(≧▽≦*)o</h1>

    <div class="flex justify-center">
        <div class="w-full border-2 border-primary rounded-md mb-5">
            <div class="text-sm text-white p-4 md:text-base">
                <p class="text-center font-semibold">
                    Terima kasih atas partisipasi Anda yang luar biasa dalam survei kami. <br>Tanggapan Anda membantu kami memahami lebih baik dan meningkatkan layanan kami
                </p>
            </div>
        </div>
    </div>

    <div class="flex">
        {{-- <button type="button" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-primary text-white py-2 mx-auto rounded-md w-full md:max-w-xl hover:shadow-lg">Mulai</button> --}}
        <a href="/" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-primary text-white text-center py-2 mx-auto rounded-md w-full md:max-w-4xl hover:shadow-lg">Kembali ke Beranda</a>
    </div>

@endsection