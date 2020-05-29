<?php
header('Content-Type: application/json');
require_once 'app/model/evento_model.php';

$evento = new Evento_model;

$matrizEventosPublicos = $evento->obtenerEventosPublicos();

$array_eventos = array();
$i = 0;
foreach ($matrizEventosPublicos as $eventoPublico) {

    $titulo = $eventoPublico['ev_titulo'];

    $fechainicio = $eventoPublico['ev_fechainicio'];
    $fechainicio = explode(' ', $fechainicio);
    // echo $fechainicio[0];
    // echo $fechainicio[1];
    $formato_fecha = "%sT%s";
    $fechainicio = sprintf($formato_fecha, $fechainicio[0], $fechainicio[1]);
    // echo $fechainicio;


    $tipo_ev = $eventoPublico['ev_tipo'];

    $fechafin = $eventoPublico['ev_fechafin'];
    $fechafin = explode(' ', $fechafin);
    $fechafin = sprintf($formato_fecha, $fechafin[0], $fechafin[1]);

    // Datos para eventos
    $classeventos = 'ev-calendar'; // Clase css
    $color = array();
    $color[0] = '#963b3b'; // procesion
    $color[1] = '#106303'; // concierto
    $color[2] = '#605B0A'; // pasacalles
    $color[4] = '#4d0000'; // evento especial
    $color[5] = '#000000'; // toros
    $color[50] = 'gray'; // Ensayo
    $color[60] = '#4C616A'; // ensayo especial
    $color[100] = ''; // Eventos solo miembros, viajes, etc => Color por defecto
    $allDay = true;

    $listadoEventosPublicos['title'] = $titulo;
    $listadoEventosPublicos['start'] = $fechainicio;
    $listadoEventosPublicos['end'] = $fechafin;
    $listadoEventosPublicos['className'] = $classeventos;

    switch ($tipo_ev) {
        case '0': // procesion
            $listadoEventosPublicos['color'] = $color[0];
            break;
        case '1'; // concierto
            $listadoEventosPublicos['color'] = $color[1];
        break;
        case '2'; // pasacalles
            $listadoEventosPublicos['color'] = $color[2];
            break;
        case '4'; // evento especial
            $listadoEventosPublicos['color'] = $color[4];
            break;
        case '5'; // toros
            $listadoEventosPublicos['color'] = $color[5];
            break;
        case '50'; // Ensayo
            $listadoEventosPublicos['color'] = $color[50];
            break;
        case '60'; // Ensayo especial
            $listadoEventosPublicos['color'] = $color[60];
            break;
    }
    

    // print_r($listadoEventosPublicos);

    $jsonListado = json_encode($listadoEventosPublicos, JSON_UNESCAPED_UNICODE);

    // echo print_r($jsonListado);


    // print_r($jsonListado);
    // echo ",";
    array_push($array_eventos, $listadoEventosPublicos);


}

// print_r($array_eventos);
// echo "<div id='public-events-data' style='display:none'>";
print_r(json_encode($array_eventos, JSON_UNESCAPED_UNICODE));
// echo "</div>"


?>