<!DOCTYPE html>
<html>
<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>







<div id="index">


	<!--Carousel Wrapper-->
	<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
		<!--Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-2" data-slide-to="1"></li>
			<li data-target="#carousel-example-2" data-slide-to="2"></li>
		</ol>
		<!--/.Indicators-->
		<!--Slides-->
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div class="view">
					<img class="d-block w-100" src="public/images/carousel_main01.jpg" alt="First slide">
					<div class="mask rgba-black-light"></div>
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive">Banda Municipal de Música de El Bonillo</h3>
					<p>Fundada en 1992</p>
				</div>
			</div>
			<div class="carousel-item">
				<!--Mask color-->
				<div class="view">
					<img class="d-block w-100" src="public/images/carousel_main02.jpg" alt="Second slide">
					<div class="mask rgba-black-light"></div>
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive">Concierto Extraordinario Santa Cecilia. The Armed Man</h3>
					<p><a href="index.php?view=galeria" class="carousel-link"> Ver galería de imágenes </a></p>
				</div>
			</div>
			<div class="carousel-item">
				<!--Mask color-->
				<div class="view">
					<img class="d-block w-100" src="public/images/carousel_main03.jpg" alt="Third slide">
					<div class="mask rgba-black-slight"></div>
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive">Una banda con una plantilla joven</h3>
					<p><a href="index.php?view=plantilla" class="carousel-link"> Ver plantilla </a></p>
				</div>
			</div>
		</div>
		<!--/.Slides-->
		<!--Controls-->
		<a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			<span class="sr-only">Next</span>
		</a>
		<!--/.Controls-->
	</div>
	<!--/.Carousel Wrapper-->


	<!-- GRID CONTAINER -->
	<div class="grid-container">
		<div class="calendario">
			<div class="card-body">
				<h3 class="card-title"><i class="fas fa-calendar-week"></i> Próximo evento</h3>
				<h5 class="card-text centered">
					<br>
					<?php

					foreach ($siguienteEvento as $nextEvento) {
						echo $nextEvento['ev_titulo'] . "<br>";
						$datetime = $nextEvento['ev_fechainicio'];
						$fecha = explode(' ', $datetime);
						$hora = $fecha[1];
						$f_final = explode('-', $fecha[0]);
						echo "Fecha: ";
						echo $f_final[2] . '/';
						echo $f_final[1];
						echo "<br> Hora: ";
						echo $hora;
					}
					?></h5>
				<a href="index.php?view=eventos" class="btn btn-elegant flex-btn"> Ver Calendario de eventos </a>
			</div>
		</div>
		<div class="conocenos">
			<div class="card-body">
				<h3 class="card-title">Conócenos</h3>

				<p>Fundada en 1992, la Banda Municipal de El Bonillo es el referente musical de la escuela de música municipal. Inscrita en la Guía Cultural de la Diputación de Albacete, realiza sus primeros conciertos por la provincia al año siguiente. A partir de ello, organiza los Encuentros Regionales de Bandas con sede en El Bonillo y desarrolla Festivales de Bandas "Villa de El Bonillo". <br> </p>
				<p>Con una plantilla joven de entorno a 70 miembros actualmente, que se regenera con nuevos músicos provenientes de la escuela de música. </p>


				<a href="index.php?view=historia" class="btn btn-elegant flex-btn"> Ver Historia </a>
				<a href="index.php?view=historia" class="btn btn-elegant flex-btn"> Ver Plantilla </a>
			</div>
		</div>
		<div class="ultimas-noticias">
			<div class="card-body">
				<h3 class="card-title">Últimas noticias</h3>
				<p style="text-align:justify">Con motivo de la festividad del Primero de Mayo, la Banda Municipal ha grabado, con algunos de sus miembros, una interpretación coordinada desde casa del pasodoble Juanito el Jarri, compuesto en 2003 y dedicado al amigo del autor Juan López Sánchez, que ha sido incorporado al repertorio de la Banda e iba a estrenar durante esta Romería 2020. </p>
				<div class="centered"><iframe width="560" height="315" src="https://www.youtube.com/embed/8HkmJwc3qe0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>

			</div>
		</div>
	</div>


</div>


<!-- Pie -->
<!-- Incluye scripts -->
<?php include 'app/view/inc/footer.php'; ?>