<?php
require_once('conexion.php');
	class Crud{
		public function __construct(){}
		public function insertarServicio($servicio){
			session_start();
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
			$insert=$db->prepare('INSERT INTO ataudes values(NULL,:Titulo,:Descripcion,:Imagen,:Precio,:Usuarios_idUsuarios)');
			$insert->bindValue('Titulo',$ataud->getTitulo());
			$insert->bindValue('Descripcion',$ataud->getDescripcion());
			$insert->bindValue('Imagen',$ataud->getImagen());
			$insert->bindValue('Precio',$ataud->getPrecio());
			$insert->bindValue('Usuarios_idUsuarios',$_SESSION['id']);
			$insert->execute();

		}
		public function insertarObituario($obituario){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO Obituarios values(NULL,:Titulo,:Descripcion,:Imagen,:Usuarios_idUsuarios)');
			$insert->bindValue('Titulo',$obituario->getTitulo());
			$insert->bindValue('Descripcion',$obituario->getDescripcion());
			$insert->bindValue('Imagen',$obituario->getImagen());
			$insert->bindValue('Usuarios_idUsuarios',$_SESSION['id']);
			$insert->execute();

		}
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
			$select=$db->query('SELECT * FROM ataudes');
			foreach($select->fetchAll() as $ataud){
				$myAtaud= new Ataud();
				$myAtaud->setidAtaudes($ataud['idAtaudes']);
				$myAtaud->setTitulo($ataud['Titulo']);
				$myAtaud->setDescripcion($ataud['Descripcion']);
				$myAtaud->setImagen($ataud['Imagen']);
				$myAtaud->setPrecio($ataud['Precio']);
				$myAtaud->setidUsuarios($ataud['Usuarios_idUsuarios']);
				$listaAtaudes[]=$myAtaud;
			}
			return $listaAtaudes;
		}
		public function mostrarObituarios(){
			$db=Db::conectar();
			$listaOituarios=[];
			$select=$db->query('SELECT * FROM obituarios');
			foreach($select->fetchAll() as $obituario){
				$myObituario= new Obituario();
				$myObituario->setidObituarios($obituario['idObituarios']);
				$myObituario->setTitulo($obituario['Titulo']);
				$myObituario->setDescripcion($obituario['Descripcion']);
				$myObituario->setImagen($obituario['Imagen']);
				$myObituario->setidUsuarios($obituario['Usuarios_idUsuarios']);
				$listaOituarios[]=$myObituario;
			}
			return $listaOituarios;
		}
		public function eliminarServicioByID($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM Servicios WHERE idServicios=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
		public function eliminarObituarioByID($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM obituarios WHERE idObituarios=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
		public function eliminarAtaudByID($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM ataudes WHERE idAtaudes=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
		public function actualizarServicio($servicio){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE Servicios SET Titulo=:Titulo, Descripcion=:Descripcion,Imagen=:Imagen  WHERE idServicios=:idServicios');
			$actualizar->bindValue('idServicios',$servicio->getidServicios());
			$actualizar->bindValue('Titulo',$servicio->getTitulo());
			$actualizar->bindValue('Descripcion',$servicio->getDescripcion());
			$actualizar->bindValue('Imagen',$servicio->getImagen());
			$actualizar->execute();
		}
		public function actualizarObituario($obituario){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE obituarios SET Titulo=:Titulo, Descripcion=:Descripcion,Imagen=:Imagen  WHERE idObituarios=:idObituarios');
			$actualizar->bindValue('idObituarios',$obituario->getidObituarios());
			$actualizar->bindValue('Titulo',$obituario->getTitulo());
			$actualizar->bindValue('Descripcion',$obituario->getDescripcion());
			$actualizar->bindValue('Imagen',$obituario->getImagen());
			$actualizar->execute();
		}
		public function actualizarAtaud($ataud){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE ataudes SET Titulo=:Titulo, Descripcion=:Descripcion,Imagen=:Imagen,Precio=:Precio  WHERE idAtaudes=:idAtaudes');
			$actualizar->bindValue('idAtaudes',$ataud->getidAtaudes());
			$actualizar->bindValue('Titulo',$ataud->getTitulo());
			$actualizar->bindValue('Descripcion',$ataud->getDescripcion());
			$actualizar->bindValue('Imagen',$ataud->getImagen());
			$actualizar->bindValue('Precio',$ataud->getPrecio());
			$actualizar->execute();
		}
		public function obtenerServicio($idServicio){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM Servicios WHERE idServicios=:idServicios');
			$select->bindValue('idServicios',$idServicio);
			$select->execute();
			$myServicio= new Servicio();
			foreach($select->fetchAll() as $servicio){
				$myServicio->setidServicios($servicio['idServicios']);
				$myServicio->setTitulo($servicio['Titulo']);
				$myServicio->setDescripcion($servicio['Descripcion']);
				$myServicio->setImagen($servicio['Imagen']);
				$myServicio->setidUsuarios($servicio['Usuarios_idUsuarios']);
			}
			return $myServicio;
		}
		public function obtenerObituario($idObituarios){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM obituarios WHERE idObituarios=:idObituarios');
			$select->bindValue('idObituarios',$idObituarios);
			$select->execute();
			$myObituario= new Obituario();
			foreach($select->fetchAll() as $obituario){
				$myObituario->setidObituarios($obituario['idObituarios']);
				$myObituario->setTitulo($obituario['Titulo']);
				$myObituario->setDescripcion($obituario['Descripcion']);
				$myObituario->setImagen($obituario['Imagen']);
				$myObituario->setidUsuarios($obituario['Usuarios_idUsuarios']);
			}
			return $myObituario;
		}
		public function obtenerAtaud($idAtaudes){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM ataudes WHERE idAtaudes=:idAtaudes');
			$select->bindValue('idAtaudes',$idAtaudes);
			$select->execute();
			$myAtaud= new Ataud();
			foreach($select->fetchAll() as $ataud){
				$myAtaud->setidAtaudes($ataud['idAtaudes']);
				$myAtaud->setTitulo($ataud['Titulo']);
				$myAtaud->setDescripcion($ataud['Descripcion']);
				$myAtaud->setImagen($ataud['Imagen']);
				$myAtaud->setPrecio($ataud['Precio']);
				$myAtaud->setidUsuarios($ataud['Usuarios_idUsuarios']);
			}
			return $myAtaud;
		}
	}