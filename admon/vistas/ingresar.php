<html>
<head>
	<title> Ingresar Servicio</title>
</head>
<header>
Ingresa los datos del Servicio
</header>
<form enctype="multipart/form-data" action="uploader.php" method="POST">
<table>
		<tr>
			<td>Titulo:</td>
			<td> <input type='text' name='Titulo'></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='Descripcion' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<input name="uploadedfile" type="file" />
			<input type='submit' value='Guardar'>
			</form>
			<a href="../main.php">Volver</a>
</html>