/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/
// $.ajax({
// 	url: "ajax/datatable-ventas.ajax.php",
// 	success:function(respuesta){
// 		console.log("respuesta", respuesta);
// 	}
// })
$('.tablaPagos').DataTable({
	"ajax": "ajax/pagos.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	}
});

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaPagos tbody").on("click", "button.agregarProducto", function () {

	var idServicio = $(this).attr("idServicio");

	$(this).removeClass("btn-outline-info agregarProducto");

	$(this).addClass("btn-default");

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

			var nombre = respuesta["nombre"];
			var stock = respuesta["stock"];
			var precio = respuesta["precio"];

			$(".nuevoProducto").append(

				'<div class="row" style="padding:5px 15px">' +

				'<!-- Descripción del producto -->' +

				'<div class="col-md-6 col-sm-12" style="padding-right:0px">' +

				'<div class="input-group">' +

				'<span class="input-group-btn"><button type="button" class="btn btn-danger quitarProducto" idServicio="' + idServicio + '">X</button></span>' +

				'<input type="text" class="form-control nuevaDescripcionProducto" idServicio="' + idServicio + '" name="agregarProducto" value="' + nombre + '" readonly required>' +

				'</div>' +

				'</div>' +

				'<!-- Cantidad del producto -->' +

				'<div class="col-md-2 col-sm-12">' +

				'<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="' + stock + '" nuevoStock="' + Number(stock - 1) + '" required>' +

				'</div>' +

				'<!-- Precio del producto -->' +

				'<div class="col-md-4 col-sm-12 ingresoPrecio" style="padding-left:0px">' +

				'<div class="input-group">' +

				'<span class="input-group-addon">Bs.</span>' +

				'<input type="text" class="form-control nuevoPrecioProducto" precioReal="' + precio + '" name="nuevoPrecioProducto" value="' + precio + '" readonly required>' +

				'</div>' +

				'</div>' +

				'</div>');

			// SUMAR TOTAL DE PRECIOS

			sumarTotalPrecios();

			// AGRUPAR PRODUCTOS EN FORMATO JSON

			listarProductos();

			// PONER FORMATO AL PRECIO DE LOS PRODUCTOS

			$(".nuevoPrecioProducto").number(true, 2);

		}
	})
});

/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
=============================================*/

$(".tablaPagos").on("draw.dt", function () {

	if (localStorage.getItem("quitarProducto") != null) {

		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for (var i = 0; i < listaIdProductos.length; i++) {

			$("button.recuperarBoton[idServicio='" + listaIdProductos[i]["idServicio"] + "']").removeClass('btn-default');
			$("button.recuperarBoton[idServicio='" + listaIdProductos[i]["idServicio"] + "']").addClass('btn-outline-info agregarProducto');

		}
	}
})

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioPago").on("click", "button.quitarProducto", function () {

	$(this).parent().parent().parent().parent().remove();

	var idServicio = $(this).attr("idServicio");

	/*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/

	if (localStorage.getItem("quitarProducto") == null) {

		idQuitarProducto = [];
	} else {

		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))
	}

	idQuitarProducto.push({ "idServicio": idServicio });

	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

	$("button.recuperarBoton[idServicio='" + idServicio + "']").removeClass('btn-default');

	$("button.recuperarBoton[idServicio='" + idServicio + "']").addClass('btn-outline-info agregarProducto');

	if ($(".nuevoProducto").children().length == 0) {

		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total", 0);

	} else {

		// SUMAR TOTAL DE PRECIOS

		sumarTotalPrecios();

		// AGRUPAR PRODUCTOS EN FORMATO JSON

		listarProductos();
	}
})

// /*=============================================
// MODIFICAR LA CANTIDAD
// =============================================*/

