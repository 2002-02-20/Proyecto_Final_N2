const agregarMaestro = document.querySelector('.createTeachers');
const btnCerrar = document.querySelector('#btnCerrar');


btnCerrar.addEventListener('click', () => {
    agregarMaestro.classList.add('displayNone');
});
