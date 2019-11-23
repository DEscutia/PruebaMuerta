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
			$insert=$db->prepare('INSERT INTO Ataudes values(NULL,:Titulo,:Descripcion,:Imagen,:Usuarios_idUsuarios)');
			$insert->bindValue('Titulo',$ataud->getTitulo());
			$insert->bindValue('Descripcion',$ataud->getDescripcion());
			$insert->bindValue('Precio',$ataud->getPrecio());
			$insert->bindValue('Imagen',$ataud->getImagen());
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
		public function actualizarServicio($servicio){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE Servicios SET Titulo=:Titulo, Descripcion=:Descripcion,Imagen=:Imagen  WHERE idServicios=:idServicios');
			$actualizar->bindValue('idServicios',$servicio->getidServicios());
			$actualizar->bindValue('Titulo',$servicio->getTitulo());
			$actualizar->bindValue('Descripcion',$servicio->getDescripcion());
			$actualizar->bindValue('Imagen',$servicio->getImagen());
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
	}