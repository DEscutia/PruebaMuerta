<?php
//incluye la clase Libro y CrudLibro
require_once($_SERVER['DOCUMENT_ROOT'].'/PruebaMuerta/admon/crud/crud.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/PruebaMuerta/admon/Modelos/servicios.php');
$crud=new Crud();
$servicio= new Servicio();
//obtiene todos los libros con el método mostrar de la clase crud
$listaservicios=$crud->mostrarServicios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Mostrar servicio</title>
</head>
<body>
	<div class="container d-flex justify-content-center">
	<table border=1>
		<thead>
			<td>Titulo</td>
			<td>Descripcion</td>
			<td>Imagen</td>
			<td>Actualizar</td>
			<td>Eliminar</td>
		</thead>
		<tbody>
			<?php foreach ($listaservicios as $servicio) {?>
			<tr>
				<td><?php echo $servicio->getTitulo() ?></td>
				<td><?php echo $servicio->getDescripcion() ?></td>
				<td><?php echo "<img src='../img/Servicios/".$servicio->getImagen()."' >";?></td>
				<td><a href="actualizar.php?idServicios=<?php echo $servicio->getidServicios()?>&accion=a">Actualizar</a> </td>
				<td><a href="../crud/administrar.php?idServicios=<?php echo $servicio->getidServicios()?>&accion=e">Eliminar</a>   </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
			</div>
			<a href="../main.php">Volver</a>
</body>
</html>