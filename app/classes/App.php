<?php


class App
{
    /**
     * Propiedades de la clase
     */
    private $uri = [];

    /**
     * App constructor.
     */
    function __construct()
    {
    }

    /**
     * Método que llamará a los demás métodos de la clase
     * de manera consecutiva
     *
     * @return  void
     */
    private function init()
    {
        $this->init_session();
        $this->init_load_config();
        $this->init_load_functions();
        $this->init_autoloader();
        $this->dispatch();
    }

    /**
     * Método para iniciar la sesión en el sistema
     *
     * @return void
     */
    private function init_session()
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }

        return;
    }

    /**
     * Método para cargar el archivo de configuración del sistema
     *
     * @return void
     */
    private function init_load_config()
    {
        $file  = 'app_config.php';

        // Si el archivo no se encuentra en la ruta especificada, se 'mata' el proceso y se muestra el mensaje correspondiente.
        if ( !is_file('app/config/'.$file) )
        {
            die( sprintf("El archivo %s no se encuentra, este es requerido para el funcionamiento del sistema.", $file) );
        }

        require_once 'app/config/'.$file;

        return;
    }

    /**
     * Método para cargar los archivos de funciones del sistema
     *
     * @return void
     */
    private function init_load_functions()
    {
        $file  = 'app_core_functions.php';

        // Si el archivo no se encuentra en la ruta especificada, se 'mata' el proceso y se muestra el mensaje correspondiente.
        if ( !is_file('app/functions/'.$file) )
        {
            die( sprintf("El archivo %s no se encuentra, este es requerido para el funcionamiento del sistema.", $file) );
        }

        require_once 'app/functions/'.$file;

        $file  = 'app_custom_functions.php';

        // Si el archivo no se encuentra en la ruta especificada, se 'mata' el proceso y se muestra el mensaje correspondiente.
        if ( !is_file('app/functions/'.$file) )
        {
            die( sprintf("El archivo %s no se encuentra, este es requerido para el funcionamiento del sistema.", $file) );
        }

        require_once 'app/functions/'.$file;

        return;
    }

    /**
     * Método para cargar las clases del sistema
     *
     * @return void
     */
    private function init_autoloader()
    {
        require_once CLASSES.'Db.php';
        require_once CLASSES.'Model.php';
        require_once CLASSES.'View.php';
        require_once CLASSES.'Controller.php';
        require_once CONTROLLERS.DEFAULT_CONTROLLER.'Controller.php';
        require_once CONTROLLERS.DEFAULT_ERROR_CONTROLLER.'Controller.php';

        return;
    }

    /**
     * Método para filtrar y descomponer la url
     *
     * @return false|string[]
     */
    private function filter_url()
    {
        if ( isset($_GET['uri']) )
        {
            $this->uri = $_GET['uri'];
            $this->uri = rtrim($this->uri, '/');
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            $this->uri = explode('/', strtolower($this->uri));

            return $this->uri;
        }
    }

    /**
     * Método para cargar y ejecutar el controlador, el método y los parámetros pasados en la URL
     *
     * @return void
     */
    private function dispatch()
    {
        // Filtrar la URL y separar la URI
        $this->filter_url();

        // Se determina si se está pasando un controlador en la URI
        if ( isset($this->uri[0]) )
        {
            // Si se está pasando un controlador, este se asigna a la variable 'current_controller'
            $current_controller = $this->uri[0];
            // Después de elimina del array
            unset($this->uri[0]);
        }
        else
        {
            // Si no se está pasando un controlador, se asigna a la variable 'current_controller' el controlador por defecto 'HomeController'
            $current_controller = DEFAULT_CONTROLLER;
        }

        // Se convierte la primer letra en mayúcula y se concatena la palabra 'Controller'
        $controller = ucwords($current_controller).'Controller';

        // Se verifica que exista la clase con el nombre del controlador
        if ( !class_exists($controller))
        {
            // Si no se encontró ninguna clase con el nombre del controlador, se asigna a la variable 'controller' el controlador de errores por defecto
            $controller = DEFAULT_ERROR_CONTROLLER.'Controller'; // ErrorController
        }

        // Se valida si se está pasando un método a ejecutar en la URI
        if ( isset($this->uri[1]) )
        {
            // Se reemplazan los guiones medios que pudieran pasarse en el nombre del método
            $method = str_replace('-', '_', $this->uri[1]);

            // Se valida si existe el método dentro de la clase a ejecutar
            if ( !method_exists($controller, $method) )
            {
                // Si no existe el método, se asigna a la variable 'controller' el controlador de errores por defecto
                $controller = DEFAULT_ERROR_CONTROLLER.'Controller';
                // Luego se define el método por defecto 'index' en la variable 'current_method'
                $current_method = DEFAULT_METHOD;
            }
            else
            {
                // Si existe el método, se asigna a la variable 'current_method'
                $current_method = $method;
            }

            // Se elimina del array
            unset($this->uri[1]);
        }
        else
        {
            // Si no se está pasando un método, se asigna a la variable 'current_method' el método 'index' por defecto
            $current_method = DEFAULT_METHOD;
        }

        // Se crean nuevas constantes para usarse posteriormente en el sistema
        define('CONTROLLER', strtolower($current_controller));
        define('METHOD', $current_method);

        // Se crea una nueva instancia del controlador
        $controller = new $controller;

        // Se obtienen los parámetros
        $params = array_values(empty($this->uri) ? [] : $this->uri);

        // Se llama al método
        if ( empty($params) )
        {
            // Se ejecuta la función call_user_func cuando no se está pasando parámetros
            call_user_func([$controller, $current_method]);
        }
        else
        {
            // Se ejecuta la función call_user_func_array cuando se está pasando parámetros
            call_user_func_array([$controller, $current_method], $params);
        }

        return;
    }

    /**
     * Método público que llama al método 'init' de la clase
     *
     * @return void
     */
    public static function launch()
    {
        // Se crea una nueva instancia de la clase
        $app = new self();

        // Se llama al método 'init'
        $app->init();

        return;
    }
}