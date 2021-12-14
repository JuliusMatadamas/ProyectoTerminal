<?php

class View
{
	function __construct()
	{
	}

	public static function render($view, $data = [])
	{
		// Convertir el array asociativo en objeto
		$d = to_object($data);

		// Se comprueba si existe el archivo
		if (!is_file(VIEWS.CONTROLLER.DS.$view.'View.php')) {
			// Se manda el mensaje en caso de no haber sido encontrada la vista
            die(sprintf("La vista %sView no fue encontrada en el directorio.", $view));
		}

		// Se requiere la vista
		require_once VIEWS.CONTROLLER.DS.$view.'View.php';
	}
}