<?php
// Modelo 
require_once 'app/model/evento_model.php';
require_once 'app/model/partitura_model.php';

$intranet = new Evento_model();
$partitura = new Partitura_model();

$siguienteEvento = $intranet -> siguienteEvento();

$siguienteEnsayo = $intranet -> siguienteEnsayo();

$listaPartituras = $partitura -> obtenerPartituras();






// Vista
require_once 'app/view/intranet/intranet.php';

?>
