// JavaScript con jQuery
function calcularPotencia() {
    const valor = $("#valor").val();
    const potencia = $("#potencia").val();

  
    if (isNaN(valor) || valor === "") {
        alert("Solo se permite ingresar numeros.");
        return;
    }

    
    const resultado = Math.pow(Number(valor), Number(potencia));

    
    window.location.href = `resultado.html?resultado=${resultado}`;
}

//para mostrar los resultados en la otra página
$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const resultado = urlParams.get('resultado');

    if (resultado) {
        $("#resultado").text(`El resultado es: ${resultado}`);
    }
});
