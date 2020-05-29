<?php 
		
	// Modelo
	require_once 'app/model/Evento_model.php';

	$home = new Evento_model();

	// $matrizEventos = $home -> obtenerEventos();	

	$siguienteEvento = $home -> siguienteEvento();

	// Vista
	require_once 'app/view/index.php';


 ?>