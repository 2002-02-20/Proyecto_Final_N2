const btn = document.querySelector('.btnAdministrador');
const menu = document.querySelector('.ulNavInteractive');

btn.addEventListener('click', () =>{
    menu.classList.toggle('displayblock')
});