<?php
//incluye la clase Libro y CrudLibro
require_once($_SERVER['DOCUMENT_ROOT'].'/apps/PruebaMuerta/admon/crud/crud.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/apps/PruebaMuerta/admon/Modelos/servicios.php');

$crud= new Crud();
$servicio= new Servicio();

	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
        $uploadedfileload="true";
        $uploadedfile_size=$_FILES['uploadedfile']['size'];
		$servicio->setTitulo($_POST['Titulo']);
		$servicio->setDescripcion($_POST['Descripcion']);
		$servicio->setImagen($_FILES['uploadedfile']['name']);
		//llama a la función insertar definida en el crud
		$crud->insertarServicio($servicio);
		if ($_FILES['uploadedfile']['size']>1000000)
{
    $msg=$msg."El archivo es mayor que 1MB, debes reduzcirlo antes de subirlo<BR>";
$uploadedfileload="false";
}

if (!($_FILES['uploadedfile']['type'] =="image/jpeg" OR $_FILES['uploadedfile']['type'] =="image/gif"))
{
$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
$uploadedfileload="false";
}

$file_name=$_FILES['uploadedfile']['name'];
$add="../img/Servicios/$file_name".$servicio->getTitulo();
if($uploadedfileload=="true"){

if(move_uploaded_file ($_FILES['uploadedfile']['tmp_name'], $add)){
echo " Ha sido subido satisfactoriamente";
}else{echo "Error al subir el archivo";}

}else{echo $msg;}
		header('Location: index.php?msg='.$msg);
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el libro
	}

?>