$(".formularioPago").on("change", "input.nuevaCantidadProducto", function () {

	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var precioFinal = $(this).val() * precio.attr("precioReal");

	precio.val(precioFinal);

	var nuevoStock = Number($(this).attr("stock")) - $(this).val();

	$(this).attr("nuevoStock", nuevoStock);

	if (Number($(this).val()) > Number($(this).attr("stock"))) {

		/*=============================================
		SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VALORES INICIALES
		=============================================*/

		$(this).val(1);

		var precioFinal = $(this).val() * precio.attr("precioReal");

		precio.val(precioFinal);

		sumarTotalPrecios();

		swal({
			title: "La cantidad supera el Stock",
			text: "¡Sólo hay " + $(this).attr("stock") + " unidades!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

		return;
	}

	// SUMAR TOTAL DE PRECIOS

	sumarTotalPrecios()

	// AGRUPAR PRODUCTOS EN FORMATO JSON

	listarProductos()
})

// /*=============================================
// SUMAR TODOS LOS PRECIOS
// =============================================*/

function sumarTotalPrecios() {

	var precioItem = $(".nuevoPrecioProducto");
	var arraySumaPrecio = [];

	for (var i = 0; i < precioItem.length; i++) {

		arraySumaPrecio.push(Number($(precioItem[i]).val()));
	}

	function sumaArrayPrecios(total, numero) {

		return total + numero;
	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);

	$("#nuevoTotalVenta").val(sumaTotalPrecio);
	$("#totalVenta").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("total", sumaTotalPrecio);
}

// /*=============================================
// FORMATO AL PRECIO FINAL
// =============================================*/

$("#nuevoTotalVenta").number(true, 2);

/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/

$("#nuevoMetodoPago").change(function () {

	var metodo = $(this).val();

	if (metodo == "Efectivo") {

		$(this).parent().parent().removeClass("col-xs-6");

		$(this).parent().parent().addClass("col-xs-4");

		$(this).parent().parent().parent().children(".cajasMetodoPago").html(

			'<div class="col-xs-4">' +

			'<div class="input-group">' +

			'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

			'<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>' +

			'</div>' +

			'</div>' +

			'<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">' +

			'<div class="input-group">' +

			'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

			'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>' +

			'</div>' +

			'</div>'

		)

		// Agregar formato al precio

		$('#nuevoValorEfectivo').number(true, 2);
		$('#nuevoCambioEfectivo').number(true, 2);


		// Listar método en la entrada
		listarMetodos()

	} else {

		$(this).parent().parent().removeClass('col-xs-4');

		$(this).parent().parent().addClass('col-xs-6');

		$(this).parent().parent().parent().children('.cajasMetodoPago').html(

			'<div class="col-xs-6" style="padding-left:0px">' +

			'<div class="input-group">' +

			'<input type="number" min="0" class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>' +

			'<span class="input-group-addon"><i class="fa fa-lock"></i></span>' +

			'</div>' +

			'</div>')

	}

	listarMetodos();

})

// /*=============================================
// CAMBIO EN EFECTIVO
// =============================================*/
$(".formularioPago").on("change", "input#nuevoValorEfectivo", function () {

	var efectivo = $(this).val();

	var cambio = Number(efectivo) - Number($('#nuevoTotalVenta').val());

	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

	nuevoCambioEfectivo.val(cambio);

})

/*=============================================
CAMBIO TRANSACCIÓN
=============================================*/
$(".formularioPago").on("change", "input#nuevoCodigoTransaccion", function () {

	// Listar método en la entrada
	listarMetodos()


})
/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos() {

	var listaProductos = [];

	var nombre = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");

	var precio = $(".nuevoPrecioProducto");

	for (var i = 0; i < nombre.length; i++) {

		listaProductos.push({
			"idservicio": $(nombre[i]).attr("idServicio"),
			"nombre": $(nombre[i]).val(),
			"cantidad": $(cantidad[i]).val(),
			"stock": $(cantidad[i]).attr("nuevoStock"),
			"precio": $(precio[i]).attr("precioReal"),
			"total": $(precio[i]).val()
		})
	}

	$("#listaProductos").val(JSON.stringify(listaProductos));
}
/*=============================================
LISTAR MÉTODO DE PAGO
=============================================*/

function listarMetodos() {

	var listaMetodos = "";

	if ($("#nuevoMetodoPago").val() == "Efectivo") {

		$("#listaMetodoPago").val("Efectivo");

	} else {

		$("#listaMetodoPago").val($("#nuevoMetodoPago").val() + "-" + $("#nuevoCodigoTransaccion").val());
	}
}
// /*=============================================
// FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABÍA SIDO SELECCIONADO EN LA CARPETA
// =============================================*/

function quitarAgregarProducto() {

	//Capturamos todos los id de productos que fueron elegidos en la venta
	var idServicios = $(".quitarProducto");

	//Capturamos todos los botones de agregar que aparecen en la tabla
	var botonesTabla = $(".tablaPagos tbody button.agregarProducto");

	//Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
	for (var i = 0; i < idServicios.length; i++) {

		//Capturamos los Id de los productos agregados a la venta
		var boton = $(idServicios[i]).attr("idServicio");

		//Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
		for (var j = 0; j < botonesTabla.length; j++) {

			if ($(botonesTabla[j]).attr("idServicio") == boton) {

				$(botonesTabla[j]).removeClass("btn-outline-info agregarProducto");
				$(botonesTabla[j]).addClass("btn-default");

			}
		}
	}
}
// /*=============================================
// CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAR LA FUNCIÓN:
// =============================================*/

$('.tablaPagos').on('draw.dt', function () {

	quitarAgregarProducto();

})

