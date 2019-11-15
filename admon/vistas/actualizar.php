<?php
//incluye la clase Libro y CrudLibro
require_once($_SERVER['DOCUMENT_ROOT'].'/apps/PruebaMuerta/admon/crud/crud.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/apps/PruebaMuerta/admon/Modelos/servicios.php');
	$crud= new Crud();
	$Servicio=new Servicio();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$Servicio=$crud->obtenerServicio($_GET['idServicios']);
?>
<html>
<head>
	<title>Actualizar Servicios</title>
</head>
<body>
	<form action='administrar.php' method='post'>
	<table>
		<tr>
			<input type='hidden' name='idServicios' value='<?php echo $Servicio->getidServicios()?>'>
			<td>Titulo:</td>
			<td> <input type='text' name='Titulo' value='<?php echo $Servicio->getTitulo()?>'></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='Descripcion' value='<?php echo $Servicio->getDescripcion()?>' ></td>
		</tr>
		<tr>
			<td>Imagen:</td>
			<td><input type='text' name='Imagen' value='<?php echo $Servicio->geImagen() ?>'></td>
		</tr>
		<input type='hidden' name='actualizar' value='actualizar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index.php">Volver</a>
</form>
</body>
</html>