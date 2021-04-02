
document.addEventListener('DOMContentLoaded', function (){
    eventListeners();
    darkMode();
})


function eventListeners(){

    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click',mostrarMenu);

}

function mostrarMenu(){

    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar'); //si esta la clase la quita, si no  la agrega

}

function darkMode(){

    const botondarkMode = document.querySelector('.dark-mode-boton');
    const preferenciaMode = window.matchMedia('(prefers-color-scheme: dark)');  //ver si tiene por defecto el dark mode
    
    if(preferenciaMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    preferenciaMode.addEventListener('change',function(){
        if(preferenciaMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    })

    botondarkMode.addEventListener('click', function (){
        document.body.classList.toggle('dark-mode');
    })
}