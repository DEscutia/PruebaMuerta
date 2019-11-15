<?php
	class Ataud{
		private $idAtaudes;
		private $Titulo;
		private $Descripcion;
        private $Imagen;
        private $Precio;
        private $idUsuarios;

		function __construct(){}

		public function setidAtaudes($idAtaudes){
			$this->idAtaudes=$idAtaudes;
		}

		public function getidAtaudes(){
		return $this->idAtaudes;
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

        public function getPrecio(){
			return $this->Precio;
		}

		public function setPrecio($Precio){
			$this->Precio = $Precio;
        }
        
        public function getidUsuarios(){
			return $this->idUsuarios;
		}

		public function setidUsuarios($idUsuarios){
			$this->idUsuarios = $idUsuarios;
		}
	}
