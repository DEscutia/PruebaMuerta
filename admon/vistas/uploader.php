<?php
//incluye la clase Libro y CrudLibro
require_once($_SERVER['DOCUMENT_ROOT'] . '/PruebaMuerta/admon/crud/crud.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/PruebaMuerta/admon/Modelos/servicios.php');

$crud = new Crud();
$servicio = new Servicio();

// si el elemento insertar no viene nulo llama al crud e inserta un libro
if (isset($_POST['insertar'])) {
	$uploadedfileload = "true";
	$uploadedfile_size = $_FILES['uploadedfile']['size'];
	if ($_FILES['uploadedfile']['size'] > 10000000) {
		$msg = $msg . "El archivo es mayor que 1MB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload = "false";
		header('Location: ../main.php?msg=' . $msg);
	}
	if (!($_FILES['uploadedfile']['type'] == "image/jpeg" or $_FILES['uploadedfile']['type'] == "image/gif")) {
		$msg = $msg . " Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
		$uploadedfileload = "false";
		header('Location: ../main.php?msg=' . $msg);
	}
	$file_name = $servicio->getTitulo() . $_FILES['uploadedfile']['name'];
	$add = "../img/Servicios/$file_name";
	if ($uploadedfileload == "true") {
		if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add)) {
			$msg = $msg . "Ha sido subido satisfactoriamente";
		} else {
			$msg = $msg . "Error al subir el archivo";
			header('Location: ../main.php?msg=' . $msg);
		}
	} else {
		echo $msg;
	}
	if ($uploadedfileload == 'true') {
		$servicio->setTitulo($_POST['Titulo']);
		$servicio->setDescripcion($_POST['Descripcion']);
		$servicio->setImagen($servicio->getTitulo() . $_FILES['uploadedfile']['name']);
		//llama a la función insertar definida en el crud
		$crud->insertarServicio($servicio);
		header('Location: ../main.php?msg=' . $msg);
	}
}
