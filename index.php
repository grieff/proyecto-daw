<?php

// Archivo iniciador -> carga config  
require_once 'app/init.php';
session_start();




// Requerir url
$request = $_SERVER['REQUEST_URI'];
$fullURL = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



if (isset($_GET['view'])) {
	switch ($_GET['view']) {
		case 'historia': // Historia
			include __DIR__ . "/app/view/historia.php";
			break;
		case 'plantilla': // Plantilla
			include __DIR__ . "/app/controller/plantilla.php";
			break;
		case 'eventos': // Eventos
			include __DIR__ . "/app/controller/eventos.php";
			break;
		case 'directores': // Directores
			include __DIR__ . "/app/view/directores.php";
			break;
		case 'galeria': // Galeria
			include __DIR__ . "/app/view/galeria.php";
			break;
		case 'galeriaevento': // Galeria
			include __DIR__ . "/app/view/galeriaevento.php";
			break;
		case 'login': // Login
			include __DIR__ . "/app/controller/login.php";
			break;
			// Intranet
			// Usuarios registrados only
		case 'intranet':
			if (isset($_SESSION['sucess'])) {
			include __DIR__ . "/app/controller/intranet.php";
			} else {
				header('location: index.php');
			}
			break;
		case 'lista-miembros': // Lista miembros
			if (isset($_SESSION['sucess'])) {
				include __DIR__ . "/app/controller/miembros.php";
			} else {
				header('location: index.php');
			}
			break;
		case 'eventos-miembros': // Eventos intranet
			if (isset($_SESSION['sucess'])) {
				include __DIR__ . "/app/controller/eventos_privado.php";
			} else {
				header('location: index.php');
			}
			break;
		case 'lista-partituras': // Partituras
			if (isset($_SESSION['sucess']) ) {
				include __DIR__ . "/app/controller/partituras.php";
			} else {
				header('location: index.php');
			}
			break;

			// Mod & Admin pages only
		case 'miembro': // Nuevo miembro
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
			include __DIR__ . "/app/view/form/form_usuario.php";
			} else {
				header('location: index.php');
			}
		case 'editarmiembro': // editar miembro
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
				include __DIR__ . "/app/view/form/mod_usuario.php";
			} else {
				header('location: index.php');
			}
			break;

		case 'nuevapass': // Nuevo password
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
				include __DIR__ . "/app/controller/nuevaPass.php";
			} else {
				header('location: index.php');
			}
			break;

		case 'eventonuevo': // Nuevo evento
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
			include __DIR__ . "/app/view/form/form_evento.php";
			} else {
				header('location: index.php');
			}
			break;
		case 'editarevento': // Nuevo evento
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
				include __DIR__ . "/app/view/form/mod_evento.php";
			} else {
				header('location: index.php');
			}
			break;
		case 'lista-evento': // Listar evento
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
				include __DIR__ . "/app/view/intranet/lista-eventos.php";
			} else {
				header('location: index.php');
			}
			break;
		case 'editarevento': // editar evento
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
				include __DIR__ . "/app/view/form/mod_evento.php";
			} else {
				header('location: index.php');
			}
			break;


		case 'partitura': // Nueva partitura
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
				include __DIR__ . "/app/view/form/form_partitura.php";
			} else {
				header('location: index.php');
			}
			break;
		case 'editarpart': // editar partitura
			if (isset($_SESSION['sucess']) && $_SESSION['tipo'] > 10) {
				include __DIR__ . "/app/view/form/mod_partitura.php";
			} else {
				header('location: index.php');
			}
			break;


		case '': 
			break;
		case '': 
			break;
		case '7':
			include __DIR__ . "/app/eventsPublic.php";
			break;
		default: // Default / index
			include "/app/controller/banda.php";
			break;
	}
} else {
	include "app/controller/banda.php";
}





