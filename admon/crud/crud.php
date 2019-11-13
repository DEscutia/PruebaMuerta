<?php
// incluye la clase Db
require_once('conexion.php');

	class Crud{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo libro
		public function insertarServicio($servicio){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO Servicios values(NULL,:Titulo,:Descripcion,:Imagen,:idUsuarios)');
			$insert->bindValue('Titulo',$servicio->getTitulo());
			$insert->bindValue('Descripcion',$servicio->getDescripcion());
			$insert->bindValue('Imagen',$servicio->getImagen());
			$insert->bindValue('Usuarios_idUsuarios',$servicio->getidUsuarios());
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