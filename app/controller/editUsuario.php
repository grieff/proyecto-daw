<?php

// Modelo
require_once 'app/model/Miembro_model.php';
require_once 'app/model/Usuario_model.php';

$usuario = new Usuario_model();
$miembro = new Miembro_model();

$nombre = '';
$apellido = '';
$email = '';
$telefono = '';
$instrumento = '';
$rol = '';
$fecha = '';
$activo = 1;

// $test = $miembro->dataMiembro(6);


if(isset($_GET['id'])) {

    $idus = $_GET['id'];

    $editData = $miembro -> dataMiembro($idus);

    foreach ($editData as $data) {
        $nombre = $data['m_nombre'];
        $apellido = $data['m_apellidos'];
        $email
        = $data['m_email'];
        $telefono =
        $data['m_telefono'];
        $instrumento =
        $data['m_instrumento'];
        $rol =
        $data['m_rol'];
        $fecha =
        $data['m_fechaentrada'];
        $activo =
        $data['m_activo'];

        
    }


    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['surname'];
        $email = $_POST['mail'];
        $telefono = $_POST['phone'];
        $instrumento = $_POST['instrument'];
        $rol = $_POST['rol'];
        $activo = $_POST['active'];
        $fecha = $_POST['fechaentrada'];

        $update = $miembro->actualizarMiembro($nombre, $apellido, $email, $telefono, $instrumento, $rol, $activo, $fecha, $idus);


        header('location: index.php?view=lista-miembros'); 

    }


}











?>