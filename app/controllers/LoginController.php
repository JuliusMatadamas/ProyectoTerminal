<?php


class LoginController
{
    function __construct()
    {
        // Se comprueba si el usuario está logueado
        if (isset($_SESSION["login"]) || !empty($_SESSION["login"]))
        {
            // En caso de ya estar logueado, se le redirige al inicio del admin
            Redirect::to('admin');
        }
    }

    public function index()
    {
        $data = [];

        // password_hash("admin", PASSWORD_DEFAULT);
        View::render('Login', $data);
    }
}