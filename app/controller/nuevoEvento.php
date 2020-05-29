<?php
// Modelo
require_once 'app/model/Evento_model.php';
require_once 'app/model/Usuario_model.php';

$ev = new Evento_model();
$us = new Usuario_model();

$id = $us ->getId($_SESSION['usuario']);


if(isset($_POST['enviar'])) {

    $titulo = $_POST['titulo'];
    $tipo = $_POST['tipo'] ;
    $descripcion = $_POST['descripcion'];
    $diainicio = $_POST['fecha-inicio'];
    $horainicio = $_POST['hora-inicio'];
    $diafin = $_POST['fecha-fin'];
    $horafin = $_POST['hora-fin'];
    $ubicacion = $_POST['ubicacion'];

    $formato = "%s %s";
    $fechainicio = sprintf($formato, $diainicio, $horainicio);
    $fechafin = sprintf($formato, $diafin, $horafin);

    

    $newEv = $ev -> nuevoEvento($titulo, $tipo, $fechainicio, $fechafin, $descripcion, $ubicacion, $id[0]);

}










?>