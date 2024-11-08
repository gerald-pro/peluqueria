
	/*=============================================
	SELECCIONAR MÉTODO DE PAGO
	=============================================*/

$("#nuevoMetodoPago").change(function(){

		var metodo = $(this).val();

		if(metodo == "Efectivo"){

			$(this).parent().parent().removeClass("col-xs-6");

			$(this).parent().parent().addClass("col-xs-4");

			$(this).parent().parent().parent().children(".cajasMetodoPago").html(

				 '<div class="col-xs-4">'+ 
					'<label>EFECTIVO</label>'+
					 '<div class="input-group">'+ 
	
						 '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 
	
						 '<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>'+
	
					 '</div>'+
	
				 '</div>'+
	
				 '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+
				 '<label>CAMBIO</label>'+
	
					 '<div class="input-group">'+
	
						 '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	
						 '<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+
	
					 '</div>'+
	
				 '</div>'
	
			 )
	
			// Agregar formato al precio
	
			$('#nuevoValorEfectivo').number( true, 2);
			$('#nuevoCambioEfectivo').number( true, 2);
	
	
			  // Listar método en la entrada
			  listarMetodos()
	
		}else{
	
			$(this).parent().parent().removeClass('col-xs-4');
	
			$(this).parent().parent().addClass('col-xs-6');
	
			 $(this).parent().parent().parent().children('.cajasMetodoPago').html(
	
				 '<div class="col-xs-6" style="padding-left:0px">'+
							
					'<div class="input-group">'+
						 
					  '<input type="number" min="0" class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>'+
						   
					  '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+
					  
					'</div>'+
	
				  '</div>')
	
		}
	
		
	
	})

	// CAMBIO EN EFECTIVO

$(".formularioPago").on("change", "input#nuevoValorEfectivo", function(){

		var efectivo = $(this).val();
	
		var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());
	
		var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');
	
		nuevoCambioEfectivo.val(cambio);
	
	})

	//CAMBIO DE TRANSACCIÓN

$(".formularioPago").on("change", "input#nuevoCodigoTransaccion", function(){

		// Listar método en la entrada
		 listarMetodos()
	
	
	})


	/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos(){

	var listaProductos = [];

	var nombre = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");

	var precio = $(".nuevoPrecioProducto");

	for(var i = 0; i < nombre.length; i++){

		listaProductos.push({ "idservicio" : $(nombre[i]).attr("idServicio"),
							"nombre" : $(nombre[i]).val(),
							"cantidad" : $(cantidad[i]).val(),
							"precio" : $(precio[i]).attr("precioReal"),
							"total" : $(precio[i]).val()})
	}

	$("#listaProductos").val(JSON.stringify(listaProductos));
}

	//LISTAR METODOS DE PAGOS

function listarMetodos(){

		var listaMetodos = "";
	
		if($("#nuevoMetodoPago").val() == "Efectivo"){
	
			$("#listaMetodoPago").val("Efectivo");
	
		}else{
	
			$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());
		}
	}

	//ELIMINAR PAGO

$(".tablas").on("click", ".btnPago", function(){

	var idPago = $(this).attr("idPago");

	swal({
			title: '¿Está seguro de borrar el pago?',
			text: "¡Si no lo está puede cancelar la accíón!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Si, borrar pago!'
		}).then(function(result){
			if (result.value) {

			window.location = "index.php?ruta=pagos&idPago="+idPago;
			}

	})

})

// IMPRIMIR Y DESCARGAR PAGOS

$(".tablas").on("click", ".btnImprimirPago", function () {

    var boletaPago = $(this).attr("boletaPago");

	window.open("extensiones/TCPDF-main/pdf/boleta.php?numeroPago="+boletaPago, "_blank");
})
$(".tablas").on("click", ".btnDescargarPago", function(){

    var boletaPago = $(this).attr("boletaPago");

	window.open("extensiones/TCPDF-main/pdf/pago.php?numeroPago="+boletaPago, "_blank");
})

$(".formularioPagoEntreFecha").on("click", "button.btnReportePago", function(){

    var fechainicio = $("#fechaInicioPago").val();
    var fechafin = $("#fechaFinPago").val();

	  window.open("extensiones/TCPDF-main/pdf/pago-rango-fecha.php?fechainicio="+fechainicio+"&fechafin="+fechafin, "_blank");
    
    // window.open("extensiones/tcpdf/pdf/pago-rango-fecha.php", "_blank");
    
})	