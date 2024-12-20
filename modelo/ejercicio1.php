<?php
require "../config/conexion.php";

class Mascota {
    public function __construct() {
    }

    public function obtenerMascotas() {
        $sql = "SELECT * FROM mascota";
        return $sql; 
    }
}
?>
