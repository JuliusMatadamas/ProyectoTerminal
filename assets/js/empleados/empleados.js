let nombre = document.querySelector("#nombre");
let nombreFeedback = document.querySelector("#nombre-feedback");
let apellidoPaterno = document.querySelector("#apellido_paterno");
let apellidoPaternoFeedback = document.querySelector("#apellido_paterno-feedback");
let apellidoMaterno = document.querySelector("#apellido_materno");
let apellidoMaternoFeedback = document.querySelector("#apellido_materno-feedback");
let fechaNacimiento = document.querySelector("#fecha_nacimiento");
let fechaNacimientoFeedback = document.querySelector("#fecha_nacimiento-feedback");
let sexo = document.querySelector("#sexo");
let sexoFeedback = document.querySelector("#sexo-feedback");
let codigoPostal = document.querySelector("#codigo_postal");
let codigoPostalFeedback = document.querySelector("#codigo_postal-feedback");
let estado = document.querySelector("#estado");
let estadoFeedback = document.querySelector("#estado-feedback");
let municipio = document.querySelector("#municipio");
let municipioFeedback = document.querySelector("#municipio-feedback");
let asentamientoId = document.querySelector("#asentamiento_id");
let asentamientoIdFeedback = document.querySelector("#asentamiento_id-feedback");
let domicilio = document.querySelector("#domicilio");
let domicilioFeedback = document.querySelector("#domicilio-feedback");
let email = document.querySelector("#email");
let emailFeedback = document.querySelector("#email-feedback");
let telefono = document.querySelector("#telefono");
let telefonoFeedback = document.querySelector("#telefono-feedback");
let limit = false;

nombre.addEventListener('keypress', (e)=>{
    let exreg = /^[a-z áéíóúñüàè]+$/i;
    if(!exreg.test(e.key))
    {
        e.preventDefault();
    }
    else
    {
        nombre.classList.remove('invalid');
        nombreFeedback.classList.remove('text-danger');
        nombreFeedback.innerHTML = '';
    }
})

apellidoPaterno.addEventListener('keypress', (e)=>{
    let exreg = /^[a-z áéíóúñüàè]+$/i;
    if(!exreg.test(e.key))
    {
        e.preventDefault();
    }
    else
    {
        apellidoPaterno.classList.remove('invalid');
        apellidoPaternoFeedback.classList.remove('text-danger');
        apellidoPaternoFeedback.innerHTML = '';
    }
})

apellidoMaterno.addEventListener('keypress', (e)=>{
    let exreg = /^[a-z áéíóúñüàè]+$/i;
    if(!exreg.test(e.key))
    {
        e.preventDefault();
    }
    else
    {
        apellidoMaterno.classList.remove('invalid');
        apellidoMaternoFeedback.classList.remove('text-danger');
        apellidoMaternoFeedback.innerHTML = '';
    }
})

fechaNacimiento.addEventListener('change', ()=>{
    fechaNacimiento.classList.remove('invalid');
    fechaNacimientoFeedback.classList.remove('text-danger');
    fechaNacimientoFeedback.innerHTML = '';
})

sexo.addEventListener('change', ()=>{
    sexo.classList.remove('invalid');
    sexoFeedback.classList.remove('text-danger');
    sexoFeedback.innerHTML = '';
})

codigoPostal.addEventListener('keypress', (e)=>{
    let exreg = /^[0-9\s]*$/;
    if(!exreg.test(e.key))
    {
        e.preventDefault();
    }
    else
    {
        codigoPostal.classList.remove('invalid');
        codigoPostalFeedback.classList.remove('text-danger');
        codigoPostalFeedback.innerHTML = '';
    }
})
codigoPostal.addEventListener('keyup', ()=>{
    if(codigoPostal.value.trim().length == 5)
    {
        let httpRequest = new XMLHttpRequest();
        let formData = new FormData();

        formData.append('codigo_postal', codigoPostal.value);

        httpRequest.onreadystatechange = function(){
            if ( this.readyState === 4 )
            {
                if ( this.status === 200 )
                {
                    let res = JSON.parse(this.responseText);
                    if(!res)
                    {
                        codigoPostal.classList.add('invalid');
                        codigoPostalFeedback.classList.add('text-danger');
                        codigoPostalFeedback.innerHTML = 'El código postal no corresponde a Tamaulipas.';
                    }
                    else
                    {
                        codigoPostal.classList.remove('invalid');
                        codigoPostalFeedback.classList.remove('text-danger');
                        codigoPostalFeedback.innerHTML = '';

                        if (!limit)
                        {
                            estado.value = res[0]["estado"];
                            municipio.value = res[0]["municipio"];
                            for (r in res)
                            {
                                let o = document.createElement("option");
                                o.value = res[r]["id"];
                                o.innerHTML = res[r]["nombre"];
                                asentamientoId.appendChild(o);
                            }
                            limit = true;
                        }
                    }
                }
            }
        }
        httpRequest.open('POST', '/asentamientos/api', true);
        httpRequest.onerror = () => {
            console.log("Ocurrió un error durante la transacción.");
        };
        httpRequest.send(formData);
    }
    else
    {
        estado.value = '';
        municipio.value = '';
        let options = asentamientoId.children;
        if(options.length > 1)
        {
            let i = options.length - 1;
            for (let i = options.length - 1; i > 0; i--)
            {
                asentamientoId.removeChild(options[i]);
            }
            limit = false;
        }
    }
})

