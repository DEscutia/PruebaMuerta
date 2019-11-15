<?php
//incluye la clase Libro y CrudLibro
require_once($_SERVER['DOCUMENT_ROOT'].'/PruebaMuerta/admon/crud/crud.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/PruebaMuerta/admon/Modelos/servicios.php');
	$crud= new Crud();
	$Servicio=new Servicio();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$Servicio=$crud->obtenerServicio($_GET['idServicios']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

<form action="../crud/administrar.php" method="POST">
<input type="text" name="id" value='<?php echo $Servicio->getidServicios()?>'>
<h6>Titulo:</h6>
<input type="text" name="Titulo" value='<?php echo $Servicio->getTitulo()?>'>
<h6>Descripcion:</h6>
<input type="text" name="Descripcion" value='<?php echo $Servicio->getDescripcion()?>' >
<h6>Imagen:</h6>
<input type="text" name="Imagen" value='<?php echo $Servicio->getImagen() ?>'>

<br>
<button type="submit" value="Guardar"></button>
<a href="index.php">Volver</a>
<input type="hidden" name="actualizar" value="actualizar">
</form>
</body>
</html>