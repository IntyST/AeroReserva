<?php
require('../modelo/ejercicio1.php');

switch ($_GET["op"]) {
    case "suma":
        echo $_POST["n1"] + $_POST["n2"];
        break;

    case "precargar":
        $mascota = new Mascota();
        $result = $mascota->obtenerMascotas();
        while ($row = $result->fetch_assoc()) {
           echo $html .= "<p>" . $row['nombre'] . " - " . $row['tipo_mascota'] . "</p>";
        }
        break;
    default:
        echo "Operación no válida";
        break;
}
?>
