<?php 
require_once "local.php";

    function Fn_getConnect()
    {
        $conexion1 = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($conexion1->connect_error) {
            echo "Error conectando la base de datos: " . $conexion1->connect_error;
            exit();
        }
        return $conexion1;
    }
    
    function ejecutarConsultaSP($sql){ 
			$Cn =  Fn_getConnect();
			$query= $Cn -> query($sql);
			$Cn -> close();
			return $query;		
		}

?>
