<?php
session_start();
if (!isset($_SESSION['ena'])) {
    header('location:index.php');
}
require_once('crud.php');
require_once('../Modelos/servicios.php');
require_once('../Modelos/obituarios.php');
require_once('../Modelos/ataud.php');
$crud= new Crud();
$servicio= new Servicio();
$obituario = new Obituario();
$ataud=new Ataud();
//---------------------------------------------Servicios
	if(isset($_POST['actualizarServicio'])){
		if($_FILES['uploadedfile']['size']==0){
			//Si no se selecciono nueva imagen
			$servicio->setidServicios($_POST['id']);
			$servicio->setTitulo($_POST['Titulo']);
			$servicio->setDescripcion($_POST['Descripcion']);
			$servicio->setImagen($_POST['Imagen']);
			$crud->actualizarServicio($servicio);
		header('Location: ../main.php?msg=Se actualizo correctamente.');
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
	}
	//----------------------------------------------------------------------FinServicios
	//----------------------------------------------------------------------Eliminaciones
	if(isset($_GET['acction'])){
		if($_GET['acction']=='eServicio') {
			unlink('../img/Servicios/'. $_GET['ruta']);
			$crud->eliminarServicioByID($_GET['idServicios']);
			header('Location: ../main.php?msg=Se eleimino correctamente.');
		}
		if($_GET['acction']=='eObituario'){
			unlink('../img/Obituarios/'. $_GET['ruta']);
			$crud->eliminarObituarioByID($_GET['idObituarios']);
			header('Location: ../main.php?msg=Se eleimino correctamente.');
		}
		if($_GET['acction']=='eAtaud'){
			unlink('../img/Ataudes/'. $_GET['ruta']);
			$crud->eliminarAtaudByID($_GET['idAtaudes']);
			header('Location: ../main.php?msg=Se eleimino correctamente.');
		}
	}
//----------------------------------------------------------------------Obituarios
	if(isset($_POST['actualizarObituario'])){
		if($_FILES['uploadedfile']['size']==0){
			//Si no se selecciono nueva imagen
			$obituario->setidObituarios($_POST['id']);
			$obituario->setTitulo($_POST['Titulo']);
			$obituario->setDescripcion($_POST['Descripcion']);
			$obituario->setImagen($_POST['Imagen']);
			$crud->actualizarObituario($obituario);
		header('Location: ../main.php?msg=Se actualizo correctamente.');
		}else{
			//Si se selecciono nueva imagen
			unlink('../img/Obituarios/'. $_POST['Imagen']);
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
			$add = "../img/Obituarios/$file_name";
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
				$obituario->setidObituarios($_POST['id']);
				$obituario->setTitulo($_POST['Titulo']);
				$obituario->setDescripcion($_POST['Descripcion']);
				$obituario->setImagen($file_name);
				$crud->actualizarObituario($obituario);
				header('Location: ../main.php?msg=' . $msg);
			}	
		}
	}
//----------------------------------------------------------------------FinObituarios
//----------------------------------------------------------------------Ataudes
if(isset($_POST['actualizarAtaud'])){
	if($_FILES['uploadedfile']['size']==0){
		//Si no se selecciono nueva imagen
		$ataud->setidAtaudes($_POST['id']);
		$ataud->setTitulo($_POST['Titulo']);
		$ataud->setDescripcion($_POST['Descripcion']);
		$ataud->setImagen($_POST['Imagen']);
		$ataud->setPrecio($_POST['Precio']);
		$crud->actualizarAtaud($ataud);
	header('Location: ../main.php?msg=Se actualizo correctamente.');
	}else{
		//Si se selecciono nueva imagen
		unlink('../img/Ataudes/'. $_POST['Imagen']);
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
		$add = "../img/Ataudes/$file_name";
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
			$ataud->idAtaudes($_POST['id']);
			$ataud->setTitulo($_POST['Titulo']);
			$ataud->setDescripcion($_POST['Descripcion']);
			$ataud->setImagen($_POST['Imagen']);
			$ataud->setPrecio($_POST['Precio']);
			$crud->actualizarAtaud($ataud);
			header('Location: ../main.php?msg=Se actualizo correctamente.');
		}	
	}
}
//----------------------------------------------------------------------FinAtaudes