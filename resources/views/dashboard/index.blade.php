@extends('dashboard.layouts.main')

@section('container')
    {{-- Test Modal --}}
    <!-- Tombol untuk membuka modal -->
    <button id="openModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Buka Modal
    </button>

    <!-- Modal -->
    <div id="myModal" class="modal hidden fixed inset-0 w-full h-full flex items-center justify-center z-20 bg-black bg-opacity-50">
        <div class="modal-content bg-white w-1/2 p-4">
            <!-- Konten Modal -->
            <p>Ini adalah konten modal.</p>
            <button id="closeModal" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Tutup Modal
            </button>
        </div>
    </div>

    {{-- Test Tombol Bulan --}}
    <div class="my-4">
        <button id="changeMonthButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Bulan Ini
        </button>
        <div id="monthYearPicker" class="hidden mt-2">
            <select id="monthSelect" class="px-3 py-1 border rounded">
                <option value="01">Januari</option>
                <!-- Tambahkan pilihan bulan lain di sini -->
            </select>
            <select id="yearSelect" class="px-3 py-1 border rounded">
                <!-- Tambahkan pilihan tahun yang sesuai di sini -->
            </select>
            <button id="applyMonthYearButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded ml-2">
                Terapkan
            </button>
        </div>
    </div>
@endsection