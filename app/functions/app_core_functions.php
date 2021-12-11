<?php

/**
 * Función que convierte un array asociativo en objeto
 * @param  [array] $array [el array asociativo a convertir]
 * @return [object] [objeto de tipo JSON]
 */
function to_object($array)
{
	return json_decode(json_encode($array, JSON_FORCE_OBJECT));
}