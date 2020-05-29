<?php

// Modelo
require_once 'app/model/partitura_model.php';

$partitura = new Partitura_model();

$listaPartituras = $partitura -> obtenerPartituras();


// Vista
require_once 'app/view/intranet/partituras.php';

?>