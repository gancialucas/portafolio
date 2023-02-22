<?php 
    class conexion {
        private $servidor = "localhost";
        private $usuario = "root";
        private $contraseña = "";

        private $conexion;

        public function __construct(){
            try {
                $this->conexion = new PDO("mysql:host=$this->servidor; dbname=album", $this->usuario, $this->contraseña);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                return "Conexión fallida: ".$e;
            }
        }

        // Método para insertar/borrar/editar a la BD
        public function ejecutar ($sql) {
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }

        // Método para mostar info de BD
        public function consultar($sql) {
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();
        }
    }
?>