<?php


class Db
{
    private $link;
    private $engine;
    private $host;
    private $name;
    private $user;
    private $pass;
    private $charset;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $this->engine = IS_LOCAL ? LDB_ENGINE : DB_ENGINE;
        $this->host = IS_LOCAL ? LDB_HOST : DB_HOST;
        $this->name = IS_LOCAL ? LDB_NAME : DB_NAME;
        $this->user = IS_LOCAL ? LDB_USER : DB_USER;
        $this->pass = IS_LOCAL ? LDB_PASS : DB_PASS;
        $this->charset = IS_LOCAL ? LDB_CHARSET : DB_CHARSET;

        return $this;
    }

    /**
     *
     * Método para realizar la conexión a la base de datos
     *
     * @retun void
     */
    private function connect()
    {
        try
        {
            $this->link = new PDO($this->engine.':host='.$this->host.';dbname='.$this->name.';charset='.$this->charset, $this->user, $this->pass);
            return $this->link;
        }
        catch(PDOException $e)
        {
            die(sprintf("No se pudo realizar la conexión a la base de datos, ocurrio el siguiente error: %s", $e->getMessage()));
        }
    }

    /**
     * @param $sql
     * @param $params
     */
    public static function query($sql, $params = [])
    {
        $db = new self();
        $link = $db->connect();
        $link->beginTransaction();
        $query = $link->prepare($sql);

        // Manejo de errores
        if (!$query->execute($params))
        {
            $link->rollBack();
            $error = $query->errorInfo();
            throw new Exception($error[2]);
        }

        // Si la consulta recibida inicia con un select
        if ( stripos(trim($sql), 'select ') === 0 )
        {
            return $query->rowCount() > 0 ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        // Si la consulta inicia con un insert
        elseif ( stripos(trim($sql), 'insert ') === 0 )
        {
            $id = $link->lastInsertId();
            $link->commit();
            return $id;
        }

        // Si la consulta inicia con un update, se valida que se esté pasando la condición where
        elseif ( stripos(trim(sql), 'update ') === 0 and stripos(trim($sql), ' where ') !== false )
        {
            $link->commit();
            return true;
        }

        else
        {
            $link->rollBack();
            throw new Exception("Revisar la consulta " + $sql );
        }

        $db = null;
    }
}