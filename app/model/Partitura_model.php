<?php

class Partitura_model
{

    private $partituras;
    private $dataPart;


    public function __construct()
    {
        require_once 'app/model/Database.php';
        $this->db = Database::conexion();
        $this->partituras = array();
        $this->dataPart = array();
    }


    // Obtiene la lista de partituras 
    public function obtenerPartituras()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_partituras`');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->partituras[] = $filas;
        }

        return $this->partituras;
    }

    // Obtiene datos sobre una partitura en concreto
    public function infoPartitura($id) {

        $stmt = $this->db->prepare('SELECT * FROM `bmel_partituras` WHERE part_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->dataPart[] = $filas;
        }
        return $this->dataPart;
    }


    // Guarda una nueva partitura en la base de datos
    public function nuevaPartitura($titulo, $compositor, $tipo, $ruta, $us_id)
    {
        $query = 'INSERT INTO `bmel_partituras` (`part_titulo`, `part_compositor`, `part_tipo`, `part_ruta`, `part_fechasubida`, `us_id`) VALUES (:titulo, :comp, :tipo, :ruta, current_timestamp(), :id) ';

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':comp', $compositor, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
        $stmt->bindParam(':ruta', $ruta, PDO::PARAM_STR);
        $stmt->bindParam(':id', $us_id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt -> rowCount();

        return $row;

    }

    // Edita una partitura
    public function editarPartitura($id, $titulo, $compositor, $tipo, $ruta) {
        $query = 'UPDATE `bmel_partituras` SET `part_titulo` = :titulo, `part_compositor` = :comp, `part_tipo` = :tipo, `part_ruta` = :ruta WHERE `part_id` = :id ';
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':comp', $compositor, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
        $stmt->bindParam(':ruta', $ruta, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

    }
}
