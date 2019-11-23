<?php

class alumnos
{

  //Datos de la tabla alumnos, la cual es el recurso disponible
  const NOMBRE_TABLA = "usuarios";
  const ID_USUARIOS = "idUsuarios";
  const NOMBRE = "Nombre";
  const NOMBREUSUARIO = "NombrUsuario";
  const CONTRASENIA = "Contrasenia";

  //Estados de nuestro servicio web
  const ESTADO_CREACION_OK = 200;
  const ESTADO_CREACION_ERROR = 405;
  const ESTADO_ERROR_DB = 500;
  const ESTADO_NO_CLAVE_API = 405;
  const ESTADO_CLAVE_NO_AUTORIZADA = 401;
  const ESTADO_URL_INCORRECTA = 404;
  const ESTADO_FALLA_DESCONOCIDA = 500;
  const ESTADO_DATOS_INCORRECTOS = 422;

  //Función para el método GET
  public static function get($solicitud)
  {
    //Comprobamos si la solicitud esta vacía, en caso contrario obtenemos 
    //al usuario especificado en la solicitud (id)
    if (empty($solicitud)) {
      return self::obtenerAlumnos();
    } else {
      return self::obtenerAlumnos($solicitud[0]);
    }
  }
  //Función para el método post
  public static function post($solicitud)
  {
    if (isset($solicitud)) {
      if ($solicitud[0]  == "registro") {
        return self::registrar();
      } else {
        throw new
          ExceptionApi(self::ESTADO_URL_INCORRECTA, "URL Incorrecta", 400);
      }
    } else {
      ExceptionApi(self::ESTADO_DATOS_INCORRECTOS, "Solicitud incorrecta", 400);
    }
  }
  //Función para registrar un alumno
  private static function registrar()
  {
    //{ "nombre":"Pedro","a_paterno":"Perez","a_materno":"Lopez","password":"1234","carrera":"Informatica","correo":"pedro@mail.com"}
    //{ "password":"1234","correo":"pedro@mail.com"}
    //Obtenemos los datos del Alumno el cual debe tener un formato json
    $cuerpo = file_get_contents('php://input');
    //Decodificamos el json y lo pasamos a un arreglo
    $alumno = json_decode($cuerpo);
    $resultado = self::crear($alumno);
    switch ($resultado) {
      case self::ESTADO_CREACION_OK:
        http_response_code(200);
        return [
          "estado" => self::ESTADO_CREACION_OK,
          "mensaje" => utf8_encode("!!Registro Exitoso")
        ];
        break;
      case self::ESTADO_CREACION_ERROR:
        throw new ExceptionApi(
          self::ESTADO_CREACION_ERROR,
          "Error al crear al alumno."
        );
        break;
      default:
        throw new ExceptionApi(
          self::ESTADO_FALLA_DESCONOCIDA,
          "Error desconocido."
        );
    }
  }

  private static function crear($datosUsuario)
  {
    $nombre = $datosUsuario->nombre;
    $password = $datosUsuario->password;
    $passwordEnc = self::encriptarPassword($password);
    $correo = $datosUsuario->correo;
    try {
      $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
      $sql = "INSERT INTO " . self::NOMBRE_TABLA . " (" .
        self::NOMBRE . "," .
        self::NOMBREUSUARIO . "," .
        self::CONTRASENIA . ")" .
        " VALUES(?,?,?,?,?,?)";
      $query = $pdo->prepare($sql);
      $query->bindParam(1, $nombre);
      $query->bindParam(2, $datosUsuario->apellido);
      $query->bindParam(3, $passwordEnc);
      $query->bindParam(4, $datosUsuario->carrera);
      $query->bindParam(5, $claveApi);
      $query->bindParam(6, $correo);
      $resultado = $query->execute();
      if ($resultado) {
        return self::ESTADO_CREACION_OK;
      } else {
        return self::ESTADO_CREACION_ERROR;
      }
    } catch (PDOException $pdoe) {
      throw new ExceptionApi(
        self::ESTADO_ERROR_DB,
        $pdoe->getMessage()
      );
    }
  }
  //Función para obtener Alumnos.
  private static function obtenerAlumnos($id_alumno = NULL)
  {
    try {
      // Comprobamos si la solicitud contiene un id del alumno para 
      // realizar diferentes tipos de consulta
      if (!$id_alumno) {
        $sql = "SELECT * FROM " . self::NOMBRE_TABLA;        
        $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
        $query = $pdo->prepare($sql);
      } else {
        $sql = "SELECT * FROM " . self::NOMBRE_TABLA .
          " WHERE " .  self::ID_ALUMNO . "=?";
        $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
        $query = $pdo->prepare($sql);
        $query->bindParam(1, $id_alumno, PDO::PARAM_INT);
      }
      if ($query->execute()) {
        // Si el resultado es mayor a 0 regresamos un estado 200 de lo
        // contrario un estado 400
        if ($query->rowCount() > 0) {
          http_response_code(200);
          return [
            "estado" => "OK",
            "mensaje" => $query->fetchAll(PDO::FETCH_ASSOC)
          ];
        } else {
          http_response_code(400);
          return [
            "estado" => "Error",
            "mensaje" => "No se encontro la Tarea"
          ];
        }
      } else {
        throw new ExceptionApi(
          "Error en consulta",
          "Se ha producido un error al ejecutar la consulta"
        );
      }
    } catch (PDOException $e) {
      throw new ExceptionApi(
        "Error de PDO",
        $e->getMessage()
      );
    }
  }
  private static function getAlumnoPorCorreo($correo)
  {
    $sql = "SELECT " .
      self::NOMBRE . ", " .
      self::APELLIDO . ", " .
      self::PASSWORD . ", " .
      self::CARRERA . ", " .
      self::CLAVE_API  .
      " FROM " . self::NOMBRE_TABLA .
      " WHERE " . self::CORREO . " = ?";

    $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $correo);

    if ($query->execute()) {
      return $query->fetch(PDO::FETCH_ASSOC);
    } else {
      return null;
    }
  }
  private static function getIdalumno($claveApi)
  {
    $sql = "SELECT " . self::ID_ALUMNO  .
      " FROM "  . self::NOMBRE_TABLA .
      " WHERE " . self::CLAVE_API . "= $claveApi";
    $pdo = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($sql);
    $pdo->execute();
    $resultado = $pdo->fetch();
    return $resultado['id_alumno'];
  }
}
