<?php

// Modelo
require_once 'app/model/Miembro_model.php';
require_once 'app/model/Usuario_model.php';

$miembro = new Miembro_model();
$usuario = new Usuario_model();

// Controlador formulario usuario 

// 
$idprueba = $usuario ->getId("dtevar");
$exitprueba = $usuario ->existUser('vconde');
// Variables 
$user = "";


$pass = "";
$tipo = 0;
$fecha = "";


// $_POST['huser'] = $user;
// $_POST['useregister'] = $user;

$nombre = "";
$apellido = "";
$email = "";
$telefono = 000;
$instrumento = "-";
$rol = "Miembro";
$activo = 1;

// Nuevo miembro

$newpass = $usuario->randomString();

$passuser = $newpass;
$opc = ['cost' => 8];
$pass_hash = password_hash($passuser, PASSWORD_BCRYPT, $opc);

if (isset($_POST['enviar'])) {
    $user = $_POST['useregister'];
    $pass = $newpass;
    $tipo = 0;
    $rol = $_POST['rol'];
    if ($rol != "Miembro") {
        $tipo = 20;
    } else {
        $tipo = 0;
    }
    $fecha = $_POST['fechaentrada'];

// Crear nuevo usuario 
    $usuario->newUser($user, $pass_hash, $tipo, $fecha);

// Obtener id user
if (isset($id_us)) {
    $id_us = 0;
}
    

    $nombre = $_POST['nombre'];
    $apellido = $_POST['surname'];
    $email = $_POST['mail'];
    $telefono = $_POST['phone'];
    $instrumento = $_POST['instrument'];
    $rol = $_POST['rol'];
    $activo = $_POST['active'];

    // si el user existe, entonces crear miembro
    $existeUs = $usuario->existUser($user);
    $id_us = $usuario->getId($user);
    
    $idusuario = (int)$id_us[0];
    
    if ($id_us[0] > 1 ) {
        $miembro->newMiembro($nombre, $apellido, $email, $telefono, $instrumento, $rol, (int)$activo, $fecha,$idusuario);

        
    }
}





