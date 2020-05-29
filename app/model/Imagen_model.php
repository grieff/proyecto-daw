<?php

class Imagen_model
{

    private $img;

    public function __construct()
    {
        require_once 'app/model/Database.php';
        $this->db = Database::conexion();
        $this->img = array();
    }

    // Recuperar img de un evento
    public function allImg($evento) {
        $query = 'SELECT * FROM bmel_imagenes WHERE `ev_id` = :ev' ;
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':ev', $evento, PDO::PARAM_STR);
        $stmt->execute();

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->img[] = $filas;
        }
        return $this->img;
    }


}
