<?php

class AuthController
{
    function __construct()
    {
    }

    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "POST") {

            // Si no se recibe el usuario
            if (!isset($_POST["usuario"]))
            {
                http_response_code(500);
                $response = (object)['msg' => 'No se recibió la información del usuario'];
                echo json_encode($response);
                exit;
            }

            // Si se recibió el usuario pero no contiene carácteres visibles o es menor de 5 carácteres
            if (strlen(trim( $_POST["usuario"])) == 0 || strlen(trim( $_POST["usuario"])) < 5)
            {
                http_response_code(500);
                $response = (object)['msg' => 'El usuario es requerido y debe tener 5 carácteres cuando menos.'];
                echo json_encode($response);
                exit;
            }

            // Si no se recibe el password
            if (!isset($_POST["password"]))
            {
                http_response_code(500);
                $response = (object)['msg' => 'No se recibió la información de la clave'];
                echo json_encode($response);
                exit;
            }

            // Si se recibió el password pero no contiene carácteres visibles o es menor de 5 carácteres
            if (strlen(trim( $_POST["password"])) == 0 || strlen(trim( $_POST["password"])) < 5)
            {
                http_response_code(500);
                $response = (object)['msg' => 'La clave es requerida y debe tener 5 carácteres cuando menos.'];
                echo json_encode($response);
                exit;
            }

            try
            {
                $valid = false;
                $sql = "SELECT usuarios.password, usuarios.id, empleados.nombre, empleados.apellido_paterno, empleados.apellido_materno, empleados.sexo, empleados.domicilio, empleados.email, empleados.telefono, asentamientos.nombre AS 'asentamiento', codigos_postales.codigo_postal, municipios.nombre AS 'municipio', estados.nombre AS 'estado', puestos.nombre AS 'rol' FROM usuarios INNER JOIN empleados ON usuarios.empleado_id = empleados.id INNER JOIN asentamientos ON empleados.asentamiento_id = asentamientos.id INNER JOIN codigos_postales ON asentamientos.codigo_postal_id = codigos_postales.id INNER JOIN municipios ON codigos_postales.municipio_id = municipios.id INNER JOIN estados ON municipios.estado_id = estados.id INNER JOIN roles ON empleados.id = roles.empleado_id INNER JOIN puestos ON roles.puesto_id = puestos.id WHERE usuarios.usuario = '".$_POST["usuario"]."' AND usuarios.deleted_at IS NULL;";
                $res = Db::query($sql);

                for ($i = 0; $i < count($res); $i++)
                {
                    if (password_verify($_POST["password"], $res[$i]["password"]))
                    {
                        unset($res[$i]["password"]);
                        $_SESSION["login"] = true;
                        $_SESSION["info"] = $res[$i];

                        // Se obtienen los permisos del usuario
                        $permisos = [];
                        $idUsuario = $_SESSION["info"]["id"];
                        $sql2 = "SELECT DISTINCT modulos.id AS 'id_modulo', modulos.nombre AS 'modulo', modulos.icon AS 'icon' FROM permisos INNER JOIN submodulos ON permisos.submodulo_id = submodulos.id INNER JOIN modulos ON submodulos.modulo_id = modulos.id WHERE permisos.deleted_at IS NULL AND submodulos.deleted_at IS NULL AND modulos.deleted_at IS NULL AND permisos.usuario_id = $idUsuario ";

                        $data2 = Db::query($sql2);

                        $sql3 = "SELECT DISTINCT submodulos.id AS 'id_submodulo', submodulos.nombre AS 'submodulo', submodulos.href, modulos.id AS 'id_modulo' FROM permisos INNER JOIN submodulos ON permisos.submodulo_id = submodulos.id INNER JOIN modulos ON submodulos.modulo_id = modulos.id WHERE permisos.deleted_at IS NULL AND submodulos.deleted_at IS NULL AND permisos.usuario_id = $idUsuario";

                        $data3 = Db::query($sql3);

                        for ($i = 0; $i < count($data2); $i++)
                        {
                            $permisos[$i]["id_modulo"] = $data2[$i]["id_modulo"];
                            $permisos[$i]["modulo"] = $data2[$i]["modulo"];
                            $permisos[$i]["icon"] = $data2[$i]["icon"];
                            $permisos[$i]["submodulos"] = [];

                            for ($j = 0; $j < count($data3); $j++)
                            {
                                if ($data3[$j]["id_modulo"] === $data2[$i]["id_modulo"])
                                {
                                    $index = 0;
                                    if ( count($permisos[$i]["submodulos"]) == 0 )
                                    {
                                        $index = 0;
                                    }
                                    elseif ( count($permisos[$i]["submodulos"]) == 1 )
                                    {
                                        $index = 1;
                                    }
                                    else
                                    {
                                        $index = count($permisos[$i]["submodulos"]);
                                    }
                                    $permisos[$i]["submodulos"][$index]["id_submodulo"] = $data3[$j]["id_submodulo"];
                                    $permisos[$i]["submodulos"][$index]["submodulo"] = $data3[$j]["submodulo"];
                                    $permisos[$i]["submodulos"][$index]["href"] = $data3[$j]["href"];
                                }
                            }
                        }

                        $_SESSION["permisos"] = $permisos;

                        $valid = true;
                        break;
                    }
                    else
                    {
                        $valid = false;
                    }
                }

                if(!$valid)
                {
                    http_response_code(500);
                    $response = (object)['msg' => 'Los datos ingresados no coincides con nuestros registros.'];
                    echo json_encode($response);
                    exit;
                }
                else
                {
                    $response = (object)['msg' => 'admin'];
                    echo json_encode($response);
                    exit;
                }
            }
            catch (Exception $e)
            {
                $data["error"] = $e->getMessage();
            }
        }
    }
}