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

/**
 * Función que muestra el mensaje en el navegador en formato json
 * @param $json
 * @param bool $die
 * @return bool
 */
function json_output($json, $die = true)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json;charset=utf-8');

    if (is_array($json))
    {
        $json = json_encode($json);
    }

    echo $json;

    if ($die)
    {
        die;
    }

    return true;
}

function json_build($status = 200, $data = null, $msg = '')
{
    if (empty($msg) || $msg == '')
    {
        switch ($status)
        {
            case 200:
                $msg = 'Ok';
                break;
            case 201:
                $msg = 'Created';
                break;
            case 400:
                $msg = 'Invalid request';
                break;
            case 403:
                $msg = 'Access denied';
                break;
            case 404:
                $msg = 'Not found';
                break;
            case 500:
                $msg = 'Internal Server Error';
                break;
            case 550:
                $msg = 'Permission denied';
                break;
            default:
                break;
        }
    }

    http_response_code($status);

    $json = [
        'status' => $status,
        'error' => false,
        'msg' => $msg,
        'data' => $data
    ];

    $error_codes = [400, 403, 404, 405, 500];

    if (in_array($status, $error_codes))
    {
        $json['error'] = true;
    }


    return json_encode($json);
}