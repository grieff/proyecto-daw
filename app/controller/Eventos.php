<?php

// Modelo
require_once 'app/model/evento_model.php';

$evento = new Evento_model;

$matrizEventosPublicos = $evento ->obtenerEventosPublicos();

$conteoEventosPublicos = $evento -> countRowPublic();


    

    












// Vista
require_once 'app/view/events.php';




?>