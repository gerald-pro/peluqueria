<?php

require_once "conexion.php";

class ModeloServicios
{
    /*=============================================
    CREAR SERVICIO
    =============================================*/

    static public function mdlIngresarServicio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, precio) VALUES (:nombre, :precio)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
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
    MOSTRAR SERVICIO
    =============================================*/

    static public function mdlMostrarServicios($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

            /* $stmt = Conexion::conectar()->prepare("SELECT * FROM servicio WHERE idservicio = 8 ");

             $stmt->execute();

             return $stmt->fetch(); */

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarDetalleServicios($item, $valor, $orden)
    {

        $stmt = Conexion::conectar()->prepare("SELECT s.nombre, d.cantidad as cantidad, d.precio, (d.cantidad * d.precio) as total FROM detallepagoservicio d INNER JOIN servicio s ON d.idservicio = s.idservicio WHERE d.id_pagoservicio= :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;

    }
    /*=============================================
    EDITAR SERVICIO
    =============================================*/

    static public function mdlEditarServicio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, precio = :precio WHERE idservicio = :idservicio");

        $stmt->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
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
    ACTUALIZAR SERVICIO
    =============================================*/

    static public function mdlActualizarServicio($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
    ELIMINAR SERVICIO
    =============================================*/

    static public function mdlBorrarServicio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idservicio = :idservicio");

        $stmt->bindParam(":idservicio", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlServiciosMasSolicitados()
    {
        $stmt = Conexion::conectar()->prepare("
        SELECT s.idservicio, s.nombre, s.precio, COUNT(f.idservicio) AS total_solicitudes
        FROM servicio s
        JOIN ficha f ON s.idservicio = f.idservicio
        GROUP BY s.idservicio
        ORDER BY total_solicitudes DESC
    ");

        $stmt->execute();

        $result = $stmt->fetchAll(); // Almacena el resultado en una variable

        // Cerrar la declaración es opcional en PDO
        $stmt = null; // Cerrar la declaración y liberar recursos

        return $result; // Devuelve el resultado
    }


    static public function mdlIngresoTotalPorServicio()
    {
        $stmt = Conexion::conectar()->prepare("
        SELECT s.idservicio, s.nombre, SUM(ps.total) AS total_ingresos
        FROM servicio s
        JOIN detallepagoservicio dps ON s.idservicio = dps.idservicio
        JOIN pagoservicio ps ON dps.id_pagoservicio = ps.idpagoservicio
        GROUP BY s.idservicio;
    ");

        $stmt->execute();

        $result = $stmt->fetchAll(); // Almacena el resultado en una variable

        // Cerrar la declaración es opcional en PDO
        $stmt = null; // Cerrar la declaración y liberar recursos

        return $result; // Devuelve el resultado
    }

    static public function mdlServiciosUtilizadosCliente()
    {
        $stmt = Conexion::conectar()->prepare("
        SELECT c.documento, c.nombres, c.apellidos, s.nombre AS servicio, COUNT(f.idficha) AS total_uso
        FROM cliente c
        JOIN ficha f ON c.idcliente = f.idcliente
        JOIN servicio s ON f.idservicio = s.idservicio
        GROUP BY c.idcliente, s.idservicio;
    ");

        $stmt->execute();

        $result = $stmt->fetchAll(); // Almacena el resultado en una variable

        // Cerrar la declaración es opcional en PDO
        $stmt = null; // Cerrar la declaración y liberar recursos

        return $result; // Devuelve el resultado
    }
}
