function CampoVacio(dato) 
{
	var bandera = false;

	if(dato.length == 0)
	{ 
		bandera = true;
	}

	return bandera;
}

function Crear() {
    var cedula = $("#cedula").val().trim();
    var nombre = $("#nombre").val().trim();
    var direccion = $("#direccion").val().trim();
    var telefono = $("#telefono").val().trim();
    var ocupacion = $("#ocupacion").val().trim();
    var correo = $("#correo").val().trim();
  
    if (CampoVacio(cedula) || CampoVacio(nombre) || CampoVacio(direccion) || CampoVacio(telefono) || CampoVacio(ocupacion) || CampoVacio(correo)) {
      Swal.fire({
        position: "top",
        type: "warning",
        title: "Rellene los espacios en blanco",
      });
    } else {
      var parametros = {
        accion: "crear",
        cedula: cedula,
        nombre: nombre,
        direccion: direccion,
        telefono: telefono,
        ocupacion: ocupacion,
        correo: correo,
      };
      
      $.ajax({
        data: parametros,
        url: "../bussiness/ClienteAction.php",
        type: "POST",
        dataType: "html",
        
        success: function (dataresponse, statustext, response) {
          alert(dataresponse);
          if (dataresponse == true) {
            Swal.fire({
              position: "top",
              type: "success",
              title: "Datos Guardados Correctamente",
              showConfirmButton: false,
              timer: 3000,
            });
            Limpiar();
          } else {
           /* Swal.fire({
              position: "top",
              type: "error",
              title: "Datos no Guardados",
              showConfirmButton: false,
              timer: 3000,
            });*/
          }
        },
        error: function (request, errorcode, errortext) {
          Swal.fire({
            position: "top",
            type: "error",
            title: errortext,
            timer: 3000,
          });
        },
      });
    }
  }
  
  function Eliminar(id) {
    
    Swal.fire({
      position: "top",
      text: "¿Está seguro que desea eliminar este Vehiculo?",
      type: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirmar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.value) {
        $.post(
          "../bussiness/ClienteAction.php",
          {
            accion: "eliminar",
            id: id,
          },
          function (responseText) {console.log(responseText);
            if (responseText == true) {
              Swal.fire({
                position: "top",
                type: "success",
                title: "Vehiculo eliminado correctamente",
                showConfirmButton: false,
                timer: 3000,
              });
            } else {
              Swal.fire({
                position: "top",
                type: "error",
                title: "Vehiculo no eliminado",
                showConfirmButton: false,
                timer: 3000,
              });
            }
          }
        );
      }
    });
  }
    
  function Limpiar() {
    $("#cedula").val("");
    $("#nombre").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#ocupacion").val("");
    $("#correo").val("");
  }

  function CrearV() {
    var cedula = $("#cliente").val().trim();
    var carro = $("#auto").val().trim();
    var vendedor = $("#vendedor").val();
  
    if (CampoVacio(cedula) || CampoVacio(carro) || CampoVacio(vendedor)) {
      Swal.fire({
        position: "top",
        type: "warning",
        title: "Rellene los espacios en blanco",
      });
    } else {
      var parametros = {
        accion: "crear",
        cedula: cedula,
        carro: carro,
        vendedor: vendedor,
      };
      
      $.ajax({
        data: parametros,
        url: "../bussiness/VentaAction.php",
        type: "POST",
        dataType: "html",
        
        success: function (dataresponse, statustext, response) {
          //alert(dataresponse);
          if (dataresponse == true) {
            Swal.fire({
              position: "top",
              type: "success",
              title: "Datos Guardados Correctamente",
              showConfirmButton: false,
              timer: 3000,
            });
            $("#vendedor").val("");
          } else {
            /*Swal.fire({
              position: "top",
              type: "error",
              title: "Datos no Guardados",
              showConfirmButton: false,
              timer: 3000,
            });*/
            $("#vendedor").val("");
          }
        },
        error: function (request, errorcode, errortext) {
          Swal.fire({
            position: "top",
            type: "error",
            title: errortext,
            timer: 3000,
          });
          $("#vendedor").val("");
        },
      });
    }
  }

  