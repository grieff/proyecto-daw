<?php

class Miembro_model
{

    private $db;
    private $members;
    private $lista;
    private $miembro;

    private $flauta;
    private $oboe;
    private $fagot;
    private $requinto;
    private $clarinete;
    private $clarinetebajo;
    private $saxofon;
    private $saxofontenor;
    private $saxofonbaritono;
    private $fliscorno;
    private $trompa;
    private $trompeta;
    private $trombon;
    private $bombardino;
    private $percusion;

    private $director;
    private $presidente;


    public function __construct()
    {
        require_once 'app/model/Database.php';
        $this->db = Database::conexion();
        $this->lista = array();
        $this->miembro = array();

        $this->flauta = array();
        $this->oboe = array();
        $this->fagot = array();
        $this->requinto = array();
        $this->clarinete = array();
        $this->clarinetebajo = array();
        $this->saxofon = array();
        $this->saxofontenor = array();
        $this->saxofonbaritono = array();
        $this->fliscorno = array();
        $this->trompa = array();
        $this->trompeta = array();
        $this->trombon = array();
        $this->bombardino = array();
        $this->percusion = array();

        $this->director = array();
        $this->presidente = array();
    }

    // Obtener todos los miembros activos -> conteo
    public function allMembers()
    {

        $query = 'SELECT m.m_id, m.m_nombre, m.m_apellidos, m.m_instrumento, m.m_rol, m.m_fechaentrada, m.m_activo, u.us_id, u.us_username, u.us_pass, u.us_tipo FROM `bmel_miembros` m JOIN bmel_usuarios u ON m.us_id = u.us_id ORDER BY `m_instrumento` ASC ';

        $stmt = $this->db->query($query);
        $this->members = $stmt->rowCount();


        return $this->members;
    }

    // Obtener datos miembros y datos usuarios para lista miembros
    public function obtenerListaMiembros($start, $reg_pag)
    {

        $query_limit = 'SELECT m.m_id, m.m_nombre, m.m_apellidos, m.m_instrumento, m.m_rol, m.m_fechaentrada, m.m_activo, u.us_id, u.us_username, u.us_pass, u.us_tipo FROM `bmel_miembros` m JOIN bmel_usuarios u ON m.us_id = u.us_id WHERE u.us_tipo != 50 ORDER BY `m_instrumento` ASC LIMIT :inicio, :registros ';

        $stmtl = $this->db->prepare($query_limit);
        $stmtl->bindParam(':inicio', $start, PDO::PARAM_INT);
        $stmtl->bindParam(':registros', $reg_pag, PDO::PARAM_INT);
        $stmtl->execute();

        while ($filas = $stmtl->fetch(PDO::FETCH_ASSOC)) {
            $this->lista[] = $filas;
        }

        return $this->lista;
    }

    // Obtener miembros por instrumento *para plantilla*


    public function obtenerFlauta()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "flauta" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->flauta[] = $filas;
        }

        return $this->flauta;
    }

    public function obtenerOboe()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "oboe" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->oboe[] = $filas;
        }

        return $this->oboe;
    }


    public function obtenerFagot()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "fagot" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->fagot[] = $filas;
        }

        return $this->fagot;
    }


    public function obtenerClarinete()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "clarinete" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->clarinete[] = $filas;
        }

        return $this->clarinete;
    }

    public function obtenerRequinto()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "requinto" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->requinto[] = $filas;
        }

        return $this->requinto;
    }

    public function obtenerClarineteBajo()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "clarinete bajo" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->clarinetebajo[] = $filas;
        }

        return $this->clarinetebajo;
    }


    public function obtenerSaxofon()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "saxofon alto" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->saxofon[] = $filas;
        }

        return $this->saxofon;
    }

    public function obtenerSaxofonTenor()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "saxofon tenor" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->saxofontenor[] = $filas;
        }

        return $this->saxofontenor;
    }

    public function obtenerSaxofonBaritono()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "saxofon baritono" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->saxofonbaritono[] = $filas;
        }
        return $this->saxofonbaritono;
    }

    public function obtenerTrompeta()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "trompeta" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->trompeta[] = $filas;
        }
        return $this->trompeta;
    }

    public function obtenerFliscorno()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "fliscorno" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->fliscorno[] = $filas;
        }
        return $this->fliscorno;
    }


    public function obtenerTrompa()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "trompa" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->trompa[] = $filas;
        }
        return $this->trompa;
    }

    public function obtenerTrombon()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "trombon" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->trombon[] = $filas;
        }
        return $this->trombon;
    }

    public function obtenerBombardino()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_instrumento` = "bombardino" AND `m_activo` = 1 ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->bombardino[] = $filas;
        }
        return $this->bombardino;
    }

    public function obtenerPercusion()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE (`m_instrumento` = "percusion" AND `m_activo` = 1) ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->percusion[] = $filas;
        }
        return $this->percusion;
    }

    // Director y Presidente

    public function obtenerDirector()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_rol` = "director" ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->director[] = $filas;
        }
        return $this->director;
    }

    public function obtenerPresidente()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_miembros` WHERE `m_rol` = "presidente" ORDER BY `m_apellidos` ASC ');
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->presidente[] = $filas;
        }
        return $this->presidente;
    }

    ///////////////////////////////////////

    // Insertar nuevo miembro

    public function newMiembro($nombre, $apellido, $email, $telefono, $instrumento, $rol, $activo, $fecha, $usid)
    {
        $query = "INSERT INTO `bmel_miembros` (`m_nombre`, `m_apellidos`, `m_email`, `m_telefono`, `m_instrumento`, `m_rol`, `m_fechaentrada`, `m_activo`, `us_id`) VALUES (:nombre, :apellido , :email, :telefono, :instrumento, :rol, :fecha, :activo, :usid) ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_INT);
        $stmt->bindParam(':instrumento', $instrumento, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
        $stmt->bindParam(':activo', $activo, PDO::PARAM_INT);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':usid', $usid, PDO::PARAM_INT);
        $stmt->execute();
    }

    /////////////////////////////////////

    // Obtener datos un miembro
    public function dataMiembro($idus)
    {
        $query = 'SELECT * FROM `bmel_miembros` WHERE us_id = :usid ';

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usid', $idus, PDO::PARAM_INT);
        $stmt->execute();

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->miembro[] = $filas;
        }
        return $this->miembro;
    }

    /////////////////////////////

    // Actualizar miembros
    public function actualizarMiembro($nombre, $apellido, $email, $telefono, $instrumento, $rol, $activo, $fecha, $id)
    {
        $query = 'UPDATE `bmel_miembros` SET `m_nombre` = :nombre, `m_apellidos` = :apellido, `m_email` = :email, `m_telefono` = :telefono, `m_instrumento` = :instrumento, `m_rol` = :rol, `m_fechaentrada` = :fecha, `m_activo` = :activo WHERE `us_id` = :id ';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_INT);
        $stmt->bindParam(':instrumento', $instrumento, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
        $stmt->bindParam(':activo', $activo, PDO::PARAM_INT);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

    }

    // Eliminar usuario
    // Solo admins
    public function eliminarMiembro($id){
        $query = 'DELETE FROM `bmel_miembros` WHERE us_id = :id';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }
}
