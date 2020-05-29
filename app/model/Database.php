<?php 
	// Clase para la conexion a base de datos y ejecutar consultas
	class Database {

		// Conectar

		public static function conexion() {
			try {

				$conexion = new PDO('mysql:host=localhost; dbname=bmel', 'root', '');

				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$conexion->exec('SET CHARACTER SET UTF8');
				
			} catch (Exception $e) {

				die('Error'. $e->getMessage());

				echo 'Linea del error' . $e->getLine();
			}

			return $conexion;
		}

		



	}

 ?>