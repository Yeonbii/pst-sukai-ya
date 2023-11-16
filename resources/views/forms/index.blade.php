<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-dark">

    <header class="w-full flex items-center">
        <div class="container py-6">
            <a href="/" class="font-bold text-lg underline py-3 text-light hover:text-primary">
                Kembali ke Beranda
            </a>
        </div>
    </header>
    
    <main class="pt-24 pb-32">
        <div class="container">

            <h1 class="font-bold text-5xl text-center text-white mb-12">Pst! Sukai ya</h1>

            <div class="flex justify-center">
                <div class="w-full bg-white flex rounded-md md:w-2/3 mb-9">
                    <div class="text-sm p-6">
                        <p class="mb-14 mt-3 text-center">
                            Pst! Sukai ya adalah media untuk melakukan <span class="font-bold">penilaian dan umpan balik pelayanan</span> yang didapatkan dari PST BPS Kab. Hulu Sungai Utara, <span class="font-bold">termasuk penggunaan Allstats BPS, berbagai macam website BPS, Portal Satu Data HSU (<a href="https://data.hsu.go.id" target="_blank" class="text-blue-500 underline italic">data.hsu.go.id</a>), dan pelayanan melalui Whatsapp.</span>
                        </p>
                        <p class="text-justify text-secondary border-t border-secondary pt-3">
                            Formulir ini disusun berdasarkan Permenpan RB No. 14/2017 tentang PEDOMAN PENYUSUNAN SURVEI KEPUASAN MASYARAKAT UNIT PENYELENGGARA PELAYANAN PUBLIK.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex">
                <button type="button" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-primary text-white py-2 mx-auto rounded-md w-full md:w-2/3 hover:shadow-lg">Mulai</button>
            </div>
            
        </div>
    </main>

</body>
</html>