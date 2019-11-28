<?php
session_start();
if (!isset($_SESSION['ena'])) {
    header('location:index.php');
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/PruebaMuerta/admon/crud/crud.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/PruebaMuerta/admon/Modelos/obituarios.php');
$crud = new Crud();
$obituario = new Obituario();
if (isset($_POST['insertar'])&&!$_FILES['uploadedfile']['size']==0) {
	$msg="";
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
	$file_name = $_POST['Titulo'] . $_FILES['uploadedfile']['name'];
	$add = "../img/Obituarios/$file_name";
	if ($uploadedfileload == "true") {
		if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add)) {
			$msg = $msg . "Ha sido subido satisfactoriamente";
			if ($uploadedfileload == 'true') {
				$obituario->setTitulo($_POST['Titulo']);
				$obituario->setDescripcion($_POST['Descripcion']);
				$obituario->setImagen($file_name);
				$crud->insertarObituario($obituario);
				header('Location: ../main.php?msg=' . $msg);
			}
		} else {
			$msg = $msg . "Error al subir el archivo";
			header('Location: ../main.php?msg=' . $msg);
		}
	} else {
		header('Location: ../main.php?msg=' . $msg);
	}
}else if(isset($_POST['insertar'])){
	$obituario->setTitulo($_POST['Titulo']);
				$obituario->setDescripcion($_POST['Descripcion']);
				$obituario->setImagen($file_name);
				$crud->insertarObituario($obituario);
				header('Location: ../main.php?msg=' . "Se inserto correctamente");
}
