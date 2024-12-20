
$(document).ready(function () {
  $("#frmSesion").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData($("#frmSesion")[0]);
    $.ajax({
      url: "../ajax/registroSesion.php?op=acceder",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        alert(datos); 
      }
    });
  });
});

