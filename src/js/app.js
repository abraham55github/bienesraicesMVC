document.addEventListener('DOMContentLoaded', function(){
    evenListeners();

    darkMode();
});

function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else{
            document.body.classList.remove('dark-mode');
        }
    })

    const botonDarkMOde = document.querySelector('.dark-mode-boton');
    botonDarkMOde.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    })
}

function evenListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
    
    //Muestra campos condicionales

    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContactos));

}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    } else{
        navegacion.classList.add('mostrar');
    }
}

function mostrarMetodosContactos(e){
    const contactoDiv = document.querySelector('#contacto')

    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
            <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

            <p>Elija la fecha y la hora para la llamada</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else {
        contactoDiv.innerHTML = `
           
            <input type="email" placeholder="Tu email" id="email" name="contacto[email]" >
        `;
    }
    console.log(e);
}


