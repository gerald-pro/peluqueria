<?php

require_once "conexion.php";

class ModeloClientes
{

	/*=============================================
	CREAR Cliente
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(documento,nombres, apellidos, telefono,direccion, sexo,fechaNacimiento)
		VALUES (:documento, :nombres, :apellidos, :telefono, :direccion, :sexo, :fechaNacimiento)");

		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR Cliente
	=============================================*/

	static public function mdlMostraCliente($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	MOSTRAR EDAD Cliente
	=============================================*/

    static public function mdlMostrarEdadCliente($tabla, $item, $valor){

		

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND fecha = date(NOW()) AND estado = 1");

    
    $stmt = Conexion::conectar()->prepare("SELECT YEAR(now())-YEAR(fechaNacimiento)as fechaNacimiento FROM $tabla where idcliente = $item");


        //$stmt -> bindParam(":".$items, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();


        $stmt -> close();
       
       $stmt = null;

}

	/*=============================================
	MOSTRAR EDAD Cliente
	=============================================*/

    static public function mdlMostrarTotalCliente($tabla, $item, $valor){

		

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND fecha = date(NOW()) AND estado = 1");

    
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(idcliente) as TOTAL_CLIENTES FROM $tabla");


        //$stmt -> bindParam(":".$items, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();


        $stmt -> close();
       
       $stmt = null;

}

	/*=============================================
	EDITAR Cliente
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET documento = :documento, nombres = :nombres, apellidos = :apellidos, telefono = :telefono,direccion = :direccion, sexo = :sexo ,fechaNacimiento = :fechaNacimiento WHERE idcliente= :idcliente");

		$stmt->bindParam(":idcliente", $datos["idcliente"], PDO::PARAM_INT);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR Cliente
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idcliente = :idcliente");

		$stmt->bindParam(":idcliente", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
