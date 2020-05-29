<?php
header('Content-Type: application/json');
require_once 'app/model/evento_model.php';

$evento = new Evento_model;

$matrizEventosPrivados = $evento->obtenerEventosPrivados();

$array_eventos = array();
$i = 0;
foreach ($matrizEventosPrivados as $eventoPrivado) {

    $titulo = $eventoPrivado['ev_titulo'];

    $fechainicio = $eventoPrivado['ev_fechainicio'];
    $fechainicio = explode(' ', $fechainicio);
    // echo $fechainicio[0];
    // echo $fechainicio[1];
    $formato_fecha = "%sT%s";
    $fechainicio = sprintf($formato_fecha, $fechainicio[0], $fechainicio[1]);
    // echo $fechainicio;


    $tipo_ev = $eventoPrivado['ev_tipo'];

    $fechafin = $eventoPrivado['ev_fechafin'];
    $fechafin = explode(' ', $fechafin);
    $fechafin = sprintf($formato_fecha, $fechafin[0], $fechafin[1]);

    // Datos para eventos
    $classeventos = 'ev-calendar'; // Clase css
    $color = array();
    
    $color[50] = 'gray'; // Ensayo
    $color[60] = '#4C616A'; // ensayo especial
    $color[100] = ''; // Eventos solo miembros, viajes, etc => Color por defecto
    $allDay = true;

    $listadoEventosPrivados['title'] = $titulo;
    $listadoEventosPrivados['start'] = $fechainicio;
    $listadoEventosPrivados['end'] = $fechafin;
    $listadoEventosPrivados['className'] = $classeventos;

    switch ($tipo_ev) {

        case '50'; // Ensayo
            $listadoEventosPrivados['color'] = $color[50];
            break;
        case '60'; // Ensayo especial
            $listadoEventosPrivados['color'] = $color[60];
            break;
    }
    

   

    $jsonListado = json_encode($listadoEventosPrivados, JSON_UNESCAPED_UNICODE);

    // echo print_r($jsonListado);


    // print_r($jsonListado);
    // echo ",";
    array_push($array_eventos, $listadoEventosPrivados);


}

// print_r($array_eventos);
// echo "<div id='public-events-data' style='display:none'>";
print_r(json_encode($array_eventos, JSON_UNESCAPED_UNICODE));
// echo "</div>"
