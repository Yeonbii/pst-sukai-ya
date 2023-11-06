// DEKLARASI VARIABEL GLOBAL



const buttonClose = document.querySelector('#button-close');
const alertCard = document.querySelector('#alert-card');



// PROSES



buttonClose.addEventListener('click', function() {
    alertCard.classList.toggle('hidden');
});