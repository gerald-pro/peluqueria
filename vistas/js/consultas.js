/*=============================================
DATOS DEL Cliente PARA LA CONSULTA
=============================================*/
$(".tablas").on("click", ".btnRealizarConsulta", function(){


    var nombres= $(this).attr("nombres");
      
     $("#nombreCliente").val(nombres);

     var apellidos= $(this).attr("apellidos");
      
     $("#apellidoCliente").val(apellidos);

     var fechaNacimiento= $(this).attr("fechaNacimiento");
      
     $("#fechaNacimiento").val(fechaNacimiento);

     var sexo= $(this).attr("sexo");
      
     $("#sexo").val(sexo);

     var idCliente= $(this).attr("idcliente");
      
     $("#idCliente").val(idCliente);

     var idFicha= $(this).attr("idficha");
      
     $("#idFicha").val(idFicha);

})

$(".tablas").on("click", ".btnImprimirConsulta", function(){

    var historial = $(this).attr("historial");

    window.open("extensiones/tcpdf/pdf/consultaHistorial.php?idconsulta="+historial,"_blank");
})
