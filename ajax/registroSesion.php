<?php
if ($_GET["op"] == "registro") {
    // Obtener los datos ingresados
    $primerNombre = $_POST["primerNombre"] ?? '';
    $segundoNombre = $_POST["segundoNombre"] ?? '';
    $primerApellido = $_POST["primerApellido"] ?? '';
    $segundoApellido = $_POST["segundoApellido"] ?? '';

    // Concatenar nombres y apellidos con un espacio entre ellos
    $nombreCompleto = trim("$primerNombre $segundoNombre $primerApellido $segundoApellido");

    // 1. Alternar mayúsculas y minúsculas con espacios preservados
    $alternado = '';
    for ($i = 0, $j = 0; $i < strlen($nombreCompleto); $i++) {
        if ($nombreCompleto[$i] === ' ') {
            $alternado .= ' '; // Preserva los espacios
        } else {
            $alternado .= ($j % 2 == 0) ? strtoupper($nombreCompleto[$i]) : strtolower($nombreCompleto[$i]);
            $j++;
        }
    }

    // 2. Reverso completo
    $reverso = strrev($nombreCompleto);

  // 3. Alternar palabras iniciales
$palabras = explode(' ', $nombreCompleto);
$maxLength = max(array_map('strlen', $palabras));
$iniciales = '';

for ($i = 0; $i < $maxLength; $i++) {
    foreach ($palabras as $palabra) {
        if (isset($palabra[$i])) {
            $iniciales .= strtoupper($palabra[$i]);
        }
    }
}

    // Devolver las tres cadenas como respuesta
    echo "1. $alternado\n2. $reverso\n3. $iniciales";
}

if ($_GET["op"]=="acceder"){
	$usuario = $_POST["usuario"] ?? '';
    $contrasenia = $_POST["contrasenia"] ?? '';
	
	if ($usuario==$contrasenia){
		echo 'Inicio de sesion exitoso'; 
	}else 
	echo 'Credenciales incorrectas';
		
}
if ($_GET["op"] == "edad") {
    $fechaNacimiento = $_POST["fechaNacimiento"] ?? '';

    if (!$fechaNacimiento) {
        echo "Por favor, proporciona una fecha válida.";
        exit;
    }

    // Convertir fecha
    $fechaNac = new DateTime($fechaNacimiento);
    $hoy = new DateTime();

    // Calcular edad
    $edad = $hoy->diff($fechaNac)->y;

    // Calcular edad en formato año-mes-día
    $edadCompleta = $hoy->diff($fechaNac)->format("%y años, %m meses y %d días");

    // Obtener el mes
    $meses = [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    ];
    $mes = $meses[$fechaNac->format("n") - 1];

    // Calcular el signo zodiacal
    $signosZodiacales = [
        ["Capricornio", "01-20"], ["Acuario", "02-19"], ["Piscis", "03-20"],
        ["Aries", "04-20"], ["Tauro", "05-20"], ["Géminis", "06-20"],
        ["Cáncer", "07-22"], ["Leo", "08-22"], ["Virgo", "09-22"],
        ["Libra", "10-22"], ["Escorpio", "11-21"], ["Sagitario", "12-21"],
        ["Capricornio", "12-31"]
    ];
    $signoZodiacal = "Desconocido";
    foreach ($signosZodiacales as $key => $signo) {
        [$nombre, $fechaLimite] = $signo;
        $limite = DateTime::createFromFormat("m-d", $fechaLimite);
        if ($fechaNac->format("m-d") <= $limite->format("m-d")) {
            $signoZodiacal = $nombre;
            break;
        }
    }

    // Calcular el signo chino
    $aniosChinos = [
        "Rata", "Buey", "Tigre", "Conejo", "Dragón", "Serpiente",
        "Caballo", "Cabra", "Mono", "Gallo", "Perro", "Cerdo"
    ];
    $signoChino = $aniosChinos[($fechaNac->format("Y") - 4) % 12];

    // Responder con los datos calculados
    echo "1. Edad: $edad\n";
    echo "2. $edadCompleta\n";
    echo "3. Mes: $mes\n";
    echo "4. Signo Zodiacal: $signoZodiacal\n";
    echo "5. Signo Chino: $signoChino";
}

?>
