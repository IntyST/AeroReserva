
  $("#formulario").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData($("#formulario")[0]);
    $.ajax({
      url: "../ajax/ejercicio1.php?op=suma",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        alert(datos);
      }
    });
  }

  // Manejo del botón precargar
 function precargar() {
    $.ajax({
      url: "../ajax/ejercicio1.php?op=precargar",
      type: "POST",
      data: "",
      contentType: false,
      processData: false,
      success: function (datos) {
        alert(datos);
      }
    });
  }
