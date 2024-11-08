<?php

require_once "conexion.php";

class ModeloPagos
{

	/*=============================================
					  MOSTRAR PAGOS
					  =============================================*/

	static public function mdlMostrarPagos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idpagoservicio ASC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idpagoservicio  ASC");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
					  SUMAR EL TOTAL DE PAGO DE SERVICIO
					  =============================================*/

	static public function mdlSumaTotalPagos($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla");

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
					  OBTENER LA MAX VENTAS
					  =============================================*/

	static public function mdlMostrarMaxPagos($tabla)
	{


		$stmt = Conexion::conectar()->prepare("SELECT Max(idpagoservicio) FROM pagoservicio");

		$stmt->execute();

		return $stmt->fetch();


		$stmt->close();

		$stmt = null;
	}

	/*=============================================
					  RANGO FECHAS
					  =============================================*/

	static public function mdlEntreFechasPagos($tabla, $fechaInicial, $fechaFinal)
	{


		$stmt = Conexion::conectar()->prepare("SELECT PS.idpagoservicio, PS.numeroPago, CONCAT(P.nombres,' ', P.apellidos) AS cliente,U.nombre as cajera, M.nombre as trabajador, PS.fecha, PS.total FROM pagoservicio PS INNER JOIN cliente P ON PS.idcliente = P.idcliente INNER JOIN usuarios U ON PS.idcajera= U.id INNER JOIN usuarios M ON PS.idtrabajador = M.id where PS.fecha  BETWEEN '$fechaInicial' and '$fechaFinal' ORDER BY PS.fecha ASC");


		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();

		$stmt = null;
	}

	static public function mdlRangoFechasPagos($tabla, $fechaInicial, $fechaFinal)
	{

		if ($fechaInicial == null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY num_pago ASC");

			$stmt->execute();

			return $stmt->fetchAll();
		} else if ($fechaInicial == $fechaFinal) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_pago like '%$fechaFinal%'");

			$stmt->bindParam(":fecha_pago", $fechaFinal, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} else {

			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_pago BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");
			} else {


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_pago BETWEEN '$fechaInicial' AND '$fechaFinal'");
			}

			$stmt->execute();

			return $stmt->fetchAll();
		}
	}

	/*=============================================
					  REGISTRO DE PAGO
					  =============================================*/

	static public function mdlIngresarPagos($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numeroPago, idcajera, idtrabajador, idcliente, total, metodo_pago, fecha) VALUES (:numeroPago, :idcajera, :idtrabajador, :idcliente, :total, :metodo_pago, :fecha)");

		$stmt->bindParam(":numeroPago", $datos["numeroPago"], PDO::PARAM_INT);
		$stmt->bindParam(":idcajera", $datos["idcajera"], PDO::PARAM_INT);
		$stmt->bindParam(":idtrabajador", $datos["idtrabajador"], PDO::PARAM_INT);
		$stmt->bindParam(":idcliente", $datos["idcliente"], PDO::PARAM_INT);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {
			$error = $stmt->errorInfo();
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlIngresarDetallePago($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_pagoservicio, idservicio, cantidad, precio) VALUES (:id_pagoservicio, :idservicio, :cantidad, :precio)");

		$stmt->bindParam(":id_pagoservicio", $datos["id_pagoservicio"], PDO::PARAM_INT);
		$stmt->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
					  ELIMINAR PAGO
					  =============================================*/

	static public function mdlEliminarPago($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idpagoservicio = :idpagoservicio");

		$stmt->bindParam(":idpagoservicio", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}

	static public function mdlEliminarDetallePago($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pagoservicio = :id_pagoservicio");

		$stmt->bindParam(":id_pagoservicio", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}

	// Método para obtener ingresos por periodo (día, mes, año)
	public static function mdlPagosPorRangoFechas($fechaInicio, $fechaFin)
	{

		$stmt = Conexion::conectar()->prepare("
			SELECT
				idcajera,
				idtrabajador,
				idcliente,
				numeroPago,
				fecha,
				total,
				metodo_pago
			FROM 
				pagoservicio
			WHERE 
				fecha BETWEEN :fechaInicio AND :fechaFin
			ORDER BY 
				fecha;
		");

		// Vincular parámetros
		$stmt->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
		$stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);

		// Ejecutar consulta
		$stmt->execute();

		// Retornar resultados
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Cerrar conexión
		$stmt->close();
		$stmt = null;
	}

	public static function mdlPagosPorCliente($idCliente)
	{

		$stmt = Conexion::conectar()->prepare("
			SELECT
				c.documento,
				c.nombres,
				c.apellidos,
				p.total,
				p.fecha,
				p.metodo_pago
			FROM 
				pagoservicio p
			JOIN 
				cliente c ON p.idcliente = c.idcliente
			WHERE
				c.idcliente = :idCliente
			ORDER BY p.fecha DESC;
		");

		// Vincular parámetros
		$stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_STR);

		// Ejecutar consulta
		$stmt->execute();

		// Retornar resultados
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Cerrar conexión
		$stmt->close();
		$stmt = null;
	}

	public static function mdlHistoriaDeCitasCliente($idCliente)
	{

		$stmt = Conexion::conectar()->prepare("
			SELECT 
				c.documento,
				c.nombres,
				c.apellidos,
				f.inicio,
				f.fin,
				s.nombre AS servicio,
				t.nombre AS trabajador
			FROM 
				ficha f
			JOIN 
				servicio s ON f.idservicio = s.idservicio
			JOIN 
				usuarios t ON f.idtrabajador = t.id
			JOIN
				cliente c ON f.idcliente = c.idcliente
			WHERE 
				f.idcliente = :idCliente
			ORDER BY 
				f.inicio DESC;
		");

		// Vincular parámetros
		$stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_STR);

		// Ejecutar consulta
		$stmt->execute();

		// Retornar resultados
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Cerrar conexión
		$stmt->close();
		$stmt = null;
	}

	public static function mdlTotalPagosMes()
	{

		$stmt = Conexion::conectar()->prepare("
			SELECT 
				DATE_FORMAT(fecha, '%Y-%m') AS mes,
				SUM(total) AS total_ingresos
			FROM 
				pagoservicio
			GROUP BY 
				mes
			ORDER BY 
				mes;
		");

		// Ejecutar consulta
		$stmt->execute();

		// Retornar resultados
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Cerrar conexión
		$stmt->close();
		$stmt = null;
	}
}
