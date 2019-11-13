<?php
	class Servicio{
		private $idServicios;
		private $Titulo;
		private $Descripcion;
        private $Imagen;
        private $idUsuarios;

		function __construct(){}

		public function getidServicios(){
		return $this->idServicios;
		}

		public function getTitulo(){
			return $this->Titulo;
		}

		public function setTitulo($Titulo){
			$this->autor = $Titulo;
		}

		public function getDescripcion(){
		return $this->Descripcion;
		}

		public function setDescripcion($Descripcion){
			$this->Descripcion = $Descripcion;
        }
        
		public function getImagen(){
			return $this->Imagen;
		}

		public function setImagen($Imagen){
			$this->Imagen = $Imagen;
        }
        
        public function getidUsuarios(){
			return $this->idUsuarios;
		}

		public function setidUsuarios($idUsuarios){
			$this->idUsuarios = $idUsuarios;
		}
	}
?>