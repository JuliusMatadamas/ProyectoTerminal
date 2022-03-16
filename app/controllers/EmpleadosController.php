<?php


class EmpleadosController
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

    /**
     * Función para mostrar el formulario de registro de un nuevo empleado
     */
    public function index()
    {
        // Se valida que el usuario tenga autorizado el submodulo
        if (!has_permission(3, "empleados/nuevo"))
        {
            Redirect::to('admin');
        }

        $data = [];

        View::render('Empleados', $data);
    }

    /**
     * Función para mostrar el formulario de registro de un nuevo empleado
     */
    public function nuevo()
    {
        // Se valida que el usuario tenga autorizado el submodulo
        if (!has_permission(3, "empleados/nuevo"))
        {
            Redirect::to('admin');
        }

        $data = [];

        View::render('Empleados', $data);
    }

    /**
     * Función para registrar en la base de datos
     * la información del formulario de registro de nuevos empleados
     */
    public function store()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "POST")
        {
            // Se crea una nueva instancia de la clase 'Empleado'
            $empleado = new Empleado();

            // Se asignan los valores a las propiedades de la clase
            $empleado::setNombre(trim($_POST["nombre"]));
            $empleado::setApellidoPaterno(trim($_POST["apellido_paterno"]));
            $empleado::setApellidoMaterno(trim($_POST["apellido_materno"]));
            $empleado::setFechaNacimiento($_POST["fecha_nacimiento"]);
            $empleado::setSexo($_POST["sexo"]);
            $empleado::setDomicilio(trim($_POST["domicilio"]));
            $empleado::setAsentamientoId($_POST["asentamiento_id"]);
            $empleado::setEmail(trim($_POST["email"]));
            $empleado::setTelefono(trim($_POST["telefono"]));

            // Se valida que los datos estén correctos
            $resp = $empleado->validate();

            // Si alguno de los datos no cumple con los requerimientos
            if (!$resp["resultado"])
            {
                http_response_code(500);
                $response = (object)['msg' => $resp["mensaje"]];
                echo json_encode($response);
                exit;
            }

            // Se crea la variable que guardará el id asignado al empleado
            $id = $empleado->create();

            // Si no se pudo guardar al empleado
            if(!$id)
            {
                http_response_code(500);
                $response = (object)['msg' => 'El empleado no pudo ser guardado, verifique los datos o póngase en contacto con el administrador si el error persiste.'];
                echo json_encode($response);
                exit;
            }

            // Si el empleado fue guardado correctamente
            $response = (object)['msg' => 'El empleado ha sido registrado en la base de datos con el id: '.$id];
            echo json_encode($response);
            exit;
        }
        else
        {
            json_output(json_build(403));
        }
    }

    /**
     * Función para mostrar la vista con la información de todos los empleados
     * activos registrados en la base de datos.
     */
    public function consulta()
    {
        // Se valida que el usuario tenga autorizado el submodulo
        if (!has_permission(3, "empleados/consulta"))
        {
            Redirect::to('admin');
        }

        $sql = "SELECT empleados.id, empleados.nombre, empleados.apellido_paterno, empleados.apellido_materno, empleados.fecha_nacimiento, empleados.sexo, codigos_postales.codigo_postal, estados.nombre AS 'estado', municipios.nombre AS 'municipio', empleados.asentamiento_id, empleados.domicilio, empleados.email, empleados.telefono FROM empleados INNER JOIN asentamientos ON empleados.asentamiento_id = asentamientos.id INNER JOIN codigos_postales ON asentamientos.codigo_postal_id = codigos_postales.id INNER JOIN municipios ON codigos_postales.municipio_id = municipios.id INNER JOIN estados ON municipios.estado_id = estados.id WHERE empleados.id = 1 AND empleados.deleted_at IS NULL";

        $data = Db::query($sql);

        View::render('EmpleadosConsulta', $data);
    }

    /**
     * Función para mostrar el formulario llenado con la información
     * correspondiente al id del empleado para editarla
     * @param int $id
     */
    public function editar($id = 0)
    {
        if ($id == 0)
        {
            Redirect::to('empleados/nuevo');
        }
        else
        {
            $sql = "SELECT empleados.id, empleados.nombre, empleados.apellido_paterno, empleados.apellido_materno, empleados.fecha_nacimiento, empleados.sexo, codigos_postales.codigo_postal, estados.nombre AS 'estado', municipios.nombre AS 'municipio', empleados.asentamiento_id, empleados.domicilio, empleados.email, empleados.telefono FROM empleados INNER JOIN asentamientos ON empleados.asentamiento_id = asentamientos.id INNER JOIN codigos_postales ON asentamientos.codigo_postal_id = codigos_postales.id INNER JOIN municipios ON codigos_postales.municipio_id = municipios.id INNER JOIN estados ON municipios.estado_id = estados.id WHERE empleados.id = $id AND empleados.deleted_at IS NULL";

            $data = Db::query($sql);

            if (!isset($data[0]))
            {
                $data = '';
            }

            View::render('EmpleadosEditar', $data);
        }
    }
}