<?php

class Autoloader
{
	function __construct()
	{
	}

	/**
	 * Método init, inicia la función spl_autoload_register que llama al método autoload
	 * con el cual se automatiza el proceso de carga de clases sin tener que incluir
	 * manualmente cada archivo
	 *
	 * @return [type] [description]
	 */
	public static function init()
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}

	/**
	 * Método 'autoload'
	 * Busca las clases en cada uno de los directorios indicados
	 * Y los carga automáticamente
	 *
	 * @param  [string] $class_name [Nombre de la clase]
	 * @return [type]             [description]
	 */
	private static function autoload($class_name)
	{
		if ( is_file(CLASSES.$class_name.'.php') )
		{
			require_once CLASSES.$class_name.'.php';
		}
		elseif ( is_file(CONTROLLERS.$class_name.'.php') )
		{
			require_once CONTROLLERS.$class_name.'.php';
		}
		elseif ( is_file(MODELS.$class_name.'.php') )
		{
			require_once MODELS.$class_name.'.php';
		}

		return;
	}
}