<?php
// Modelo
require_once 'app/model/Miembro_model.php';

$miembros = new Miembro_model();

// Todos los miembros
$matrizMiembros = $miembros -> allMembers();

// Viento Madera
$matrizFlauta = $miembros -> obtenerFlauta();
$matrizOboe = $miembros->obtenerOboe();
$matrizFagot = $miembros->obtenerFagot();
$matrizClarinete = $miembros->obtenerClarinete();
$matrizRequinto = $miembros->obtenerRequinto();
$matrizClarineteBajo = $miembros->obtenerClarineteBajo();
$matrizSaxofon = $miembros->obtenerSaxofon();
$matrizSaxofonTenor = $miembros->obtenerSaxofonTenor();
$matrizSaxofonBaritono = $miembros->obtenerSaxofonBaritono();

// Viento metal
$matrizTrompeta = $miembros->obtenerTrompeta();
$matrizFliscorno = $miembros->obtenerFliscorno();
$matrizTrompa = $miembros->obtenerTrompa();
$matrizTrombon = $miembros->obtenerTrombon();
$matrizBombardino = $miembros->obtenerBombardino();

// Percusion
$matrizPercusion = $miembros->obtenerPercusion();


// Director y presidente
$matrizDirector = $miembros -> obtenerDirector();
$matrizPresidente = $miembros->obtenerPresidente();








// Vista
require_once 'app/view/plantilla.php';


?>