<?php
//Modelo
require_once 'app/model/partitura_model.php';
require_once 'app/model/usuario_model.php';

$part = new Partitura_model();
$user = new Usuario_model();

$id = $user -> getId($_SESSION['usuario']);

$id_us = $id[0];


$titulo = "";
$compositor = "";
$ruta = "";
$tipo = 3;

if (isset($_POST['enviar'])) {

    $titulo = $_POST['titulo'];
    $compositor = $_POST['compositor'];
    $ruta = $_POST['ruta'];
    $tipo = $_POST['tipo'];

    $newPart = $part -> nuevaPartitura($titulo, $compositor, $tipo, $ruta, $id_us);

    header('location: index.php?view=lista-partituras');

}








