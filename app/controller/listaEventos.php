<?php
// Modelo
require_once 'app/model/evento_model.php';

$ev = new Evento_model();

$nreg = $ev -> allEvents();

$reg_pag = 20; // Registros por pagina

// Seleccion pagina
if (isset($_GET['pag'])) {

    $pag = $_GET['pag'];
} else {
    $pag = 1; // Pagina inicial
}

$start = ($pag - 1) * $reg_pag; // Inicio registros

$total_pag = ceil($nreg / $reg_pag); // Numero total pag


$listaEventos = $ev ->obtenerEventos($start, $reg_pag);




?>