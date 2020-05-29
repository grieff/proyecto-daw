<?php

class Evento_model {
        private $db;
        private $publicEvents;
        private $countPublicEvents;
        private $allevents;
        private $next_events;
        private $next_ensayo;
        private $privateEvents;
        private $evento;

    public function __construct()
    {
        require_once 'app/model/Database.php';
        $this->db = Database::conexion();
        $this->publicEvents = array();
        $this->privateEvents = array();
        $this->allevents = array();
        $this->next_ensayo = array();
        $this->next_events = array();
        $this->evento = array();
        
    }

    // Eventos publicos
    public function obtenerEventosPublicos()
    {
        $consulta = $this->db->query('SELECT * FROM `bmel_eventos` WHERE `ev_tipo` < 50 ');

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->publicEvents[] = $filas;
        }

        return $this->publicEvents;
    }

    // Eventos Privados
    public function obtenerEventosPrivados()
    {
        $consulta = $this->db->query('SELECT * FROM `bmel_eventos` WHERE `ev_tipo` >= 50 ');

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->privateEvents[] = $filas;
        }

        return $this->privateEvents;
    }

    // Conteo eventos publicos
    public function countRowPublic() {

        $consulta = $this->db->query('SELECT * FROM `bmel_eventos` WHERE `ev_tipo` < 50');

        $this->countPublicEvents = $consulta->rowCount();
        

        return $this->countPublicEvents;
         
    }

    // Obtener todos los eventos
    public function obtenerEventos($start, $reg_pag)
    {
        $consulta = $this->db->prepare('SELECT * FROM bmel_eventos ORDER BY `ev_fechainicio` LIMIT :inicio, :registros ');
        $consulta->bindParam(':inicio', $start, PDO::PARAM_INT);

        $consulta->bindParam(':registros', $reg_pag, PDO::PARAM_INT);
        $consulta ->execute();

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->allevents[] = $filas;
        }

        return $this->allevents;
    }


    // Conteo eventos (para paginacion)
public function allEvents() {
        $consulta = $this->db->query('SELECT * FROM bmel_eventos');
        $nmember = $consulta->rowCount();

        return $nmember;
}



    // Siguiente evento (publico) *no incluye ensayos*
    public function siguienteEvento()
    {
        // Hacer consulta

        $stmt = $this->db->prepare('SELECT * FROM bmel_eventos where ev_fechainicio >= :fecha AND ev_tipo < 50');

        $now = new Datetime();
        $date = $now->format('Y-m-d H:i:s');
        $stmt->bindParam(':fecha', $date, PDO::PARAM_STR);
        $stmt->execute();

        // Recorre resultados y guarda en array next_events
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->next_events[] = $filas;
        }
        // Devuelve array con siguientes eventos
        return $this->next_events;
    }

    // Siguiente ensayo *solamente incluye los ensayos, no los eventos publicos*
    public function siguienteEnsayo() {

        $stmt = $this->db->prepare('SELECT * FROM bmel_eventos where ev_fechainicio >= :fecha AND ev_tipo >= 50');

        $now = new Datetime();
        $date = $now->format('Y-m-d H:i:s'); // Devuelve el dia de hoy en un formato reconocible por MySQL
        $stmt->bindParam(':fecha', $date, PDO::PARAM_STR);
        $stmt->execute();

        //Recorre resultados y guarda en array next_ensayo
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->next_ensayo[] = $filas;
        }
        // Devuelve array con los siguientes ensayos
        return $this->next_ensayo;

    }



    // Insertar evento nuevo
    public function nuevoEvento($titulo, $tipo, $fechainicio, $fechafin, $descripcion, $ubicacion, $idus) {

        $fecha = explode(" ", $fechainicio);
        $fexp = explode("-", $fecha[0]);

        $ano = $fexp[0];
        $mes = $fexp[1];


        $query = 'INSERT INTO `bmel_eventos` (`ev_titulo`, `ev_descripcion`, `ev_tipo`, `ev_fechainicio`, `ev_fechafin`, `ev_mes`, `ev_año`, `ev_ubicacion`, `us_id`) VALUES (:titulo, :descripcion, :tipo, :inicio, :fin, :mes, :ano, :ubicacion, :id) ';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
        $stmt->bindParam(':inicio', $fechainicio, PDO::PARAM_STR);
        $stmt->bindParam(':fin', $fechafin, PDO::PARAM_STR);
        $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
        $stmt->bindParam(':ubicacion', $ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(':id', $idus, PDO::PARAM_INT);
        $stmt->execute();

    }


    // Obtener evento mediante id (edicion) 
    public function getEvent($id) {
        $query = 'SELECT * FROM bmel_eventos where ev_id = :id ';

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->evento[] = $filas;
        }
        

        return $this->evento;

    }


    // Actualizar datos evento
    public function actualizarEvento($id, $titulo, $descripcion, $tipo, $inicio, $fin, $mes, $ano, $ubicacion) {
        $query = 'UPDATE `bmel_eventos` SET `ev_titulo` = :titulo, `ev_descripcion` = :descripcion, `ev_tipo` = :tipo, `ev_fechainicio` = :inicio, `ev_fechafin` = :fin, `ev_mes` = :mes, `ev_año` = :ano, `ev_ubicacion` = :ubicacion WHERE `ev_id` = :id ';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
        $stmt->bindParam(':inicio', $inicio, PDO::PARAM_STR);
        $stmt->bindParam(':fin', $fin, PDO::PARAM_STR);
        $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
        $stmt->bindParam(':ubicacion', $ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


    // Eliminar evento
    public function eliminarEvento($id) {
        $query = 'DELETE FROM `bmel_eventos` WHERE `ev_id` = :id ';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    }
}


?>