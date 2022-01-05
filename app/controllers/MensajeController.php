<?php


class MensajeController
{
    function __construct()
    {
    }

    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "POST")
        {
            var_dump($_POST);
        }
    }
}