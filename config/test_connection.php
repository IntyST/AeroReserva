<?php
require_once "conexion.php"; // Asegúrate de que estás incluyendo el archivo correcto

// Crear una instancia del objeto de conexión
$db = new Cls_DataConnection();

// Intentar conectar y verificar si la conexión se establece correctamente
$conexion = $db->Fn_getConnect();

// Verificar la conexión
if ($conexion->connect_errno) {
    echo "Error al conectar con la base de datos: " . $conexion->connect_error;
} else {
    echo "Conexión exitosa a la base de datos!";
}

// Cerrar la conexión
$conexion->close();
?>
