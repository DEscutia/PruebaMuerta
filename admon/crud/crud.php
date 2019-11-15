<?php
session_start();
// incluye la clase Db
require_once('conexion.php');

	class Crud{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo libro
		public function insertarServicio($servicio){
			echo $_SESSION['id'];
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO Servicios values(NULL,:Titulo,:Descripcion,:Imagen,:Usuarios_idUsuarios)');
			$insert->bindValue('Titulo',$servicio->getTitulo());
			$insert->bindValue('Descripcion',$servicio->getDescripcion());
			$insert->bindValue('Imagen',$servicio->getImagen());
			$insert->bindValue('Usuarios_idUsuarios',$_SESSION['id']);
			$insert->execute();
		}
		public function insertarAtaud($ataud){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO Ataudes values(NULL,:Titulo,:Descripcion,:Imagen,:idUsuarios)');
			$insert->bindValue('Titulo',$ataud->getTitulo());
			$insert->bindValue('Descripcion',$ataud->getDescripcion());
			$insert->bindValue('Precio',$ataud->getPrecio());
			$insert->bindValue('Imagen',$ataud->getImagen());
			$insert->bindValue('Usuarios_idUsuarios',$ataud->getidUsuarios());
			$insert->execute();

		}
		public function insertarObituario($obituario){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO Obituarios values(NULL,:Titulo,:Descripcion,:Imagen,:idUsuarios)');
			$insert->bindValue('Titulo',$obituario->getTitulo());
			$insert->bindValue('Descripcion',$obituario->getDescripcion());
			$insert->bindValue('Imagen',$obituario->getImagen());
			$insert->bindValue('Usuarios_idUsuarios',$obituario->getidUsuarios());
			$insert->execute();

		}

		// método para mostrar todos los libros
		public function mostrarServicios(){
			$db=Db::conectar();
			$listaServicios=[];
			$select=$db->query('SELECT * FROM Servicios');
			foreach($select->fetchAll() as $servicio){
				$myServicio= new Servicio();
				$myServicio->setidServicios($servicio['idServicios']);
				$myServicio->setTitulo($servicio['Titulo']);
				$myServicio->setDescripcion($servicio['Descripcion']);
				$myServicio->setImagen($servicio['Imagen']);
				$myServicio->setidUsuarios($servicio['Usuarios_idUsuarios']);
				$listaServicios[]=$myServicio;
			}
			return $listaServicios;
		}
		public function mostrarAtaudes(){
			$db=Db::conectar();
			$listaAtaudes=[];
			$select=$db->query('SELECT * FROM Ataudes');
			foreach($select->fetchAll() as $servicio){
				$myAtaud= new Ataud();
				$myAtaud->setidAtaudes($servicio['idAtaudes']);
				$myAtaud->setTitulo($servicio['Titulo']);
				$myAtaud->setDescripcion($servicio['Descripcion']);
				$myAtaud->setImagen($servicio['Imagen']);
				$myAtaud->setPrecio($servicio['Precio']);
				$myAtaud->setidUsuarios($servicio['Usuarios_idUsuarios']);
				$listaAtaudes[]=$myAtaud;
			}
			return $listaOituarios;
		}
		public function mostrarObituarios(){
			$db=Db::conectar();
			$listaOituarios=[];
			$select=$db->query('SELECT * FROM Ataudes');
			foreach($select->fetchAll() as $servicio){
				$myObituario= new Obituarios();
				$myObituario->setidObituarios($servicio['idObituarios']);
				$myObituario->setTitulo($servicio['Titulo']);
				$myObituario->setDescripcion($servicio['Descripcion']);
				$myObituario->setImagen($servicio['Imagen']);
				$myObituario->setidUsuarios($servicio['Usuarios_idUsuarios']);
				$listaOituarios[]=$myObituario;
			}
			return $listaOituarios;
		}

		// método para eliminar un libro, recibe como parámetro el id del libro
		public function eliminarServicioByID($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM Servicios WHERE idServicios=:id');
			$eliminar->bindValue('idServicios',$id);
			$eliminar->execute();
		}

		// método para actualizar un libro, recibe como parámetro el libro
		public function actualizar($servicio){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE Servicios SET Titulo=:Titulo, Descripcion=:Descripcion,Imagen=:Imagen  WHERE idServicios=:idServicios');
			$actualizar->bindValue('idServicios',$servicio->getidServicios());
			$actualizar->bindValue('Titulo',$servicio->getTitulo());
			$actualizar->bindValue('Descripcion',$servicio->getDescripcion());
			$actualizar->bindValue('Imagen',$servicio->getImagen());
			$actualizar->execute();
		}
	}
?>