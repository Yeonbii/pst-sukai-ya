<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
</head>
<body>
    
    <!-- Header Start -->
    <header class="top-0 left-0 w-full flex items-center z-10 bg-dark absolute">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#home" class="font-bold text-lg block py-6 text-primary">
                        Pst! Sukai ya
                    </a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-right"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-right"></span>
                    </button>
                    
                    <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg w-full right-0 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#home" class="text-base text-dark py-2 mx-8 flex lg:text-light group-hover:text-primary">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="#pst" class="text-base text-dark py-2 mx-8 flex lg:text-light group-hover:text-primary">PST</a>
                            </li>
                            <li class="group">
                                <a href="#bps-hsu" class="text-base text-dark py-2 mx-8 flex lg:text-light group-hover:text-primary">BPS HSU</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Contact Start -->
    <div id="contact-area" class="fixed right-4 bottom-10 lg:right-36 z-10">
        <button id="contact" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out text-white bg-primary py-3 px-4 shadow-lg rounded-full flex justify-between items-center">
            <span class="me-2">Hubungi kami?</span> 
            <span class="w-[25px] text-end">
                <i class="fa-solid fa-phone-flip"></i>
            </span>
        </button>
    </div>
    <!-- Contact End -->

    {{-- Contact Options Start --}}
    <div id="contact-options" class="fixed z-[99] inset-0 bg-black bg-opacity-50 hidden p-4">
        <div class="bg-white w-full max-w-sm m-auto rounded-md p-3">
            <ul>
                <!-- Email -->
                <li class="group my-1 transition-opacity duration-300">
                    <div class="text-lg font-semibold py-3 px-4 flex justify-between items-center group-hover:text-primary">
                        <div>
                            <p class="text-base text-dark group-hover:text-primary">Email</p>
                            <p class="text-sm font-normal text-slate-400"><a href="mailto:bps6308@bps.go.id" class="hover:underline" target="_blank">bps6308@bps.go.id</a>, <a href="mailto:bps6308@gmail.com" class="hover:underline" target="_blank">bps6308@gmail.com</a></p>
                        </div> 
                        <i class="fa-solid fa-at"></i>
                    </div>
                </li>

                <!-- WhatsApp -->
                <li class="group my-1 transition-opacity duration-300">
                    <div class="text-lg font-semibold py-3 px-4 flex justify-between items-center group-hover:text-primary">
                        <div>
                            <p class="text-base text-dark group-hover:text-primary">WhatsApp</p>
                            <p class="text-sm font-normal text-slate-400"><a href="https://wa.me/6281917075877" class="hover:underline" target="_blank">wa.me/6281917075877</a></p>
                        </div> 
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                </li>

                <!-- Telephone -->
                <li class="group my-1 transition-opacity duration-300">
                    <div class="text-lg font-semibold py-3 px-4 flex justify-between items-center group-hover:text-primary">
                        <div>
                            <p class="text-base text-dark group-hover:text-primary">Telephone/Fax</p>
                            <p class="text-sm font-normal text-slate-400">0527 61049</p>
                        </div> 
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                </li>

            </ul>

            <div id="close-contact" class="text-base font-semibold text-white bg-primary rounded-md py-2 flex justify-center items-center hover:bg-opacity-70 duration-300 cursor-pointer">Tutup</div>

        </div>
    </div>
    {{-- Contact Options End --}}

    <!-- Home Section Start-->
    <section id="home" class="pt-36 pb-32 h-auto bg-dark lg:pb-52">
        <div class="container">
            <div class="flex flex-wrap">

                <!-- Kalimat Pembuka Start -->
                <div class="w-full text-white text-center self-center px-4 lg:w-1/2 lg:text-left">
                    <h1 class="font-bold text-4xl mb-5 md:text-5xl">Pst! Sukai ya</h1>
                    <p class="text-base mb-10 leading-relaxed">Media untuk melakukan penilaian dan umpan balik pelayanan yang didapatkan dari PST BPS Kab. Hulu Sungai Utara</p>
                    <a href="/form" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out bg-primary py-3 px-8 rounded-md hover:shadow-lg">Yuk Isi Survey</a>
                </div>
                <!-- Kalimat Pembuka End -->

                <!-- Illustrasi Start -->
                <div class="w-full self-end py-12 px-4 lg:w-1/2">
                    <div class="flex justify-center items-center">
                        <img src="img/illustrasi/undraw_location_search_re_ttoj.svg" alt="Survey" width="400">                    
                    </div>
                </div>
                <!-- Illustrasi End -->

            </div>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- PST Section Start -->
    <section id="pst" class="pt-36 pb-32 bg-light">
        <div class="container">

            <div class="w-full px-4">
                <div class="text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">PST</h4>
                    <h2 class="font-bold text-3xl mb-4 sm:text-4xl lg:text-5xl text-dark" data-aos="zoom-in">Pelayanan Statistik Terpadu</h2>
                    <p class="max-w-xl mx-auto font-medium text-base md:text-lg text-secondary" data-aos="zoom-in" data-aos-delay="300">Pemberian pelayanan data dan kegiatan statistik dari beberapa jenis pelayanan yang dilakukan secara terpadu melalui satu pintu oleh satu unit kerja sebagai penanggung jawab.</p>
                </div>
            </div>

            <div class="w-11/12 px-4 mx-auto">
                <div class="flex flex-wrap items-center">
                    
                    <!-- Perpustakaan Start -->
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/4" data-aos="fade-up" data-aos-delay="600">
                        <div class="group bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                            <div class="w-full bg-secondary flex justify-center items-center h-[200px]">
                                <img src="img/illustrasi/undraw_articles_wbpb.svg" alt="Library" width="120">
                            </div>
                            <div class="py-8 px-6">
                                <h3 class="mb-3 font-semibold text-xl text-dark group-hover:text-primary">
                                    Perpustakaan
                                </h3>
                                <p class="font-medium text-base text-secondary text-opacity-50 mb-6 h-[100px]">Publikasi statistik terbitan BPS dari berbagai kategori: kependudukan, sosial, sosial ekonomi, pertanian, dan lain lain.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Perpustakaan End -->

                    <!-- Penjualan Start -->
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/4" data-aos="fade-up" data-aos-delay="600">
                        <div class="group bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                            <div class="w-full bg-secondary flex justify-center items-center h-[200px]">
                                <img src="img/illustrasi/undraw_business_deal_re_up4u.svg" alt="Sale" width="150">
                            </div>
                            <div class="py-8 px-6">
                                <h3 class="mb-3 font-semibold text-xl text-dark group-hover:text-primary">
                                    Penjualan
                                </h3>
                                <p class="font-medium text-base text-secondary text-opacity-50 mb-6 h-[100px]">Layanan penjualan data mikro, publikasi elektronik, publikasi cetakan, dan peta digital wilkerstat.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Penjualan End -->

                    <!-- Konsultasi Start -->
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/4" data-aos="fade-up" data-aos-delay="600">
                        <div class="group bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                            <div class="w-full bg-secondary flex justify-center items-center h-[200px]">
                                <img src="img/illustrasi/undraw_conversation_re_c26v.svg" alt="Consultation" width="150">
                            </div>
                            <div class="py-8 px-6">
                                <h3 class="mb-3 font-semibold text-xl text-dark group-hover:text-primary">
                                    Konsultasi
                                </h3>
                                <p class="font-medium text-base text-secondary text-opacity-50 mb-6 h-[100px]">Konsultasi terkait data, metadata, klasifikasi, dan produk statistik BPS lainnya.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Konsultasi End -->

                    <!-- Rekomendasi Start -->
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/4" data-aos="fade-up" data-aos-delay="600">
                        <div class="group bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                            <div class="w-full bg-secondary flex justify-center items-center h-[200px]">
                                <img src="img/illustrasi/undraw_online_collaboration_re_bkpm.svg" alt="Recommendation" width="150">
                            </div>
                            <div class="py-8 px-6">
                                <h3 class="mb-3 font-semibold text-xl text-dark group-hover:text-primary">
                                    Rekomendasi
                                </h3>
                                <p class="font-medium text-base text-secondary text-opacity-50 mb-6 h-[100px]">yaitu layanan bagi instansi pemerintah yang akan melakukan survei dan mengajukan rekomendasi kegiatan statistik.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Rokemendasi End -->
                </div>
            </div>

        </div>
    </section>
    <!-- PST Section End -->

    <!-- BPS HSU Section Start -->
    <section id="bps-hsu" class="pt-36 pb-32 bg-secondary">
        <div class="container">

            <div class="w-full px-4">
                <div class="text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">BPS HSU</h4>
                    <h2 class="font-bold text-3xl mb-4 sm:text-4xl lg:text-5xl text-light" data-aos="zoom-in">Badan Pusat Statistik Kabupaten Hulu Sungai Utara</h2>
                    <p class="max-w-3xl mx-auto font-medium text-base md:text-lg text-light" data-aos="zoom-in" data-aos-delay="300">Lembaga pemerintah di Kabupaten Hulu Sungai Utara, Kalimantan Selatan, yang mengkhususkan diri dalam pengumpulan, pengolahan, dan penyajian data statistik untuk mendukung perencanaan dan pengambilan keputusan di tingkat lokal.</p>

                    <div class="flex justify-center items-center mt-16 mb-28" data-aos="fade-up" data-aos-delay="600">
                        <img src="img/Lambang_Badan_Pusat_Statistik_(BPS)_Indonesia.svg" alt="Logo BPS" width="200">
                    </div>

                    <a href="https://hulusungaiutarakab.bps.go.id/" class="text-base font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out text-white bg-primary py-3 px-8 rounded-md hover:shadow-lg" target="_blank">
                        Official BPS HSU Website
                    </a>
                </div>
            </div>

            <div class="flex flex-wrap pt-32">

                <!-- RSS Feeds Start -->
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">Kanal Media dan Informasi</h4>
                    <h2 class="rss-feeds font-bold text-white text-3xl mb-3 max-w-md lg:text-4xl" data-aos="fade-right">RSS Feeds</h2>
                    <p class="font-medium text-base text-light mb-6 lg:text-lg max-w-xl" data-aos="fade-right" data-aos-delay="300">Menyediakan pembaruan data statistik terkini Kabupaten Hulu Sungai Utara, memudahkan akses informasi bagi masyarakat dan pihak yang tertarik.</p>
                    
                    <!-- Icon Start -->
                    <div class="flex flex-wrap items-center text-light text-opacity-30">

                        <!-- Berita Resmi Statistik -->
                        <a href="https://hulusungaiutarakab.bps.go.id/site/rssbrs" target="_blank" class="w-full max-w-[250px] h-9 px-4 mr-3 mb-3 rounded-md flex items-center text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white" data-aos="fade-up" data-aos-delay="600" data-aos-anchor=".rss-feeds">
                            <i class="fa-solid fa-newspaper"></i>
                            <p class="text-base ms-3">Berita Resmi Statistik</p>   
                        </a>

                        <!-- Publikasi-->
                        <a href="https://hulusungaiutarakab.bps.go.id/site/rsspublikasi" target="_blank" class="w-full max-w-[250px] h-9 px-4 mr-3 mb-3 rounded-md flex items-center text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white" data-aos="fade-up" data-aos-delay="900" data-aos-anchor=".rss-feeds">
                            <i class="fa-regular fa-file-lines"></i>
                            <p class="text-base ms-3">Publikasi</p>   
                        </a>

                    </div>
                    <!-- End Icon End -->

                </div>
                <!-- RSS Feeds End -->

                <!-- Media Sosial Start -->
                <div class="w-full px-4 lg:w-1/2" data-aos="fade-up" data-aos-delay="1500">
                    <h3 class="font-semibold text-white text-2xl mb-4 lg:text-3xl lg:pt-10">Media Sosial</h3>
                    <p class="font-medium text-base text-light mb-6 lg:text-lg">Platform interaktif untuk menyampaikan informasi statistik, berkomunikasi dengan masyarakat, dan memperkuat keterlibatan publik.</p>

                    <!-- Icon Start -->
                    <div class="flex items-center">

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/bpshsu" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-light text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/bps_hsu" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-light text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <!-- Twitter -->
                        <a href="https://twitter.com/bps_statistics" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-light text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>

                        <!-- Youtube -->
                        <a href="https://www.youtube.com/c/BPSHSU" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-light text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white">
                            <i class="fa-brands fa-youtube"></i>
                        </a>

                    </div>
                    <!-- Icon End -->

                </div>
                <!-- Media Sosial End -->
            </div>

        </div>
    </section>
    <!-- BPS HSU Section End -->

    <!-- Footer Start -->
    <footer  id="footer" class="bg-dark pt-24 pb-12">
        <div class="container">
            <div class="flex flex-wrap">

                <!-- Alamat -->
                <div class="w-full px-4 mb-12 text-slate-300 font-medium md:w-1/3">
                    <h2 class="font-bold text-4xl text-white mb-5">BPS HSU</h2>
                    <h3 class="font-bold text-2xl mb-2">Alamat</h3>
                    <p>Jl. H. Saberan Effendi RT 3 Amuntai,</p>
                    <p>71418 Indonesia</p>
                </div>

                <!-- Kontak -->
                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-white mb-5">Kontak</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="mailto:bps6308@bps.go.id" target="_blank" class="inline-block text-base mb-3 hover:text-primary">bps6308@bps.go.id</a>
                        </li>
                        <li>
                            <a href="mailto:bps6308@gmail.com" target="_blank" class="inline-block text-base mb-3 hover:text-primary">bps6308@gmail.com</a>
                        </li>
                        <li>
                            <p class="inline-block text-base mb-3 hover:text-primary cursor-pointer">
                                +62 527 61049 (Telepon / Fax)
                            </p>
                        </li>                        
                    </ul>
                </div>

                <!-- Tautan -->
                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-white mb-5">Tautan</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#home" class="inline-block text-base mb-3 hover:text-primary">Beranda</a>
                        </li>
                        <li>
                            <a href="#pst" class="inline-block text-base mb-3 hover:text-primary">PST</a>
                        </li>
                        <li>
                            <a href="#bps-hsu" class="inline-block text-base mb-3 hover:text-primary">BPS HSU</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div  id="copyright" class="w-full pt-10 border-t border-slate-700">
                <!-- Icon Start -->
                <div class="flex items-center justify-center mb-5">

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/bpshsu" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-light text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/bps_hsu" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-light text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <!-- Twitter -->
                    <a href="https://twitter.com/bps_statistics" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-light text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <!-- Youtube -->
                    <a href="https://www.youtube.com/c/BPSHSU" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-light text-opacity-30 border border-light border-opacity-30 hover:border-primary hover:bg-primary hover:text-white">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                </div>
                <!-- Icon End -->

                <!-- Untuk tulisan COPYRIGT, sementara itu dulu :) -->
                <p class="font-medium text-[0.75rem] text-slate-500 text-center">Dibuat dengan <span class="font-semibold text-primary">╰(*°▽°*)╯</span> menggunakan <a href="https://tailwindcss.com" target="_blank" class="font-bold text-sky-500">Tailwind CSS</a>.</p>

            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Fontawesome Icon -->
    <script src="https://kit.fontawesome.com/fffa6787c5.js" crossorigin="anonymous"></script>
    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- My JS -->
    <script src="js/script.js"></script>
</body>
</html>