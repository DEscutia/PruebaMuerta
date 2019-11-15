<?php
//incluye la clase Libro y CrudLibro
require_once('crud.php');
require_once('../Modelos/servicios.php');

$crud= new Crud();
$servicio= new Servicio();

	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
		$servicio->setTitulo($_POST['Titulo']);
		$servicio->setDescripcion($_POST['Descripcion']);
		$servicio->setImagen($_POST['Imagen']);
		//llama a la función insertar definida en el crud
		$crud->insertarServicio($servicio);
		header('Location: ../main.php?msg=Se inserto correctamente.');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el libro
	}elseif(isset($_POST['actualizar'])){
		$servicio->setidServicios($_POST['id']);
		$servicio->setTitulo($_POST['Titulo']);
		$servicio->setDescripcion($_POST['Descripcion']);
		$servicio->setImagen($_POST['Imagen']);
		$crud->actualizarServicio($servicio);
		header('Location: ../main.php?msg=Se actualizo correctamente.');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un libro
	}elseif ($_GET['accion']=='e') {
		$crud->eliminarServicioByID($_GET['idServicios']);
		header('Location: ../main.php?msg=Se eleimino correctamente.');		
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: actualizar.php');
	}
