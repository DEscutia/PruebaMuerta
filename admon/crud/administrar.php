<?php
session_start();
if (!isset($_SESSION['ena'])) {
    header('location:index.php');
}
//incluye la clase Libro y CrudLibro
require_once('crud.php');
require_once('../Modelos/servicios.php');
$crud= new Crud();
$servicio= new Servicio();
	if (isset($_POST['insertarServicio'])) {
		$servicio->setTitulo($_POST['Titulo']);
		$servicio->setDescripcion($_POST['Descripcion']);
		$servicio->setImagen($_POST['Imagen']);
		//llama a la función insertar definida en el crud
		$crud->insertarServicio($servicio);
		header('Location: ../main.php?msg=Se inserto correctamente.');
	}else if(isset($_POST['actualizarServicio'])){
		if($_FILES['uploadedfile']['size']==0){
			//Si no se selecciono nueva imagen
			$servicio->setidServicios($_POST['id']);
			$servicio->setTitulo($_POST['Titulo']);
			$servicio->setDescripcion($_POST['Descripcion']);
			$servicio->setImagen($_POST['Imagen']);
			$crud->actualizarServicio($servicio);
		//header('Location: ../main.php?msg=Se actualizo correctamente.');
		}else{
			//Si se selecciono nueva imagen
			unlink('../img/Servicios/'. $_POST['Imagen']);
			//Servicio de subida
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
			$add = "../img/Servicios/$file_name";
			if ($uploadedfileload == "true") {
				if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add)) {
					$msg = $msg . "Ha sido actualizado satisfactoriamente";
				} else {
					$msg = $msg . "Error al subir el archivo";
					header('Location: ../main.php?msg=' . $msg);
				}
			} else {
				header('Location: ../main.php?msg=' . $msg);
			}
			//------------------
			if($uploadedfileload==true){
				$servicio->setidServicios($_POST['id']);
				$servicio->setTitulo($_POST['Titulo']);
				$servicio->setDescripcion($_POST['Descripcion']);
				$servicio->setImagen($file_name);
				$crud->actualizarServicio($servicio);
				header('Location: ../main.php?msg=' . $msg);
			}	
		}
	}elseif ($_GET['accion']=='eServicio') {
		unlink('../img/Servicios/'. $_GET['ruta']);
		$crud->eliminarServicioByID($_GET['idServicios']);
		header('Location: ../main.php?msg=Se eleimino correctamente.');
	}
