<html>
<head>
	<title> Ingresar Servicio</title>
</head>
<header>
Ingresa los datos del Servicio
</header>
<form action='administrar.php' method='post'>
	<table>
		<tr>
			<td>Titulo:</td>
			<td> <input type='text' name='Titulo'></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='Descripcion' ></td>
		</tr>
		<tr>
			<td>Imagen:</td>
			<td><input type='text' name='Imagen' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index.php">Volver</a>
</form>

</html>