<?php

// Este archivo contiene las configuraciones para el funcionamiento del sistema

/**
 * Constante 'IS_LOCAL'
 * Se define si se está trabajando en el servidor local o en el servidor
 * de producción por medio de la IP obtenido de la contante $_SERVER['REMOTE_ADDR'],
 * si la IP es 127.0.0.1 o ::1, significa que la aplicación se está ejecutando en
 * el servidor local
 */
define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

/**
 * Se establece la zona horaria en la que se estará ejecutando la aplicación
 * que será el de la ciudad de Matamoros México
 */
date_default_timezone_set('America/Matamoros');

// Lenguaje de lás páginas HTML
define('LANG', 'es');

// Se define la url base
define('URL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/');

// Se definen las rutas de directorios a nivel de disco duro del servidor
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',getcwd().DS);

// Carpeta 'app'
define('APP', ROOT.'app'.DS);

// Carpeta 'classes'
define('CLASSES', APP.'classes'.DS);

// CARPETA 'config'
define('CONFIG', APP.'config'.DS);

// Carpeta 'controllers'
define('CONTROLLERS', APP.'controllers'.DS);

// CARPETA 'functions'
define('FUNCTIONS', APP.'functions'.DS);

// CARPETA 'models'
define('MODELS', APP.'models'.DS);

// Carpeta 'assets'
define('ASSETS', URL.'assets/');

// Carpeta 'css'
define('CSS', ASSETS.'css');

// CARPETA 'favicon'
define('FAVICON', ASSETS.'favicon');

// CARPETA 'fonts'
define('FONTS', ASSETS.'fonts'.DS);

// Carpeta 'images'
define('IMAGES', ASSETS.'images');

// CARPETA 'js'
define('JS', ASSETS.'js');

// CARPETA 'uploads'
define('UPLOADS', ASSETS.'uploads');

// CARPETA 'templates'
define('TEMPLATES', ROOT.'templates'.DS);

// Carpeta 'includes'
define('INCLUDES', TEMPLATES.'includes'.DS);

// Carpeta 'modules'
define('MODULES', TEMPLATES.'modules'.DS);

// Carpeta 'views'
define('VIEWS', TEMPLATES.'views'.DS);

// Se definen las credenciales para la base de datos en el servidor local
define('LDB_ENGINE', 'mysql');
define('LDB_HOST', 'localhost');
define('LDB_NAME', 'dish_matamoros');
define('LDB_USER', 'root');
define('LDB_PASS', '');
define('LDB_CHARSET', 'utf8');

// Se definen las credenciales para la base de datos en el servidor real
define('DB_ENGINE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'dish_matamoros');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

// Se definen el controlador y el método por defecto
define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_ERROR_CONTROLLER', 'Error');
define('DEFAULT_METHOD', 'index');
