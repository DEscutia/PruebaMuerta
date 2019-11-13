<?php
//incluye la clase Libro y CrudLibro
require_once('crud.php');
require_once('servicios.php');
$crud=new Crud();
$servicio= new Servicio();
//obtiene todos los libros con el método mostrar de la clase crud
$listaLibros=$crud->mostrar();
?>

<html>
<head>
	<title>Mostrar servicio</title>
</head>
<body>
	<table border=1>
		<head>
			<td>Titulo</td>
			<td>Descripcion</td>
			<td>Imagen</td>
			<td>Actualizar</td>
			<td>Eliminar</td>
		</head>
		<body>
			<?php foreach ($listaservicios as $servicio) {?>
			<tr>
				<td><?php echo $servicio->getTitulo() ?></td>
				<td><?php echo $servicio->getDescripcion() ?></td>
				<td><?php echo $servicio->getImagen()?> </td>
				<td><a href="actualizar.php?idServicios=<?php echo $servicio->getId()?>&accion=a">Actualizar</a> </td>
				<td><a href="administrar.php?idServicios=<?php echo $servicio->getId()?>&accion=e">Eliminar</a>   </td>
			</tr>
			<?php }?>
		</body>
	</table>
	<a href="index.php">Volver</a>
</body>
</html>