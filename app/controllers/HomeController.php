<?php


class HomeController
{
    function __construct()
    {
    }

    public function index()
    {
    	View::render('home');
    }
}