// DECLRATION VARIABLE GLOBAL



// Hamburger
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
const menu = document.querySelectorAll('#nav-menu a');

// Contact
const contact = document.querySelector('#contact');
const contactArea = document.querySelector('#contact-area');
const contactOptions = document.querySelector('#contact-options');
const closeContact = document.querySelector('#close-contact');

// Foooter
const copyright = document.querySelector('#copyright');


// Variabel yang akan digunakan untuk action pada tombol Contact
let isContactClicked = false;



// FUNGSI



// Fungsi untuk menambah dan menghilangkan class Hidden pada Contacs (Email, WA, Telp)
function hiddenContacts() {
    contacts.classList.toggle('hidden');
}



// PROSES



// Fungsi yang berhubungan dengan Scroll Layar
window.onscroll = function() {

    // Untuk Perubahan Nav
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop; // Memasukkan nilai berupa jarak bagian atas Web hingga tepi atas elemen header

    // Untuk Perubahan Posisi Tombol Kontak
    const copyrightPosition = copyright.offsetTop; // nilai jarak bagian atas Web hingga tepi atas elemen copyright
    
    // Mendeteksi posisi scroll (nilai nya berupa jarak bagian atas Web hingga tepi atas layar saat ini)
    const scrollPosition = window.pageYOffset;

    // Mendapatkan tinggi layar (viewport height)
    const viewportHeight = window.innerHeight;

    // Perubahan Nav
    if (scrollPosition > fixedNav) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }

    if ((scrollPosition + viewportHeight) >= copyrightPosition ) {
        contactArea.classList.add('hidden');
    } else {
        contactArea.classList.remove('hidden');
    }
}


// Ketika Contact di-klik
contact.addEventListener('click', function() {
    contactOptions.classList.remove('hidden');
    contactOptions.classList.add('flex');
    document.body.classList.add('overflow-hidden');
});

// Mentutup Contact Area
closeContact.addEventListener('click', function() {
    contactOptions.classList.add('hidden');
    contactOptions.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
});

// Tombol Menu (Hamburger) di-klik
hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});

// Menutup navMenu ketika salah satu Menu di klik
menu.forEach(function(element) {
    element.addEventListener('click', function() {
        if (!navMenu.classList.contains('hidden')) {
            hamburger.classList.toggle('hamburger-active');
            navMenu.classList.add('hidden');
        }
    });
});