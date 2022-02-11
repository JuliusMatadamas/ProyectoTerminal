/**
 * Variables a usarse en todo el sitio web
 */
let modal = document.querySelector("#modal");
let modalBtnCancel = document.querySelector("#modal-btn-cancel");
let modalBtnClose = document.querySelector(".modal-close");
let modalBtnContinue = document.querySelector("#modal-btn-continue");
let modalHeaderH1 = document.querySelector(".modal-header h1");
let modalBodyP = document.querySelector(".modal-body p");
let patronLetras = new RegExp("^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ ]+$");
let patronNumeros = /^[0-9]+$/;

/**
 * Se escucha el evento 'click' en el elemento con la clase 'modal-close'
 * y se ejecuta la función 'modalClose()'
 */
modalBtnClose.addEventListener('click', () => {
	modalClose();
});

/**
 * Se escucha el evento 'click' en el elemento 'window'
 * Si el target corresponde al 'modal' se ejecuta la función 'modalClose'
 */
window.addEventListener('click', (e) => {
	if (e.target == modal)
	{
		modalClose();
	}
});

/**
 * Función para evaluar si el string que se pasa cómo parámetro corresponde a una dirección de correo electrónico válida
 *
 * @param  {string} e corresponde a la dirección a evaluar
 * @return {boolean} corresponde al resultado de la evaluación
 */
function evalEmail(e){
	return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e)
}

/**
 * Función para evaluar que un texto no esté compuesto de carácteres vacíos y tenga la longitud establecidad
 *
 * * Evalua si primer valor pasado como parámetro está vacío
 * * Evalua si el primer párametro es menor a la longitud establecida por el segundo parámetro
 * * Evalua que no se hayan ingresado sólo espacios en blanco
 *
 * @param v - de tipo string, corresponde al texto a evaluar
 * @param l - de tipo int, corresponde a la longitud mínima que debe tener el texto
 * @returns {boolean}
 */
function evalText(v, l){
	if( v == null || v.length < l || /^\s+$/.test(v) ) {
		return false;
	}
	else {
		return true;
	}
}

/**
 * Función para regresar a la página anterior
 *
 * @return void
 */
function historyReturn()
{
	window.history.back();
}

/**
 * Función 'modalClose'
 * modifica la clase css 'display' a 'none' para ocultar el modal
 */
function modalClose()
{
	modal.style.display = 'none';
}

/**
 * Función 'modalOpen'
 * modifica la clase css 'display' a 'flex' para mostrar el modal
 */
function modalOpen(t = '', m = '', dbcancel = true, tbcancel = 'CANCELAR', dbcontinue = false, tbcontinue = '' )
{
	modal.style.display = 'flex';
	modalHeaderH1.innerHTML = t;
	modalBodyP.innerHTML = m;
	modalBtnCancel.innerHTML = tbcancel;
	modalBtnContinue.innerHTML = tbcontinue;

	dbcancel ? modalBtnCancel.style.display = 'block' : modalBtnCancel.style.display = 'none';

	dbcontinue ? modalBtnContinue.style.display = 'block' : modalBtnContinue.style.display = 'none';

	modalBtnCancel.addEventListener('click', () => {
		modalClose()
	})
}
