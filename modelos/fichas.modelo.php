<?php

require_once "conexion.php";

class ModeloFichas
{

	/*=============================================
				MOSTRAR FICHAS
				=============================================*/

	static public function mdlMostrarFichas($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idficha ASC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idficha ASC");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}


	/*=============================================
				MOSTRAR FICHAS POR TRABAJADOR
				=============================================*/

	static public function mdlMostrarFichasTrabajador($valor)
	{


		$stmt = Conexion::conectar()->prepare("select f.idficha, f.inicio, f.fin, c.nombres, c.apellidos, s.nombre from ficha f, cliente c, usuarios t, servicio s
where f.idtrabajador=t.id and f.idcliente=c.idcliente and f.idservicio= s.idservicio and t.id=$valor");


		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();

		$stmt = null;

	}

	/*=============================================
				MOSTRAR FICHAS Trabajador
				=============================================*/

	static public function mdlMostrarFichasNumero($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT MAX(numero) AS numero FROM ficha WHERE idtrabajador = $item and fecha = date(NOW())");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();

		} else {

			//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idficha ASC");
			$stmt->execute();

			return $stmt->fetchAll();

		}

		$stmt->close();

		$stmt = null;

	}

	/*=============================================
				RANGO FECHAS FICHAS
				=============================================*/

	static public function mdlEntreFechasFichas($tabla, $fechaInicial, $fechaFinal)
	{


		$stmt = Conexion::conectar()->prepare("SELECT F.idficha, F.numero, CONCAT(P.nombres,' ', P.apellidos) AS cliente,U.nombre as cajera, M.nombre as trabajador, F.fecha, F.turno FROM ficha F INNER JOIN cliente P ON F.idcliente = P.idcliente INNER JOIN usuarios U ON F.idcajera= U.id INNER JOIN usuarios M ON F.idtrabajador = M.id where F.fecha  BETWEEN '$fechaInicial' and '$fechaFinal' ORDER BY F.fecha ASC");


		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();

		$stmt = null;

	}

	static public function mdlRangoFechasFichas($tabla, $fechaInicial, $fechaFinal)
	{

		if ($fechaInicial == null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY num ASC");

			$stmt->execute();

			return $stmt->fetchAll();


		} else if ($fechaInicial == $fechaFinal) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_ficha like '%$fechaFinal%'");

			$stmt->bindParam(":fecha_ficha", $fechaFinal, PDO::PARAM_STR);

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

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_ficha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			} else {


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_ficha BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}

			$stmt->execute();

			return $stmt->fetchAll();

		}

	}

	/*=============================================
				REGISTRO DE FICHAS
				=============================================*/

	static public function mdlIngresarFichas($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( idservicio,	idtrabajador,idcliente,	inicio,	fin) VALUES (:idservicio,	:idtrabajador, :idcliente,	:inicio,	:fin)");

		$stmt->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_INT);
		$stmt->bindParam(":idtrabajador", $datos["idtrabajador"], PDO::PARAM_INT);
		$stmt->bindParam(":idcliente", $datos["idcliente"], PDO::PARAM_INT);
		$stmt->bindParam(":inicio", $datos["inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fin", $datos["fin"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
				ELIMINAR FICHA
				=============================================*/

	static public function mdlEliminarficha($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idficha = :idficha");

		$stmt->bindParam(":idficha", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}

		$stmt->close();

		$stmt = null;

	}

	public static function mdlCitasPorServicio($fechaInicio, $fechaFin)
	{

		$stmt = Conexion::conectar()->prepare("
			SELECT 
				s.nombre AS servicio,
				COUNT(f.idficha) AS total_citas
			FROM 
				ficha f
			JOIN 
				servicio s ON f.idservicio = s.idservicio
			WHERE 
				f.inicio BETWEEN :fechaInicio AND :fechaFin
			GROUP BY 
				s.idservicio
			ORDER BY 
				total_citas DESC;
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

	public static function mdlCitasPorTrabajador($fechaInicio, $fechaFin, $idTrabajador)
	{

		$stmt = Conexion::conectar()->prepare("
			SELECT 
				f.inicio,
				f.fin,
				f.estado,
				t.nombre AS trabajador,
				c.nombres AS cliente,
				c.apellidos AS apellidos,
				s.nombre AS servicio
			FROM 
				ficha f
			JOIN 
				usuarios t ON f.idtrabajador = t.id
			JOIN 
				cliente c ON f.idcliente = c.idcliente
			JOIN 
				servicio s ON f.idservicio = s.idservicio
			WHERE 
				f.idtrabajador = :idTrabajador
				AND f.inicio BETWEEN :fechaInicio AND :fechaFin
			ORDER BY 
				f.inicio;
		");

		// Vincular parámetros
		$stmt->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
		$stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
		$stmt->bindParam(":idTrabajador", $idTrabajador, PDO::PARAM_INT);

		// Ejecutar consulta
		$stmt->execute();

		// Retornar resultados
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Cerrar conexión
		$stmt->close();
		$stmt = null;
	}

}
?>