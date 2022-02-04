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
            // Si no se recibe el nombre
            if (!isset($_POST["nombre"]))
            {
                http_response_code(500);
                $response = (object)['msg' => 'No se recibió la información del nombre'];
                echo json_encode($response);
                exit;
            }

            // Si no se recibe el telefono
            if (!isset($_POST["telefono"]))
            {
                http_response_code(500);
                $response = (object)['msg' => 'No se recibió la información del teléfono'];
                echo json_encode($response);
                exit;
            }

            // Si no se recibe el correo electrónico
            if (!isset($_POST["email"]))
            {
                http_response_code(500);
                $response = (object)['msg' => 'No se recibió la información del correo electrónico'];
                echo json_encode($response);
                exit;
            }

            // Si no se recibe el texto del mensaje
            if (!isset($_POST["mensaje"]))
            {
                http_response_code(500);
                $response = (object)['msg' => 'No se recibió el texto del mensaje.'];
                echo json_encode($response);
                exit;
            }

            // Si se recibió el nombre pero no contiene carácteres visibles o es menor de 10 carácteres
            if (strlen(trim( $_POST["nombre"])) == 0 || strlen(trim( $_POST["nombre"])) < 10)
            {
                http_response_code(500);
                $response = (object)['msg' => 'El nombre es requerido y debe tener 10 carácteres cuando menos.'];
                echo json_encode($response);
                exit;
            }

            // Si se recibió el teléfono pero es menor de 10 dígitos
            if (strlen(trim( $_POST["telefono"])) == 0 || strlen(trim( $_POST["telefono"])) < 10)
            {
                http_response_code(500);
                $response = (object)['msg' => 'El número de teléfono es requerido y debe tener 10 dígitos exactos.'];
                echo json_encode($response);
                exit;
            }

            // Si se recibió el correo electrónico pero no contiene carácteres visibles y no es una dirección de correo electrónico válida
            if (strlen(trim( $_POST["email"])) == 0)
            {
                http_response_code(500);
                $response = (object)['msg' => 'El correo electrónico es requerido y no puede estar vacío.'];
                echo json_encode($response);
                exit;
            }
            else
            {
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                {
                    http_response_code(500);
                    $response = (object)['msg' => 'Se debe ingresar una dirección de correo electrónico válida.'];
                    echo json_encode($response);
                    exit;
                }
            }

            // Si se recibió el mensaje pero no contiene carácteres visibles o es menor de 10 carácteres
            if (strlen(trim( $_POST["mensaje"])) == 0 || strlen(trim( $_POST["mensaje"])) < 10)
            {
                http_response_code(500);
                $response = (object)['msg' => 'El texto del mensaje es requerido y debe tener 10 carácteres cuando menos.'];
                echo json_encode($response);
                exit;
            }

            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];
            $mensaje = $_POST["mensaje"];

            $sql = "INSERT INTO `mensajes` (`id`, `nombre`, `telefono`, `email`, `mensaje`, `leido`, `created_at`, `deleted_at`, `updated_at`) VALUES (NULL, '$nombre', '$telefono', '$email', '$mensaje', '0', NOW(), NULL, CURRENT_TIMESTAMP)";

            try
            {
                $res = Db::query($sql);
                echo $res;
            }
            catch (Exception $e)
            {
                http_response_code(500);
                $response = (object)['msg' => $e->getMessage()];
                echo json_encode($response);
                exit;
            }
        }
    }
}