let f = document.querySelector("form");
let u = document.querySelector("#usuario");
let p = document.querySelector("#password");
let b = f[2];

/**
 * Evento 'keyup' al campo 'usuario'
 * Se obtiene el valor del campo y se evalua llamando a la función
 * 'evalText' para verificar que cumpla con la condición dada
 */
u.addEventListener('keyup', (e) => {
    if (!evalText(u.value, 5))
    {
        u.nextElementSibling.classList.remove("valid");
        u.nextElementSibling.classList.add("invalid");
        u.nextElementSibling.innerHTML = "Este campo debe tener 5 caracteres al menos.";

        b.nextElementSibling.classList.remove("valid", "invalid");
        b.nextElementSibling.innerHTML = "";
    }
    else
    {
        u.nextElementSibling.classList.remove("invalid");
        u.nextElementSibling.classList.add("valid");
        u.nextElementSibling.innerHTML = "Parece válido";

        b.nextElementSibling.classList.remove("valid", "invalid");
        b.nextElementSibling.innerHTML = "";
    }
})

/**
 * Evento 'keyup' al campo 'password'
 * Se obtiene el valor del campo y se evalua llamando a la función
 * 'evalText' para verificar que cumpla con la condición dada
 */
p.addEventListener('keyup', (e) => {
    if (!evalText(u.value, 5))
    {
        p.nextElementSibling.classList.remove("valid");
        p.nextElementSibling.classList.add("invalid");
        p.nextElementSibling.innerHTML = "Este campo debe tener 5 caracteres al menos.";

        b.nextElementSibling.classList.remove("valid", "invalid");
        b.nextElementSibling.innerHTML = "";
    }
    else
    {
        p.nextElementSibling.classList.remove("invalid");
        p.nextElementSibling.classList.add("valid");
        p.nextElementSibling.innerHTML = "Parece válido";

        b.nextElementSibling.classList.remove("valid", "invalid");
        b.nextElementSibling.innerHTML = "";
    }
})

f.addEventListener('submit', (e) => {
    e.preventDefault();

    if (u.value.trim().length < 5)
    {
        u.focus();
        u.nextElementSibling.classList.remove("valid");
        u.nextElementSibling.classList.add("invalid");
        u.nextElementSibling.innerHTML = "Este campo es requerido y debe tener 5 caracteres al menos.";

        b.nextElementSibling.classList.remove("valid");
        b.nextElementSibling.classList.add("invalid");
        b.nextElementSibling.innerHTML = "Hay campos que no cumplen con los requisitos.";

        return;
    }

    if (p.value.trim().length < 5)
    {
        p.focus();
        p.nextElementSibling.classList.remove("valid");
        p.nextElementSibling.classList.add("invalid");
        p.nextElementSibling.innerHTML = "Este campo es requerido y debe tener 5 caracteres al menos.";

        b.nextElementSibling.classList.remove("valid");
        b.nextElementSibling.classList.add("invalid");
        b.nextElementSibling.innerHTML = "Hay campos que no cumplen con los requisitos.";

        return;
    }

    b.disabled = true;
    b.nextElementSibling.classList.remove("invalid", "valid");
    b.nextElementSibling.innerHTML = "Espera mientras se validan tus datos.";

    let httpRequest = new XMLHttpRequest();
    let formData = new FormData();

    formData.append('usuario', u.value);
    formData.append('password', p.value);

    httpRequest.onreadystatechange = function(){
        if ( this.readyState === 4 )
        {
            if ( this.status === 200 )
            {
                let response = JSON.parse(this.responseText);
                let m = response.msg;
                setTimeout(() => {
                    u.value = '';
                    p.value = '';

                    b.nextElementSibling.classList.remove("invalid", "valid");
                    b.nextElementSibling.classList.add("valid");
                    b.nextElementSibling.innerHTML = "¡Login correcto! en unos segundos serás redireccionado";

                    setTimeout(() => {
                        window.location = window.location.protocol + '//' + window.location.hostname + '/' + m;
                        // window.location = 'admin';
                    }, 2000);
                }, 2000);
            }
            else
            {
                let response = JSON.parse(this.responseText);
                let m = response.msg;

                b.disabled = false;
                b.nextElementSibling.classList.remove("invalid", "valid");
                b.nextElementSibling.classList.add("invalid");
                b.nextElementSibling.innerHTML = m;
            }
        }
    }

    httpRequest.open('POST', f.getAttribute('action'), true);
    httpRequest.onerror = () => {
        console.log("Ocurrió un error durante la transacción.");
    };
    httpRequest.send(formData);
})