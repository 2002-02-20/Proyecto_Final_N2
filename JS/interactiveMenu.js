const menuInteractive = document.querySelector('.ulNavInteractive');
const btnActive = document.querySelector('.btnAdministrador');
const perfil = document.querySelector('.liPerfil');
const logout = document.querySelector('.liLogout');

btnActive.addEventListener('click', () => {
    menuInteractive.classList.toggle('displayBlock');
});

perfil.addEventListener('mouseover', () => {
    perfil.classList.add('mouseColorNav');
    logout.classList.remove('mouseColorNav');

})

logout.addEventListener('mouseover', () => {
    logout.classList.add('mouseColorNav');
    perfil.classList.remove('mouseColorNav');

})

