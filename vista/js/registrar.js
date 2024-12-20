$(document).ready(function () {
  $("#frmRegistrar").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData($("#frmRegistrar")[0]);
    $.ajax({
      url: "../ajax/registroSesion.php?op=registro",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        alert(datos);
      }
    });
  });

  
  $("#edad").on("click", function () {
    var fechaNacimiento = $("#fechaNacimiento").val();
    if (!fechaNacimiento) {
      alert("Por favor, selecciona una fecha de nacimiento.");
      return;
    }

    $.ajax({
      url: "../ajax/registroSesion.php?op=edad",
      type: "POST",
      data: { fechaNacimiento: fechaNacimiento },
      success: function (datos) {
        alert(datos);
      }
    });
  });
});
