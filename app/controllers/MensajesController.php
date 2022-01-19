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
        if (!has_permission(4, "mensajes/"))
        {
            Redirect::to('admin');
        }

        $data = [];

        View::render('Mensajes', $data);
    }
}