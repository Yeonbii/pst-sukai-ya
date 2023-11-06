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
    <header class="navbar bg-dark absolute">
        <div class="container">
            <div class="center-y justify-between relative">
                <div class="px-4">
                    <a href="#home" class="navbar-home text-primary">
                        Pst! Sukai ya
                    </a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line animation origin-top-right"></span>
                        <span class="hamburger-line animation"></span>
                        <span class="hamburger-line animation origin-bottom-right"></span>
                    </button>
                    
                    <nav id="nav-menu" class="hidden navbar-menu">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#home" class="navbar-item">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="#pst" class="navbar-item">PST</a>
                            </li>
                            <li class="group">
                                <a href="#bps-hsu" class="navbar-item">BPS HSU</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="contact-menu" id="contact-area">
        <div class="hidden w-full" id="contacts">
            <ul>
                <!-- Email -->
                <li class="group opacity-0 contact-item">
                    <a href="#" class="contact-link group-hover:text-primary">Email <i class="fa-solid fa-at"></i></a>
                </li>
                <!-- WhatsApp -->
                <li class="group opacity-0 contact-item">
                    <a href="#" class="contact-link group-hover:text-primary">WhatsApp <i class="fa-brands fa-whatsapp"></i></a>
                </li>
                <!-- Telephone -->
                <li class="group opacity-0 contact-item">
                    <a href="#" class="contact-link group-hover:text-primary">Telephone <i class="fa-solid fa-phone-volume"></i></a>
                </li>                
            </ul>
        </div>

        <button class="button button-contact" id="contact">
            <span class="me-2">Hubungi kami?</span> 
            <span class="w-[25px] text-end">
                <span id="open-contact"><i class="fa-solid fa-phone-flip"></i></span>
                <span class="hidden" id="close-contact"><i class="fa-solid fa-xmark"></i></span>
            </span>
        </button>

    </div>
    <!-- Contact End -->

    <!-- Home Section Start-->
    <section id="home" class="section h-auto bg-dark lg:pb-52">
        <div class="container">
            <div class="flex flex-wrap">

                <!-- Kalimat Pembuka Start -->
                <div class="opening-home">
                    <h1 class="title-home">Pst! Sukai ya</h1>
                    <p class="desc-home">Media untuk melakukan penilaian dan umpan balik pelayanan yang didapatkan dari PST BPS Kab. Hulu Sungai Utara</p>
                    <a href="/login" class="button bg-primary py-3 px-8 rounded-md hover:shadow-lg">Yuk Isi Survey</a>
                </div>
                <!-- Kalimat Pembuka End -->

                <!-- Illustrasi Start -->
                <div class="illustration-home">
                    <div class="center-xy">
                        <img src="img/illustrasi/undraw_location_search_re_ttoj.svg" alt="Survey" width="400">                    
                    </div>
                </div>
                <!-- Illustrasi End -->

            </div>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- PST Section Start -->
    <section id="pst" class="section bg-light">
        <div class="container">

            <div class="w-full px-4">
                <div class="opening-section">
                    <h4 class="link-section">PST</h4>
                    <h2 class="title-section text-dark" data-aos="zoom-in">Pelayanan Statistik Terpadu</h2>
                    <p class="max-w-xl desc-section text-secondary" data-aos="zoom-in" data-aos-delay="300">Pemberian pelayanan data dan kegiatan statistik dari beberapa jenis pelayanan yang dilakukan secara terpadu melalui satu pintu oleh satu unit kerja sebagai penanggung jawab.</p>
                </div>
            </div>

            <div class="w-11/12 px-4 mx-auto">
                <div class="center-wrap">
                    
                    <!-- Perpustakaan Start -->
                    <div class="area-service" data-aos="fade-up" data-aos-delay="600">
                        <div class="group card-service">
                            <div class="illustration-service">
                                <img src="img/illustrasi/undraw_articles_wbpb.svg" alt="Library" width="120">
                            </div>
                            <div class="py-8 px-6">
                                <h3 class="title-service text-dark group-hover:text-primary">
                                    Perpustakaan
                                </h3>
                                <p class="body-service">Publikasi statistik terbitan BPS dari berbagai kategori: kependudukan, sosial, sosial ekonomi, pertanian, dan lain lain.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Perpustakaan End -->

                    <!-- Penjualan Start -->
                    <div class="area-service" data-aos="fade-up" data-aos-delay="600">
                        <div class="group card-service">
                            <div class="illustration-service">
                                <img src="img/illustrasi/undraw_business_deal_re_up4u.svg" alt="Sale" width="150">
                            </div>
                            <div class="py-8 px-6">
                                <h3 class="title-service text-dark group-hover:text-primary">
                                    Penjualan
                                </h3>
                                <p class="body-service">Layanan penjualan data mikro, publikasi elektronik, publikasi cetakan, dan peta digital wilkerstat.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Penjualan End -->

                    <!-- Konsultasi Start -->
                    <div class="area-service" data-aos="fade-up" data-aos-delay="600">
                        <div class="group card-service">
                            <div class="illustration-service">
                                <img src="img/illustrasi/undraw_conversation_re_c26v.svg" alt="Consultation" width="150">
                            </div>
                            <div class="py-8 px-6">
                                <h3 class="title-service text-dark group-hover:text-primary">
                                    Konsultasi
                                </h3>
                                <p class="body-service">Konsultasi terkait data, metadata, klasifikasi, dan produk statistik BPS lainnya.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Konsultasi End -->

                    <!-- Rekomendasi Start -->
                    <div class="area-service" data-aos="fade-up" data-aos-delay="600">
                        <div class="group card-service">
                            <div class="illustration-service">
                                <img src="img/illustrasi/undraw_online_collaboration_re_bkpm.svg" alt="Rekomendation" width="150">
                            </div>
                            <div class="py-8 px-6">
                                <h3 class="title-service text-dark group-hover:text-primary">
                                    Rekomendasi
                                </h3>
                                <p class="body-service">yaitu layanan bagi instansi pemerintah yang akan melakukan survei dan mengajukan rekomendasi kegiatan statistik.</p>
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
    <section id="bps-hsu" class="section bg-secondary">
        <div class="container">

            <div class="w-full px-4">
                <div class="opening-section">
                    <h4 class="link-section">BPS HSU</h4>
                    <h2 class="title-section text-light" data-aos="zoom-in">Badan Pusat Statistik Kabupaten Hulu Sungai Utara</h2>
                    <p class="max-w-3xl desc-section text-light" data-aos="zoom-in" data-aos-delay="300">Lembaga pemerintah di Kabupaten Hulu Sungai Utara, Kalimantan Selatan, yang mengkhususkan diri dalam pengumpulan, pengolahan, dan penyajian data statistik untuk mendukung perencanaan dan pengambilan keputusan di tingkat lokal.</p>

                    <div class="center-xy mt-16 mb-28" data-aos="fade-up" data-aos-delay="600">
                        <img src="img/Lambang_Badan_Pusat_Statistik_(BPS)_Indonesia.svg" alt="Logo BPS" width="200">
                    </div>

                    <a href="https://hulusungaiutarakab.bps.go.id/" class="button text-white bg-primary py-3 px-8 rounded-md hover:shadow-lg" target="_blank">
                        Official BPS HSU Website
                    </a>
                </div>
            </div>

            <div class="content-wrap pt-32">

                <!-- RSS Feeds Start -->
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="link-subsection">Kanal Media dan Informasi</h4>
                    <h2 class="title-v1-subsection" data-aos="fade-right">RSS Feeds</h2>
                    <p class="desc-subsection max-w-xl" data-aos="fade-right" data-aos-delay="300">Menyediakan pembaruan data statistik terkini Kabupaten Hulu Sungai Utara, memudahkan akses informasi bagi masyarakat dan pihak yang tertarik.</p>
                    
                    <!-- Icon Start -->
                    <div class="center-wrap text-light text-opacity-30">

                        <!-- Berita Resmi Statistik -->
                        <a href="https://hulusungaiutarakab.bps.go.id/site/rssbrs" target="_blank" class="link-to-v1-subsection" data-aos="fade-up" data-aos-delay="600" data-aos-anchor=".title-v1-subsection">
                            <i class="fa-solid fa-newspaper"></i>
                            <p class="text-base ms-3">Berita Resmi Statistik</p>   
                        </a>

                        <!-- Publikasi-->
                        <a href="https://hulusungaiutarakab.bps.go.id/site/rsspublikasi" target="_blank" class="link-to-v1-subsection" data-aos="fade-up" data-aos-delay="900" data-aos-anchor=".title-v1-subsection">
                            <i class="fa-regular fa-file-lines"></i>
                            <p class="text-base ms-3">Publikasi</p>   
                        </a>

                    </div>
                    <!-- End Icon End -->

                </div>
                <!-- RSS Feeds End -->

                <!-- Media Sosial Start -->
                <div class="w-full px-4 lg:w-1/2" data-aos="fade-up" data-aos-delay="1500">
                    <h3 class="title-v2-subsection">Media Sosial</h3>
                    <p class="desc-subsection">Platform interaktif untuk menyampaikan informasi statistik, berkomunikasi dengan masyarakat, dan memperkuat keterlibatan publik.</p>

                    <!-- Icon Start -->
                    <div class="center-y">

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/bpshsu" target="_blank" class="link-to-v2-subsection">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/bps_hsu" class="link-to-v2-subsection">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <!-- Twitter -->
                        <a href="https://twitter.com/bps_statistics" class="link-to-v2-subsection">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>

                        <!-- Youtube -->
                        <a href="https://www.youtube.com/c/BPSHSU" class="link-to-v2-subsection">
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
    <footer class="bg-dark pt-24 pb-12" id="footer">
        <div class="container">
            <div class="content-wrap">

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
                            <a href="mailto:bps6308@bps.go.id" target="_blank" class="link-to-from-footer">bps6308@bps.go.id</a>
                        </li>
                        <li>
                            <a href="mailto:bps6308@gmail.com" target="_blank" class="link-to-from-footer">bps6308@gmail.com</a>
                        </li>
                        <li>
                            <p class="link-to-from-footer cursor-pointer" id="copy-telepon">
                                <span id="no-telepon">+62 527 61049</span> (Telepon / Fax)
                            </p>
                        </li>                        
                    </ul>
                </div>

                <!-- Tautan -->
                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-white mb-5">Tautan</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#home" class="link-to-from-footer">Beranda</a>
                        </li>
                        <li>
                            <a href="#pst" class="link-to-from-footer">PST</a>
                        </li>
                        <li>
                            <a href="#bps-hsu" class="link-to-from-footer">BPS HSU</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="w-full pt-10 border-t border-slate-700" id="copyright">
                <!-- Icon Start -->
                <div class="flex items-center justify-center mb-5">

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/bpshsu" target="_blank" class="link-to-v2-subsection">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/bps_hsu" class="link-to-v2-subsection">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <!-- Twitter -->
                    <a href="https://twitter.com/bps_statistics" class="link-to-v2-subsection">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <!-- Youtube -->
                    <a href="https://www.youtube.com/c/BPSHSU" class="link-to-v2-subsection">
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