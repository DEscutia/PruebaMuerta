<?php
	class Usuario{
		private $idUsuarios;
		private $Nombre;
		private $NombrUsuario;
        private $Contraseña;

		function __construct(){}

		public function setidUsuarios($idUsuarios){
			$this->idUsuarios=$idUsuarios;
		}

		public function getidUsuarios(){
		return $this->idUsuarios;
		}

		public function getNombre(){
			return $this->Nombre;
		}

		public function setNombre($Nombre){
			$this->Nombre = $Nombre;
		}

		public function getNombrUsuario(){
		return $this->NombrUsuario;
		}

		public function NombrUsuario($NombrUsuario){
			$this->NombrUsuario = $NombrUsuario;
        }
        
		public function getContraseña(){
			return $this->Contraseña;
		}

		public function setContraseña($Contraseña){
			$this->Contraseña = $Contraseña;
        }
	}
