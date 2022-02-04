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

/**
 * Función que comprueba si el usuario tiene autorizado un modulo o submodulo
 * @param $id [int][el id del modulo a validar]
 * @param $route [string][la ruta del submodulo a validar]
 * @return bool
 */
function has_permission($idModule, $routeSubModule)
{
    $authmodule = false;

    $permisos = $_SESSION["permisos"];

    for ($i = 0; $i < count($permisos); $i++)
    {
        if ($permisos[$i]["id_modulo"] == $idModule)
        {
            for ($j = 0; $j < count($permisos[$i]["submodulos"]); $j++)
            {
                if ($permisos[$i]["submodulos"][$j]["href"] === $routeSubModule)
                {
                    $authmodule = true;
                    break;
                }
            }
        }
    }

    return $authmodule;
}