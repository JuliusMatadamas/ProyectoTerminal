<?php


class HomeController
{
    function __construct()
    {
    }

    public function index()
    {
    	$data = [];
        View::render('home', $data);
    }
}