domicilio.addEventListener('keypress', (e)=>{
    domicilio.classList.remove('invalid');
    domicilioFeedback.classList.remove('text-danger');
    domicilioFeedback.innerHTML = '';
})

email.addEventListener('keypress', (e)=>{
    email.classList.remove('invalid');
    emailFeedback.classList.remove('text-danger');
    emailFeedback.innerHTML = '';
})

telefono.addEventListener('keypress', (e)=>{
    let exreg = /^[0-9\s]*$/;
    if(!exreg.test(e.key))
    {
        e.preventDefault();
    }
    else
    {
        telefono.classList.remove('invalid');
        telefonoFeedback.classList.remove('text-danger');
        telefonoFeedback.innerHTML = '';
    }
})

function evalForm(e, f)
{
    e.preventDefault();

    let formSubmit = document.querySelector('button[type="submit"]')

    // VALIDACIÓN DEL CAMPO 'nombre'
    if (nombre.value.trim().length == 0)
    {
        nombre.focus();
        nombre.classList.add('invalid');
        nombreFeedback.classList.add('text-danger');
        nombreFeedback.innerHTML = 'El nombre del empleado es requerido y no puede estar en blanco.';
        return;
    }

    // VALIDACIÓN DEL CAMPO 'apellido_paterno'
    if (apellidoPaterno.value.trim().length == 0)
    {
        apellidoPaterno.focus();
        apellidoPaterno.classList.add('invalid');
        apellidoPaternoFeedback.classList.add('text-danger');
        apellidoPaternoFeedback.innerHTML = 'El apellido paterno del empleado es requerido y no puede estar en blanco.';
        return;
    }

    // VALIDACIÓN DEL CAMPO 'apellido_materno'
    if (apellidoMaterno.value.trim().length == 0)
    {
        apellidoMaterno.focus();
        apellidoMaterno.classList.add('invalid');
        apellidoMaternoFeedback.classList.add('text-danger');
        apellidoMaternoFeedback.innerHTML = 'El apellido materno del empleado es requerido y no puede estar en blanco.';
        return;
    }

    // VALIDACIÓN DEL CAMPO 'fecha_nacimiento'
    if (fechaNacimiento.value.trim().length == 0)
    {
        fechaNacimiento.focus();
        fechaNacimiento.classList.add('invalid');
        fechaNacimientoFeedback.classList.add('text-danger');
        fechaNacimientoFeedback.innerHTML = 'La fecha de nacimiento del empleado es requerida.';
        return;
    }
    else
    {
        let today = new Date();
        let fn = fechaNacimiento.value.split('-');
        let birthday = new Date(fn[0], parseInt(fn[1])-1, parseInt(fn[2]));
        let diff = today.getTime() - birthday.getTime();
        if ( Math.ceil(diff / (1000 * 3600 * 24)) <= 6574 )
        {
            fechaNacimiento.focus();
            fechaNacimiento.classList.add('invalid');
            fechaNacimientoFeedback.classList.add('text-danger');
            fechaNacimientoFeedback.innerHTML = 'Según la fecha ingresada, el empleado es menor de edad aún y no puede ser contratado.';
            return;
        }
    }

    // VALIDACIÓN DEL CAMPO 'sexo'
    if (sexo.value == 0)
    {
        sexo.focus();
        sexo.classList.add('invalid');
        sexoFeedback.classList.add('text-danger');
        sexoFeedback.innerHTML = 'Seleccione el sexo del empleado.';
        return;
    }

    // VALIDACIÓN DEL CAMPO 'codigo_postal'
    if (codigoPostal.value.trim().length == 0)
    {
        codigoPostal.focus();
        codigoPostal.classList.add('invalid');
        codigoPostalFeedback.classList.add('text-danger');
        codigoPostalFeedback.innerHTML = 'Ingrese el código postal donde reside el empleado.';
        return;
    }

    // VALIDACIÓN DEL CAMPO 'asentamiento_id'
    if (asentamientoId.value == 0)
    {
        asentamientoId.focus();
        asentamientoId.classList.add('invalid');
        asentamientoIdFeedback.classList.add('text-danger');
        asentamientoIdFeedback.innerHTML = 'Seleccione el asentamiento donde reside el empleado.';
        return;
    }

    // VALIDACIÓN DEL CAMPO 'domicilio'
    if (domicilio.value.trim().length == 0)
    {
        domicilio.focus();
        domicilio.classList.add('invalid');
        domicilioFeedback.classList.add('text-danger');
        domicilioFeedback.innerHTML = 'Ingrese el domicilio de residencia del empleado.';
        return;
    }

    // VALIDACIÓN DEL CAMPO 'email'
    if (email.value.trim().length == 0)
    {
        email.focus();
        email.classList.add('invalid');
        emailFeedback.classList.add('text-danger');
        emailFeedback.innerHTML = 'Ingrese el correo electrónico de contacto del empleado.';
        return;
    }
    else
    {
        if (!evalEmail(email.value.trim()))
        {
            email.focus();
            email.classList.add('invalid');
            emailFeedback.classList.add('text-danger');
            emailFeedback.innerHTML = 'Ingrese una dirección de correo electrónico válida.';
            return;
        }
    }

    // VALIDACIÓN DEL CAMPO 'telefono'
    if (telefono.value.trim().length == 0)
    {
        telefono.focus();
        telefono.classList.add('invalid');
        telefonoFeedback.classList.add('text-danger');
        telefonoFeedback.innerHTML = 'Ingrese el número teléfonico de contacto del empleado.';
        return;
    }
    else
    {
        if (telefono.value.trim().length != 10)
        {
            telefono.focus();
            telefono.classList.add('invalid');
            telefonoFeedback.classList.add('text-danger');
            telefonoFeedback.innerHTML = 'El número de teléfono debe tener 10 dígitos.'
        }
        else
        {
            let e = telefono.value.trim().split('');
            for (let i = 0; i < e.length; i++)
            {
                if (isNaN(e[i]))
                {
                    telefono.focus();
                    telefono.classList.add('invalid');
                    telefonoFeedback.classList.add('text-danger');
                    telefonoFeedback.innerHTML = 'El número de teléfono debe tener solo números.'
                    break;
                    return;
                }
            }
        }
    }

    // formSubmit.disabled = true;
    let request = new XMLHttpRequest();
    let formData = new FormData();

    formData.append('id', id.value);
    formData.append('nombre', nombre.value.trim());
    formData.append('apellido_paterno', apellidoPaterno.value.trim());
    formData.append('apellido_materno', apellidoMaterno.value.trim());
    formData.append('fecha_nacimiento', fechaNacimiento.value);
    formData.append('sexo', sexo.value);
    formData.append('domicilio', domicilio.value.trim());
    formData.append('asentamiento_id', asentamientoId.value);
    formData.append('email', email.value.trim());
    formData.append('telefono', telefono.value.trim());

    request.onreadystatechange = function(){
        if ( this.readyState === 4 )
        {
            if ( this.status === 200 )
            {
                modalOpen('Respuesta del servidor', JSON.parse(this.responseText)["msg"], true, 'CERRAR', false, '');
                nombre.value = '';
                apellidoPaterno.value = '';
                apellidoMaterno.value = '';
                fechaNacimiento.value = '';
                sexo.value = 0;
                codigoPostal.value = '';
                estado.value = '';
                municipio.value = '';
                asentamientoId.value = 0;
                let options = asentamientoId.children;
                if(options.length > 1)
                {
                    let i = options.length - 1;
                    for (let i = options.length - 1; i > 0; i--)
                    {
                        asentamientoId.removeChild(options[i]);
                    }
                    limit = false;
                }
                domicilio.value = '';
                email.value = '';
                telefono.value = '';
                formSubmit.disabled = false;
            }
            else
            {
                modalOpen('Respuesta del servidor', JSON.parse(this.responseText)["msg"], true, 'CERRAR', false, '');
            }
        }
    }
    request.open('POST', f.getAttribute('action'), true);
    request.onerror = () => {
        console.log("Ocurrió un error durante la transacción.");
    };
    request.send(formData);

    return false;
}
