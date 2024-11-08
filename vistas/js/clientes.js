/*=============================================
EDITAR Cliente
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function () {

    var idCliente = $(this).attr("idCliente");

    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#idCliente").val(respuesta["idcliente"]);
            $("#editarcarnetP").val(respuesta["documento"]);
            $("#editarnombreP").val(respuesta["nombres"]);
            $("#editarapellidoP").val(respuesta["apellidos"]);
            $("#editartelefonoP").val(respuesta["telefono"]);
            $("#editardomicilioP").val(respuesta["direccion"]);
            $("#editarsexoP").html(respuesta["sexo"]);
            $("#editarsexoP").val(respuesta["sexo"]);
            $("#editarfechaNacimientoP").val(respuesta["fechaNacimiento"]);
        }

    })

})

/*=============================================
ELIMINAR Cliente
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function () {

    var idCliente = $(this).attr("idCliente");

    swal({
        title: '¿Está seguro de borrar los datos del cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Cliente!'
    }).then(function (result) {
        if (result.value) {

            window.location = "index.php?ruta=clientes&idCliente=" + idCliente;
        }

    })

})

//REPORTE TOTAL CLIENTES
$(".btnReporteTotalClientes").on("click", function () {

    window.open("extensiones/TCPDF-main/pdf/clientesTotales.php?_blank");
    
  });