<?php

class AdminController
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
        $data = [];
        View::render('Admin', $data);
    }
}