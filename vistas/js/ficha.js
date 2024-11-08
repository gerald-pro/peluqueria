$(".tablas").on("click", ".btnImprimirTicket", function(){

    var numeroFicha = $(this).attr("numeroFicha");

    window.open("extensiones/tcpdf/pdf/ficha.php?numero="+numeroFicha, "_blank");
})

$(".formularioFichaEntreFecha").on("click", "button.btnReporteFicha", function(){

    var fechainicio = $("#fechaInicioFicha").val();
    var fechafin = $("#fechaFinFicha").val();

	  window.open("extensiones/tcpdf/pdf/ficha-rango-fecha.php?fechainicio="+fechainicio+"&fechafin="+fechafin, "_blank");
    
    // window.open("extensiones/tcpdf/pdf/pago-rango-fecha.php", "_blank");
    
})	

$("#seleccionarTrabajador").change(function(){

	var idTrabajador = $("#seleccionarTrabajador").val();

	var datos = new FormData();
    datos.append("idTrabajador", idTrabajador);

    $.ajax({

        url: "ajax/fichas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            var numero;
            if(respuesta["numero"]!= null){
                numero = respuesta["numero"];
                numero = parseInt(numero);
                numero = numero +1;
                $("#nuevaVenta").val(numero);
            }else{
                numero=0;
            }
        }

    })

})
/*=============================================
ELIMINAR FICHA
=============================================*/
$(".tablas").on("click", ".btnEliminarFicha", function(){

    var idFicha = $(this).attr("idFicha");

    swal({
        title: '¿Está seguro de eliminar la ficha?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar ficha!'
        }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=fichas&idFicha="+idFicha;
        }

    })

})