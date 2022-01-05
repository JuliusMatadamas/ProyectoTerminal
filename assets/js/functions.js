/**
 * Variables a usarse en todo el sitio web
 */
let patronLetras = new RegExp("^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ ]+$");
let patronNumeros = /^[0-9]+$/;

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
 * Función para evaluar si el string que se pasa cómo parámetro corresponde a una dirección de correo electrónico válida
 *
 * @param  {string} e corresponde a la dirección a evaluar
 * @return {boolean} corresponde al resultado de la evaluación
 */
function evalEmail(e){
	return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e)
}