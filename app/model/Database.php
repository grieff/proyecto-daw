<?php 
	// Clase para la conexion a base de datos y ejecutar consultas
	class Database {

		// Conectar

		public static function conexion() {
			try {

				$conexion = new PDO('mysql:host=eu-cdbr-west-03.cleardb.net; dbname=heroku_bf3a5e58760ad8a', 'b1794f344b6fa7', 'e630e93c8c7672c');

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