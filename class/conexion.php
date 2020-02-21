<?php
	class conexion {
		public $pdo;
		
		public function __construct() {}
		
		public function abrir_conexion() {
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "consultorjuridico";
			
			try {
				$this -> pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
				//echo "La conexion se ha establecido correctamente";
			} catch(Exception $e) {
				die("La conexion no se pudo establecer ".$e -> getMessage());
			}
		}
		
		public function __destruct() {}
	}
?>



