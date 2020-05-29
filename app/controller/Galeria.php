<?php
// Modelo
require_once 'app/model/Imagen_model.php';
require_once 'app/model/Evento_model.php';

$img = new Imagen_model();
$ev = new Evento_model();

if(isset($_GET['id'])) {

    $idev = $_GET['id'];

    $datosEv = $ev->getEvent($idev);

    $listaImg = $img->allImg($idev);
    // print_r($listaImg);

    
    $titulo = $datosEv[0]['ev_titulo'];
}












?>