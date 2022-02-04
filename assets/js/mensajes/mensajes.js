let form = document.querySelector("#form-mensajes");
let idsNoLeidos = [];

form.addEventListener('submit', (e) => {
    // Se previene el submit
    e.preventDefault();

    // Se seleccionan todos los checkboxes con el nombre 'leidos[]'
    let leidos = document.querySelectorAll("[name='leidos[]']");
    // Se crea el array 'ids'
    let ids = [];

    // Se recorre cada uno de los checkboxes
    for (let i = 0; i < leidos.length; i++)
    {
        // Si esta marcado se agrega al array de ids
        if (leidos[i].checked)
        {
            ids.push(leidos[i].value);
        }
    }

    // Si el array de ids tiene elementos
    if (ids.length > 0)
    {
        // Se crea una nueva petición AJAX
        let httpRequest = new XMLHttpRequest();
        let formData = new FormData();

        formData.append('ids', ids);

        httpRequest.onreadystatechange = function(){
            if ( this.readyState === 4 )
            {
                if ( this.status === 200 )
                {
                    modalOpen('Cambios guardados', 'Los mensajes marcados han sido registrados como leídos.', true, 'CERRAR', false, '');

                    modalBtnCancel.addEventListener("click", ()=>{
                        emptyTbody();
                    });
                }
                else
                {
                    console.log("Error: ", this.statusText);
                }
            }
        }

        httpRequest.open('POST', form.getAttribute('action'), true);
        httpRequest.onerror = () => {
            console.log("Ocurrió un error durante la transacción.");
        };
        httpRequest.send(formData);
    }
    else
    {
        modalOpen('Marcar mensjaes', 'Marque los mensajes que ya ha leído y contactado al cliente.', true, 'CERRAR', false, '');
    }
});

/**
 * Función 'emptyTbody'
 * vacía el elemento tbody de la tabla y después llama a la función 'cargarMensajes'
 */
function emptyTbody()
{
    let tbody = document.querySelector("tbody");

    tbody.querySelectorAll("tr").forEach((tr, i) => {
        tbody.removeChild(tr);
    });

    idsNoLeidos = [];

    cargarMensajes();
}

/**
 * Función cargar mensajes
 * Realiza una petición AJAX al servidor para cargar los mensajes NO leídos
 * e insertarlos como filas en la tabla
 */
function cargarMensajes(){
    let api = document.querySelector("#api").value;
    let tbody = document.querySelector("tbody");
    let httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = function(){
        if ( this.readyState === 4 )
        {
            if ( this.status === 200 )
            {
                let b = document.querySelector("button");
                let cont = 1;
                let msjs = JSON.parse(this.responseText);

                if (Object.keys(msjs).length > 0)
                {
                    b.innerHTML = "Guardar mensajes leídos";
                    b.disabled = false;

                    for (let m in msjs)
                    {
                        if (!idsNoLeidos.includes(msjs[m]["id"]))
                        {
                            idsNoLeidos.push(msjs[m]["id"]);
                            let tr = document.createElement("tr");

                            let td1 = document.createElement("td");
                            let ta1 = document.createElement("textarea");
                            ta1.value = cont;
                            td1.appendChild(ta1);

                            let td2 = document.createElement("td");
                            let ta2 = document.createElement("textarea");
                            ta2.value = msjs[m]["nombre"];
                            td2.appendChild(ta2);

                            let td3 = document.createElement("td");
                            let ta3 = document.createElement("textarea");
                            ta3.value = msjs[m]["telefono"];
                            td3.appendChild(ta3);

                            let td4 = document.createElement("td");
                            let ta4 = document.createElement("textarea");
                            ta4.value = msjs[m]["email"];
                            td4.appendChild(ta4);

                            let td5 = document.createElement("td");
                            let ta5 = document.createElement("textarea");
                            ta5.value = msjs[m]["mensaje"];
                            td5.appendChild(ta5);

                            let td6 = document.createElement("td");
                            let ta6 = document.createElement("textarea");
                            ta6.value = msjs[m]["enviado"];
                            td6.appendChild(ta6);

                            let td7 = document.createElement("td");
                            let ic = document.createElement("input");
                            ic.setAttribute("type", "checkbox");
                            ic.setAttribute("name", "leidos[]");
                            ic.value = msjs[m]["id"];
                            td7.appendChild(ic);

                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tr.appendChild(td4);
                            tr.appendChild(td5);
                            tr.appendChild(td6);
                            tr.appendChild(td7);

                            tbody.appendChild(tr);

                            cont++;
                        }
                    }
                }
                else
                {
                    b.innerHTML = "No hay mensajes nuevos.";
                    b.disabled = true;
                }
            }
            else
            {
                console.log("Error: ", this.statusText);
            }
        }
    }

    httpRequest.open('GET', api, true);
    httpRequest.onerror = () => {
        console.log("Ocurrió un error durante la transacción.");
    };
    httpRequest.send();
}

/**
 * Función autoejecutable que llama a la función 'cargarMensajes'
 * Se autoejecuta cuando carga el documento
 */
(()=>{
    cargarMensajes();
})();

