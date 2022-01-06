/**
 * Variables de la página
 */
let email = document.querySelector("#email");
let formMensaje = document.querySelector("#form-mensaje");
let links = document.querySelectorAll(".container nav ul li a");
let mensaje = document.querySelector("#mensaje");
let nombre = document.querySelector("#nombre");
let telefono = document.querySelector("#telefono");

/**
 * Evento 'keypress' en el input 'nombre'
 * se valida que la tecla que se presionó corresponda a la de una
 * letra, espacio o retroceso, con el fin de evitar que se ingresen
 * carácteres especiales o números donde debe ir sólo el nombre.
 */
nombre.addEventListener('keypress', (e) => {
    let key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if(!patronLetras.test(key)){
        e.preventDefault();
        return false;
    }
});

/**
 * Evento 'keypress' en el input 'telefono'
 * se valida que la tecla que se presionó corresponda a la de un
 * número o la tecla de retroceso, con el fin de evitar que se ingresen
 * carácteres especiales o letras donde debe ir sólo el teléfono.
 */
telefono.addEventListener('keypress', (e) => {
    let key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if(!patronNumeros.test(key)){
        e.preventDefault();
        return false;
    }
});

/**
 * Se previene el 'submit' del formulario
 * Luego se validan los campos del formulario, si se detecta un error
 * se manda un alerta al usuario, si todos los campos están llenados
 * correctamente, se mandan los datos por AJAX
 */
formMensaje.addEventListener('submit', (e) => {
    // Se previene el submit
    e.preventDefault();

    // Se evaluan los campos del formulario
    if (!evalText(nombre.value.trim(), 10))
    {
        modalOpen('¡Atención!', 'El campo nombre debe tener 10 carácteres por lo menos.', true, 'ENTENDIDO', false, '');
        return;
    }

    if (!evalText(telefono.value.trim(), 10))
    {
        modalOpen('¡Atención!', 'El número de teléfono debe tener 10 dígitos.', true, 'ENTENDIDO', false, '');
        return;
    }

    if (!evalEmail(email.value.trim()))
    {
        modalOpen('¡Atención!', 'Ingrese una dirección válida de correo electrónico..', true, 'ENTENDIDO', false, '');
        return;
    }

    if (!evalText(mensaje.value.trim(), 10))
    {
        modalOpen('¡Atención!', 'El mensaje debe tener 10 carácteres por lo menos.', true, 'ENTENDIDO', false, '');
        return;
    }

    let httpRequest = new XMLHttpRequest();
    let formData = new FormData();

    formData.append('nombre', nombre.value);
    formData.append('telefono', telefono.value);
    formData.append('email', email.value);
    formData.append('mensaje', mensaje.value);

    httpRequest.onreadystatechange = function(){
        if ( this.readyState === 4 )
        {
            if ( this.status === 200 )
            {
                console.log(this.responseText);
                nombre.value = '';
                telefono.value = '';
                email.value = '';
                mensaje.value = '';
            }
            else
            {
                console.log("Error: ", this.statusText);
            }
        }
    }

    httpRequest.open('POST', formMensaje.getAttribute('action'), true);
    httpRequest.send(formData);
});

/**
 * EFECTO SMOOTH SCROLL
 * Al dar clic en cualquiera de los enlaces se aplicará este efecto
 * para moverse a la sección correspondiente con un efecto suave
 */
links.forEach((link) => {
    link.addEventListener('click', function(e){
        e.preventDefault();
        const href = this.getAttribute("href");
        const offsetTop = document.querySelector(href).offsetTop;

        scroll({
            top: offsetTop,
            behavior: "smooth"
        });
    })
});

/* ====== AGREGAR GOOGLE MAP ===== */
/**
 * Función para cargar el mapa de google maps
 * en el elemento con el id 'map'
 */
function initMap(){
    const latLon = {
        lat: 25.871447,
        lng: -97.501456
    };

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 16,
        center: latLon
    });

    new google.maps.Marker({
        position: latLon,
        map,
        title: 'Instalaciones DISH Matamoros'
    });
}