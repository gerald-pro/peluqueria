<?php

require_once "conexion.php";

class ModeloConsultas{

    /*=============================================
	MOSTRAR CONSULTA
	=============================================*/

	static public function mdlMostrarConsulta($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	
    /*=============================================
	ASIGNACION DE FICHAS POR Trabajador
	=============================================*/

    static public function mdlMostrarFichasporatender($tabla, $item, $valor){

		

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND fecha = date(NOW()) AND estado = 1");

    
    $stmt = Conexion::conectar()->prepare("SELECT f.idficha, f.numero,p.idcliente,p.nombres, p.apellidos,p.sexo,YEAR(now())-YEAR(p.fechaNacimiento)as fechaNacimiento,f.fecha FROM ficha f INNER JOIN cliente p ON f.idcliente = p.idcliente WHERE f.idtrabajador = $valor AND date(f.fecha) = date(NOW()) AND f.estado = 1");


        //$stmt -> bindParam(":".$items, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();


        $stmt -> close();
       
       $stmt = null;

}


    /*=============================================
	CAMBIAR ESTADO DE FICHA PARA GUARDAR EN CONSULTA
	=============================================*/

    static public function mdlMostrarCambiarEstadoPorAtender($tabla, $item, $valor){

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND fecha = date(NOW()) AND estado = 1");

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 2 WHERE idficha = $valor");


        $stmt -> execute();


        return $stmt -> fetchAll();

		$stmt -> close();
       

       $stmt = null;

}
	/*=============================================
	REGISTRO DE CONSULTA
	=============================================*/

	static public function mdlIngresarConsulta($tabla, $datos){

		// $stmt = Conexion::conectar()->prepare("INSERT INTO control(fecha, diagnostico, tratamiento, id_cliente, id_naturista) VALUES ('2022-10-12','el cliente se e relaizo el servicio','el cliente deebifnrfuj',11,75)");

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idcliente,idtrabajador,diagnostico,presionArterial,frecuencia,oxigeno,temperatura,glicemia,peso,fechaConsulta) VALUES (:idcliente, :idtrabajador, :diagnostico, :presionArterial, :frecuencia, :oxigeno, :temperatura, :glicemia, :peso, :fechaConsulta)");


			$stmt->bindParam(":idcliente", $datos["idcliente"], PDO::PARAM_INT);
			$stmt->bindParam(":idtrabajador", $datos["idtrabajador"], PDO::PARAM_INT);
			$stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
			$stmt->bindParam(":presionArterial", $datos["presionArterial"], PDO::PARAM_STR);
			$stmt->bindParam(":frecuencia", $datos["frecuencia"], PDO::PARAM_STR);
            $stmt->bindParam(":oxigeno", $datos["oxigeno"], PDO::PARAM_STR);
            $stmt->bindParam(":temperatura", $datos["temperatura"], PDO::PARAM_STR);
            $stmt->bindParam(":glicemia", $datos["glicemia"], PDO::PARAM_STR);
            $stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaConsulta", $datos["fechaConsulta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt -> close();
		$stmt = null;

	}

}
?>