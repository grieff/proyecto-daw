<?php
// Modelo
require_once 'app/model/evento_model.php';

$ev = new Evento_model();

$titulo = '';
$descripcion = '';
$tipo = '';
$fechainicio = '';
$fechafin = '';
$ubicacion = '';

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $dataEv = $ev ->getEvent($id);

    $datosEv = $dataEv[0];

    $titulo = $datosEv['ev_titulo'];
    $descripcion = $datosEv['ev_descripcion'];
    $tipo = $datosEv['ev_tipo'];
    $fechainicio = $datosEv['ev_fechainicio'];
    $fechafin =  $datosEv['ev_fechafin'];
    $ubicacion = $datosEv['ev_ubicacion'];

    $dateinicio = explode(" ", $fechainicio);
    $datefin = explode(" ", $fechafin);

    $diainicio = $dateinicio[0];
    $horainicio = $dateinicio[1];
    $diafin = $datefin[0];
    $horafin = $datefin[1];



    if(isset($_POST['enviar'])) {

        $titulo = $_POST['titulo'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $diainicio = $_POST['fecha-inicio'];
        $horainicio = $_POST['hora-inicio'];
        $diafin = $_POST['fecha-fin'];
        $horafin = $_POST['hora-fin'];
        $ubicacion = $_POST['ubicacion'];

        $formato = "%s %s";
        $fechainicio = sprintf($formato, $diainicio, $horainicio);
        $fechafin = sprintf($formato, $diafin, $horafin);

        $date = explode("-", $fechainicio);
        $mes = $date[1];
        $ano = $date[0];

        $upd = $ev -> actualizarEvento($id, $titulo, $descripcion, $tipo, $fechainicio, $fechafin, $mes, $ano, $ubicacion);


    }


}
