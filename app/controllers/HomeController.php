<?php


class HomeController
{
    function __construct()
    {
    }

    public function index()
    {
        $data = [];

        try
        {
            $sql = "SELECT name, path, type FROM canales WHERE paquete_id = 1 AND deleted_at IS NULL";
            $res = Db::query($sql);
            $data = $res;
        }
        catch (Exception $e)
        {
            $data["error"] = $e->getMessage();
        }
        View::render('Home', $data);
    }
}