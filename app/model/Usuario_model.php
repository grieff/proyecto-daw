<?php

class Usuario_model
{
    private $db;
    private $usuarios;
    private $id;
    private $tipo;
    private $user;


    public function __construct()
    {
        require_once 'app/model/Database.php';
        $this->db = Database::conexion();
        $this->usuarios = array();
        $this->nombresesion = array();
        $this->tipo = array();
        $this->user = array();
        
        
    }


    // Tipo de usuario
    // Control de funciones a las que tiene acceso
    public function tipoUsuario($user)
    {
        // Comprobar si existe usuario en BD
        $stmt = $this->db->prepare('SELECT `us_tipo` FROM `bmel_usuarios` WHERE `us_username` = :usuario');

        $stmt->bindParam(':usuario', $user, PDO::PARAM_STR);
        $stmt->execute();

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->tipo[] = $filas;
        }

        return $this->tipo;
    }


    // Login
    public function comprobarUsuario($user, $pass)
    {
        // Comprobar si existe usuario en BD
        $stmt = $this->db->prepare('SELECT * FROM bmel_usuarios WHERE us_username = ? AND us_pass = ?');

        $stmt->bindParam(1, $user, PDO::PARAM_STR);
        $stmt->bindParam(2, $pass, PDO::PARAM_STR);
        $stmt->execute();

        $rows = $stmt->rowCount();
        return $rows;
    }

    // Devuelve todos los usuarios
    public function todosUsuarios()
    {
        $stmt = $this->db->query('SELECT * FROM `bmel_usuarios`');

        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->usuarios[] = $filas;
        }

        return $this->usuarios;
    }



    // Generador pass
    public function randomString()
    {
        $largo = 10;
        $contenido = '01234567890abcdefghijklmnopqrstuvwyzABCDEFGHIJKLMNOPQRSTUVWYZ';
        $str = '';

        $max = mb_strlen($contenido, '8bit') - 1;
        if ($max < 1) {
            throw new Exception('$contenido debe tener al menos dos caracteres');
        }
        for ($i = 0; $i < $largo; $i++) {
            $str .= $contenido[random_int(0, $max)];
            // random_int genera una pass lo suficientemente segura, y es mas seguro que escribir
            // una nueva implementacion por el estilo. 
        }
        return $str;
    }

    // Insertar nuevo usuario

    public function newUser($user, $pass, $tipo, $fecha)
    {
        $query = 'INSERT INTO `bmel_usuarios` (`us_username`, `us_pass`, `us_tipo`, `us_fecharegistro`) VALUES (:user, :pass, :tipo, :fecha)';

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->execute();

    }

    // Usuario existe
    public function existUser($user) {
        $query = 'SELECT * FROM `bmel_usuarios` WHERE `us_username` = :user ';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->execute();
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->user[] = $filas;
        }

        return $this->user;
    }

    // Obtener id user para insertar miembro
    public function getId($user) {
        $query = 'SELECT `us_id` FROM `bmel_usuarios` WHERE `us_username` = :user ';

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->execute();
        $this->id = $stmt->fetch();

        return $this->id;
    }
 

    // Update password
    public function updatePass($id, $pass) {
        $query = 'UPDATE `bmel_usuarios` SET us_pass = :pass WHERE us_id = :id';

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }


    // Eliminar usuario
    // Solo admins
    public function eliminarUsuario($id) {
        $query = 'DELETE FROM `bmel_usuarios` WHERE us_id = :id';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }
}
