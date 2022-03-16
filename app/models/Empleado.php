<?php


class Empleado
{
    private static $id;
    private static $nombre;
    private static $apellido_paterno;
    private static $apellido_materno;
    private static $fecha_nacimiento;
    private static $sexo;
    private static $domicilio;
    private static $asentamiento_id;
    private static $email;
    private static $telefono;

    /* GETTERS & SETTERS */
    public static function getId(){ return self::$id; }
    public static function setId($id){ self::$id = $id; }

    public static function getNombre(){ return self::$nombre; }
    public static function setNombre($nombre){ self::$nombre = $nombre; }

    public static function getApellidoPaterno(){ return self::$apellido_paterno; }
    public static function setApellidoPaterno($apellido_paterno){ self::$apellido_paterno = $apellido_paterno; }

    public static function getApellidoMaterno(){ return self::$apellido_materno; }
    public static function setApellidoMaterno($apellido_materno){ self::$apellido_materno = $apellido_materno; }

    public static function getFechaNacimiento(){ return self::$fecha_nacimiento; }
    public static function setFechaNacimiento($fecha_nacimiento){ self::$fecha_nacimiento = $fecha_nacimiento; }

    public static function getSexo(){ return self::$sexo; }
    public static function setSexo($sexo){ self::$sexo = $sexo; }

    public static function getDomicilio(){ return self::$domicilio; }
    public static function setDomicilio($domicilio){ self::$domicilio = $domicilio; }

    public static function getAsentamientoId(){ return self::$asentamiento_id; }
    public static function setAsentamientoId($asentamiento_id){ self::$asentamiento_id = $asentamiento_id; }

    public static function getEmail(){ return self::$email; }
    public static function setEmail($email){ self::$email = $email; }

    public static function getTelefono(){ return self::$telefono; }
    public static function setTelefono($telefono){ self::$telefono = $telefono; }

    /* FUNCTIONS */
    public function validate()
    {
        if (strlen(self::$nombre) == 0)
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'nombre' es requerido."];
            return $res;
            exit;
        }

        if (!soloLetrasConEspacios(self::$nombre))
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'nombre' debe tener sólo letras y espacios."];
            return $res;
            exit;
        }

        if (strlen(self::$apellido_paterno) == 0)
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'apellido paterno' es requerido."];
            return $res;
            exit;
        }

        if (!soloLetrasConEspacios(self::$apellido_paterno))
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'apellido paterno' debe tener sólo letras y espacios."];
            return $res;
            exit;
        }

        if (strlen(self::$apellido_materno) == 0)
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'apellido materno' es requerido."];
            return $res;
            exit;
        }

        if (!soloLetrasConEspacios(self::$apellido_materno))
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'apellido materno' debe tener sólo letras y espacios."];
            return $res;
            exit;
        }

        if (!strtotime(self::$fecha_nacimiento))
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'fecha de nacimiento' es requerido en un formato válido de fecha."];
            return $res;
            exit;
        }

        $today = date("Y-m-d");
        $diasTranscurridos = diasTranscurridos($today, self::$fecha_nacimiento);

        if ($diasTranscurridos < 6574)
        {
            $res = ["resultado"=>false, "mensaje"=>"Según la fecha de nacimiento proporcionada, el empleado es menor de edad aún."];
            return $res;
            exit;
        }

        $sexos = ["M", "F"];

        if (!in_array(self::$sexo , $sexos))
        {
            $res = ["resultado"=>false, "mensaje"=>"Se debe seleccionar alguna de las opciones del sexo del empleado."];
            return $res;
            exit;
        }

        if (strlen(self::$domicilio) == 0)
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'domicilio' es requerido."];
            return $res;
            exit;
        }

        if (self::$asentamiento_id == 0)
        {
            $res = ["resultado"=>false, "mensaje"=>"Se debe seleccionar el 'asentamiento' donde reside el empleado."];
            return $res;
            exit;
        }

        if (!is_numeric(self::$asentamiento_id))
        {
            $res = ["resultado"=>false, "mensaje"=>"Se debe seleccionar una de las opciones del campo 'asentamiento' donde reside el empleado."];
            return $res;
            exit;
        }

        if (strlen(self::$email) == 0)
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'email' es requerido."];
            return $res;
            exit;
        }

        if (!filter_var(self::$email, FILTER_VALIDATE_EMAIL))
        {
            $res = ["resultado"=>false, "mensaje"=>"Se debe ingresar una dirección de correo electrónico válida."];
            return $res;
            exit;
        }

        if (strlen(self::$telefono) != 10)
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'telefono' es requerido y debe tener 10 dígitos."];
            return $res;
            exit;
        }

        if (!ctype_digit(self::$telefono))
        {
            $res = ["resultado"=>false, "mensaje"=>"El campo 'telefono' debe tener únicamente números."];
            return $res;
            exit;
        }

        $res = ["resultado"=>true, "mensaje"=>"Ok"];
        return $res;
    }

    public function create()
    {
        $nombre = self::getNombre();
        $apePat = self::getApellidoPaterno();
        $apeMat = self::getApellidoMaterno();
        $fecNac = self::getFechaNacimiento();
        $sexo   = self::getSexo();
        $domici = self::getDomicilio();
        $asenId = self::getAsentamientoId();
        $email  = self::getEmail();
        $telefo = self::getTelefono();

        $sql = "INSERT INTO empleados (nombre, apellido_paterno, apellido_materno, fecha_nacimiento, sexo, domicilio, asentamiento_id, email, telefono, created_at, deleted_at, updated_at) VALUES ('$nombre', '$apePat', '$apeMat', '$fecNac', '$sexo', '$domici', $asenId, '$email', '$telefo', NOW(), NULL, NOW())";

        try {
            $id = Db::query($sql);
            return $id;
        }
        catch (Exception $e)
        {
            return false;
        }
    }
}