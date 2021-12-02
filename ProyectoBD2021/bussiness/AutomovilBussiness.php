<?php 

	include '../data/AutomovilData.php';

	class AutomovilBussiness
	{

    	private $consulta;

    	public function __construct()
    	{
        	$this->consulta = new AutomovilData();
    	}

		public function Crear($vehiculo)
		{
			return $this->consulta->insertAutomovil($vehiculo);
		}

		public function Leer()
		{
			return $this->consulta->obtainAutomovil();
		}

		public function Eliminar($id)
		{
			return $this->consulta->deleteAutomovil($id);
		}

		public function Modificar($vehiculo)
		{
			return $this->consulta->updateAutomovil($vehiculo);
		}

		public function Backup(){
			return $this->consulta->createBackup();
		}

	}
?>