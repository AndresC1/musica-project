'use strict'

const btnNavegacion = document.querySelector('#btnNavbar')
const listDatos = document.querySelector('#listRoute')

btnNavegacion.addEventListener('click', ()=>{
    listDatos.classList.contains('hidden') 
    ? listDatos.classList.remove('hidden')
    : listDatos.classList.add('hidden')
})