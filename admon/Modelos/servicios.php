<?php
	class Servicio{
		private $idServicios;
		private $Titulo;
		private $Descripcion;
        private $Imagen;
        private $Usuarios_idUsuarios;

		function __construct(){}

		public function getidServicios(){
		return $this->idServicios;
		}

		public function setidServicios($idServicios){
			$this->idServicios=$idServicios;
		}

		public function getTitulo(){
			return $this->Titulo;
		}

		public function setTitulo($Titulo){
			$this->Titulo = $Titulo;
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
			return $this->Usuarios_idUsuarios;
		}

		public function setidUsuarios($idUsuarios){
			$this->Usuarios_idUsuarios = $idUsuarios;
		}
	}
