<!-- Contenido intranet *index*-->

<div class="intranet">
	<h1 class="header-h1">Area miembros</h1>
	<div class="intranet-content">
		<!-- Tablon Anuncios -->
		<div class="tablon-anuncios">
			<h2>Tablón de anuncios</h2>
			<br>
			<!-- Siguiente ensayo -->
			<div class="next-ensayo">
				<h3 class="card-title"><i class="fas fa-calendar-week"></i> Próximo evento</h3>
				<h5 class="card-text centered">
					<?php

					foreach ($siguienteEvento as $nextEvento) {
						echo "<p>" . $nextEvento['ev_titulo'] . "</p>";
						$datetime = $nextEvento['ev_fechainicio'];
						$fecha = explode(' ', $datetime);
						$hora = $fecha[1];
						$f_final = explode('-', $fecha[0]);
						echo "Fecha: ";
						echo $f_final[2] . '/';
						echo $f_final[1];
						echo "<br>Hora: ";
						echo $hora;
					}
					?></h5>
				<br>
			</div>
			<!-- Siguiente evento -->
			<div class="next-evento">
				<h3 class="card-title"><i class="fas fa-calendar-day"></i> Próximo ensayo</h3>
				<h5 class="card-text centered">
					<?php

					foreach ($siguienteEnsayo as $nextEnsayo) {
						echo "<p>" . $nextEnsayo['ev_titulo'] . "</p>";
						$datetimeY = $nextEnsayo['ev_fechainicio'];
						$fechaY = explode(' ', $datetimeY);
						$horaY = $fechaY[1];
						$fY_final = explode('-', $fechaY[0]);
						echo "Fecha: ";
						echo $fY_final[2] . '/';
						echo $fY_final[1];
						echo "<br>Hora: ";
						echo $horaY;
					}
					?></h5>
			</div>

			<!-- Button Eventos privado -->
			<a href="index.php?view=eventos-miembros" class="btn btn-elegant flex-btn"> Ver Calendario de eventos </a>
		</div>
		<!-- Partituras -->
		<div class="partituras">
			<h3 class="card-title" style="text-align:left"><i class="fas fa-music"></i> Partituras</h3>

			<?php foreach ($listaPartituras as $partitura) {
				echo "<h5>";
				echo $partitura['part_titulo'];
				echo "</h5>";
			}
			?>
<br>
			<a href="index.php?view=lista-partituras" class="btn btn-elegant flex-btn"> Ver Partituras</a>
		</div>
		<!-- Lista miembros -->
		<div class="intra-miembros">
			<h3 class="card-title" style="text-align:left"><i class="fas fa-user"></i> Miembros</h3>
			<br>
			<a href="index.php?view=lista-miembros" class="btn btn-elegant flex-btn"> Ver Lista de miembros </a>
		</div>
	</div>
</div>