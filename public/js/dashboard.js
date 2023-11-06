// DEKLRASI VARIABEL



// Hamburger dan Sidebar
const hamburger = document.querySelector('#hamburger');
const sidebar = document.querySelector('#sidebar');
const teksMenu = document.querySelectorAll('#sidebar span');
const main = document.querySelector('main');

// Tombol Admin
const adminButton = document.querySelector('#admin-button');
const adminMenu = document.querySelector('#admin-menu');
const adminIcon = document.querySelector('#admin-button i');



// FUNGSI



// Fungsi Lebar dan Kecilkan Sidebar
function luasSidebar() {
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

// Tombol Admin di-klik
adminButton.addEventListener('click', function() {
    tampilanAdminOption();

    if (hamburger.classList.contains('hamburger-active-dashboard')) {
        luasSidebar();
    }
});

// Test Modal
const openModal = document.getElementById('openModal');
const closeModal = document.getElementById('closeModal');
const modal = document.getElementById('myModal');

openModal.addEventListener('click', function() {
  modal.classList.remove('hidden');
});

closeModal.addEventListener('click', function() {
  modal.classList.add('hidden');
});

// Event listener untuk menutup modal saat wilayah di luar modal content diklik
document.addEventListener('click', function(event) {
    if (event.target === modal) {
      modal.classList.add('hidden');
    }
});

// Test Tombol Bulan
const changeMonthButton = document.getElementById('changeMonthButton');
const monthYearPicker = document.getElementById('monthYearPicker');
const monthSelect = document.getElementById('monthSelect');
const yearSelect = document.getElementById('yearSelect');
const applyMonthYearButton = document.getElementById('applyMonthYearButton');

changeMonthButton.addEventListener('click', () => {
    monthYearPicker.classList.toggle('hidden');
});

applyMonthYearButton.addEventListener('click', () => {
    const selectedMonth = monthSelect.value;
    const selectedYear = yearSelect.value;
    changeMonthButton.textContent = `${getMonthName(selectedMonth)} ${selectedYear}`;
    monthYearPicker.classList.add('hidden');
});

function getMonthName(month) {
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    return monthNames[parseInt(month, 10) - 1];
}