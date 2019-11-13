<?php
//incluye la clase Libro y CrudLibro
	require_once('crud.php');
	require_once('servicios.php');
	$crud= new CrudLibro();
	$Servicio=new Servicio();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$Servicio=$crud->obtenerLibro($_GET['id']);
?>
<html>
<head>
	<title>Actualizar Libro</title>
</head>
<body>
	<form action='administrar_libro.php' method='post'>
	<table>
		<tr>
			<input type='hidden' name='id' value='<?php echo $Servicio->getId()?>'>
			<td>Nombre libro:</td>
			<td> <input type='text' name='nombre' value='<?php echo $Servicio->getNombre()?>'></td>
		</tr>
		<tr>
			<td>Autor:</td>
			<td><input type='text' name='autor' value='<?php echo $Servicio->getAutor()?>' ></td>
		</tr>
		<tr>
			<td>Fecha Edición:</td>
			<td><input type='text' name='edicion' value='<?php echo $Servicio->getAnio_edicion() ?>'></td>
		</tr>
		<input type='hidden' name='actualizar' value'actualizar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index.php">Volver</a>
</form>
</body>
</html>