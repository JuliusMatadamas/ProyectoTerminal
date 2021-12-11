<?php


class ErrorController
{
    function __construct()
    {
    }

    public function index()
    {
    	View::render('404');
    }
}