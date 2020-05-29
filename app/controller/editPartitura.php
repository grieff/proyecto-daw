<?php
//Modelo
require_once 'app/model/partitura_model.php';

$part = new Partitura_model();

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $data = $part ->infoPartitura($id);


    if(isset($_POST['enviar'])) {

        $titulo = $_POST['titulo'];
        $compositor = $_POST['compositor'];
        $ruta = $_POST['ruta'];
        $tipo = $_POST['tipo'];

        $upd = $part -> editarPartitura($id, $titulo, $compositor, $tipo, $ruta);

         

    }
}




?>