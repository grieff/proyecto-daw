<?php 

	class Home_model {

		private $db;
		private $allevents;
		private $next_events;

		public function __construct() {
			require_once 'app/model/Database.php';
			$this->db = Database::conexion();
			$this->allevents = array();
			$this->next_events = array();
		}


		public function obtenerEventos() {
			$consulta = $this->db->query('SELECT * FROM bmel_eventos');

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
				$this->allevents[] = $filas;
			}

			return $this->allevents;
		}




		public function siguienteEvento() {
			// Hacer consulta

			$stmt = $this->db->prepare('SELECT * FROM bmel_eventos where ev_fechainicio >= :fecha');

			$now = new Datetime();
			$date = $now -> format('Y-m-d H:i:s');
			$stmt -> bindParam(':fecha', $date, PDO::PARAM_STR);
			$stmt -> execute();


			// Recorre resultados y guarda en array next_events
			while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$this->next_events[] = $filas;
			}
			// Devuelve array con siguientes eventos
			return $this->next_events;
		}



	}
	
 ?>