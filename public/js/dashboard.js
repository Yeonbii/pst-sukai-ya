// DEKLRASI VARIABEL



// Hamburger dan Sidebar
const hamburger = document.querySelector('#hamburger');
const hamburger2 = document.querySelector('#hamburger-2');
const sidebar = document.querySelector('#sidebar');
const teksMenu = document.querySelectorAll('#sidebar span');
const main = document.querySelector('main');

// Tombol Admin
const adminButton = document.querySelector('#admin-button');
const adminMenu = document.querySelector('#admin-menu');
const adminIcon = document.querySelector('#admin-button i');

// Variabel yang akan digunakan untuk action pada tombol Contact
let isMenuSideClicked = false;


// FUNGSI



// Fungsi Lebar dan Kecilkan Sidebar
function luasSidebar() {
    if (!isMenuSideClicked) {
        hamburger.classList.toggle('hamburger-active-dashboard');
        sidebar.classList.toggle('md:w-[95px]');
        sidebar.classList.toggle('w-0');
        sidebar.classList.toggle('w-full');
        main.classList.toggle('expand-main');
        main.classList.toggle('contract-main');

        setTimeout(() => {
            teksMenu.forEach(function(element) {
                element.classList.toggle('hidden');
            });
        }, 200); // Tunggu sebentar sebelum menghilangkan hidden

        isMenuSideClicked = true;

    } else {

        teksMenu.forEach(function(element) {
            element.classList.toggle('hidden');
        });
        hamburger.classList.toggle('hamburger-active-dashboard');
        sidebar.classList.toggle('md:w-[95px]');
        sidebar.classList.toggle('w-0');
        sidebar.classList.toggle('w-full');
        main.classList.toggle('expand-main');
        main.classList.toggle('contract-main');

        isMenuSideClicked = false;
    }
}

// Fungsi tampil dan tutup Admin Option
function tampilanAdminOption() {
    adminIcon.classList.toggle('rotate-triangle');
    adminMenu.classList.toggle('hidden');
}



// PROSES



// Hamburger di-klik
hamburger.addEventListener('click', function() {
    luasSidebar();

    if (!adminMenu.classList.contains('hidden')) {
        tampilanAdminOption();
    }
});

hamburger2.addEventListener('click', function() {
    luasSidebar();

    if (!adminMenu.classList.contains('hidden')) {
        tampilanAdminOption();
    }
});

// Tombol Admin di-klik
adminButton.addEventListener('click', function() {
    tampilanAdminOption();

    if (hamburger.classList.contains('hamburger-active-dashboard')) {
        luasSidebar();
    }
});