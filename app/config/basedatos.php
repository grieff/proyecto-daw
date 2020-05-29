<?php 

// PARAMETROS DE CONEXION

// // Empieza sesion
// session_start();

// Para poder realizar la conexion necesitamos de ciertos parametros: 

$host = "localhost";        // Indica donde se encuentra el servidor
$bd = "m07";                // Indica el nombre de nuestra base de datos
$user = "admin";            // Indica el usuario con el que accederemos a nuestra BBDD
$pass = "DAW_m07_uf3";      // La contraseña para acceder con el usuario indicado arriba


// CONEXION A GESTOR BBDD
$con = new mysqli($host, $user, $pass); 


// Control de errores de conexion
if ($con->connect_errno) {
	echo "La conexion ha fallado";
	exit();
}

// Seleccionar BBDD
$con -> select_db($bd) or die("<h1>Error en la conexion a la base de datos</h1>");
// Si hay un error, la conexion se cierra y muestra el mensaje indicado.
 
// Idioma conexion
$con -> set_charset("UTF8");


 ?>