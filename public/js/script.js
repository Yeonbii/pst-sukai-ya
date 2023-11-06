// DECLRATION VARIABLE GLOBAL



// Hamburger
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
const menu = document.querySelectorAll('#nav-menu a');

// Contact
const contact = document.querySelector('#contact');
const contacts = document.querySelector('#contacts');
const contactText = document.querySelector('#contact span');
const openContact = document.querySelector('#open-contact');
const closeContact = document.querySelector('#close-contact');
const contactArea = document.querySelector('#contact-area');

// Foooter
const copyright = document.querySelector('#copyright');

// Teks Telepon / Fax pada footer
const copyTelepon = document.querySelector('#copy-telepon');

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

    // Ketika tombol Contact belum di-klik
    if (!isContactClicked) {
        hiddenContacts();
        isContactClicked = true;

        // Telephone
        setTimeout(() => {
            contacts.querySelector('li:nth-child(3)').classList.toggle('opacity-0');
        }, 100); // Tunggu 300ms sebelum menampilkan Telephone

        // WhatsApp
        setTimeout(() => {
            contacts.querySelector('li:nth-child(2)').classList.toggle('opacity-0');
        }, 200); // Tunggu 200ms sebelum menampilkan WhatsApp

        // Email
        setTimeout(() => {
            contacts.querySelector('li:nth-child(1)').classList.toggle('opacity-0');
        }, 300); // Tunggu 100ms sebelum menampilkan Email

    } else {
        // Ini ketika Tombol Contact sudah di-klik

        // Email
        setTimeout(() => {
            contacts.querySelector('li:nth-child(1)').classList.toggle('opacity-0');
        }, 100); // Tunggu 100ms sebelum menampilkan Email

        // WhatsApp
        setTimeout(() => {
            contacts.querySelector('li:nth-child(2)').classList.toggle('opacity-0');
        }, 200); // Tunggu 200ms sebelum menampilkan WhatsApp

        // Telephone
        setTimeout(() => {
            contacts.querySelector('li:nth-child(3)').classList.toggle('opacity-0');
        }, 300); // Tunggu 300ms sebelum menampilkan Telephone
        
        // Contacts
        setTimeout(() => {
            hiddenContacts();
        }, 400); // Tunggu 400ms sebelum menghilangkan element Contacts
        
        isContactClicked = false;
    }

    openContact.classList.toggle('hidden');
    closeContact.classList.toggle('hidden');
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

// Ketika Teks Telepon / Fax pada Footer di-klik
copyTelepon.addEventListener('click', function() {
    // Mengakses teks di dalam elemen span dengan id 'no-telepon'
    const teleponText = document.querySelector('#no-telepon').textContent;

    // Buat elemen textarea sementara
    const textarea = document.createElement('textarea');
    textarea.value = teleponText;

    // Tambahkan elemen textarea ke dokumen
    document.body.appendChild(textarea);

    // Pilih teks dalam elemen textarea
    textarea.select();

    // Salin teks ke clipboard
    document.execCommand('copy');

    // Hapus elemen textarea sementara
    document.body.removeChild(textarea);

    // Menginformasikan pengguna bahwa teks telah disalin
    alert('Nomor telah disalin');
});