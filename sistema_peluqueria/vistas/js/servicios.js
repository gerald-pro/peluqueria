/*=============================================
ACTIVAR SERVICIO
=============================================*/
$(".tablas").on("click", ".btnActivarServicio", function () {

    var idServicio = $(this).attr("idServicio");
    var estadoServicio = $(this).attr("estadoServicio");

    var datos = new FormData();
    datos.append("activarId", idServicio);
    datos.append("activarServicio", estadoServicio);

    $.ajax({

        url: "ajax/servicios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El servicio ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function (result) {
                    if (result.value) {

                        window.location = "servicios";
                    }
                });
            }
        }
    })

    if (estadoServicio == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoServicio', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoServicio', 0);
    }
})

/*=============================================
EDITAR SERVICIO
=============================================*/
$(".tablas").on("click", ".btnEditarServicio", function () {

    var idServicio = $(this).attr("idServicio");

    var datos = new FormData();
    datos.append("idServicio", idServicio);
    $.ajax({
        url: "ajax/servicios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#idServicio").val(respuesta["idservicio"]);
            $("#editarNombreServicio").val(respuesta["nombre"]);
            $("#editarPrecioServicio").val(respuesta["precio"]);
        }
    })
})
/*=============================================
ELIMINAR SERVICIO
=============================================*/
$(".tablas").on("click", ".btnEliminarServicio", function () {

    var idServicio = $(this).attr("idServicio");

    swal({
        title: '¿Está seguro de borrar el servicio?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar servicio!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=servicios&idServicio=" + idServicio;
        }
    })
})

//REPORTE SERVICIOS MAS SOLICITADOS
$(".btnReporteServicios1").on("click", function () {

    window.open("extensiones/TCPDF-main/pdf/serviciosMasSolicitados.php?_blank");

});

$(".btnReporteServicios2").on("click", function () {

    window.open("extensiones/TCPDF-main/pdf/ingresoTotalPorServicio.php?_blank");

});