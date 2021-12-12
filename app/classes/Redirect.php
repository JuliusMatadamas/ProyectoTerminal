<?php


class Redirect
{
    private $location;

    /**
     * Método para redirigir al usuario a una sección en especifico
     *
     * @param $location
     *
     * ejemplo de uso, cuando se quirea redirigir al usuario cuando este quiera ingresar a una sección
     * protegida que requiera autenticación y el usuario no lo esté, se debe invocar a la clase de la
     * siguiente manera: Redirect::to('home');
     *
     */
    public static function to($location)
    {
        $self = new self();
        $self->location = $location;

        // Si las cabeceras ya fueron enviadas
        if (headers_sent())
        {
            echo '<script type="text/javascript">window.location.href="';
            echo URL.$self->location;
            echo '"</script>';
            echo '<noscript><meta http-equiv="refresh" content="0; url=';
            echo URL.$self->location;
            echo '"></noscript>';
            die();
        }

        // Si se está pasando una url externa al sitio
        if (strpos($self->location, 'http') !== false)
        {
            header('Location: '.$self->location);
            die();
        }

        // Se redirije al usuario
        header('Location: '.URL.$self->location);
        die;
    }
}