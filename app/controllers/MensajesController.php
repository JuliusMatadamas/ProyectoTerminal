<?php

class MensajesController
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
        // Se valida que el usuario tenga autorizado el submodulo
        if (!has_permission(4, "mensajes"))
        {
            Redirect::to('admin');
        }

        $data = [];

        View::render('Mensajes', $data);
    }

    public function update()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "POST")
        {
            if (isset($_POST["ids"]))
            {
                $ids = $_POST["ids"];

                $sql = "UPDATE mensajes SET leido = 1 WHERE mensajes.id IN ($ids)";

                $resp = Db::query($sql);

                echo $resp;
            }
        }
    }

    public function api()
    {
        $sql = "SELECT id, nombre, telefono, email, mensaje, DATE_FORMAT(created_at, '%Y-%m-%d %H:%i') AS enviado FROM mensajes WHERE leido = 0 AND deleted_at IS NULL;";
        $data = Db::query($sql);
        echo json_encode($data, JSON_FORCE_OBJECT);
    }
}