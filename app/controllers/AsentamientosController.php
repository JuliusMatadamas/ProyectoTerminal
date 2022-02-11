<?php


class AsentamientosController
{
    function __construct()
    {
        // Se comprueba si el usuario está logueado
        if (!isset($_SESSION["login"]) || empty($_SESSION["login"]))
        {
            // En caso de no estar logueado, se le redirige al login
            Redirect::to('login');
        }
    }

    public function index()
    {
    }

    public function api()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "POST")
        {
            $codigo_postal = $_POST['codigo_postal'];
            $sql = "SELECT estados.nombre AS estado, municipios.nombre AS municipio, asentamientos.id, asentamientos.nombre FROM asentamientos INNER JOIN codigos_postales ON asentamientos.codigo_postal_id = codigos_postales.id INNER JOIN municipios ON codigos_postales.municipio_id = municipios.id INNER JOIN estados ON municipios.estado_id = estados.id WHERE codigos_postales.codigo_postal = $codigo_postal AND asentamientos.deleted_at IS NULL";
            $result = Db::query($sql);
            echo json_encode($result, JSON_FORCE_OBJECT);
        }
        else
        {
        }
    }
}