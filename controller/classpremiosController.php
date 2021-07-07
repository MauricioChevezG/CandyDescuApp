<?php 

require_once 'model/classpremios.php';
class classpremiosController
{
	private $classpremios;
	function __construct()
	{
		$this->classpremios = new classpremios();
	}
	public function index()
	{
		require_once 'view/header_app.php';
		require_once 'view/classpremios/index.php';
		require_once 'view/footer.php';
	}
	public function agregar()
	{
		if ($_POST) {
			$this->classpremios->setAtributo('cd_id_premio',$_POST['cd_id_premio']);
			$this->classpremios->setAtributo('cd_des_premio',$_POST['cd_des_premio']);
			$this->classpremios->setAtributo('cd_decuento_premio',$_POST['cd_decuento_premio']);
			$this->classpremios->guardar();
			header('location:?c=classpremios&m=index');
		}
		else{
			require_once 'view/header_app.php';
			require_once 'view/classpremios/agregar.php';
			require_once 'view/footer.php';
		}
	}
	public function editar()
	{
		if ($_POST) {
			$this->classpremios->setAtributo('cd_id_premio',$_POST['cd_id_premio']);
			$this->classpremios->setAtributo('cd_des_premio',$_POST['cd_des_premio']);
			$this->classpremios->setAtributo('cd_decuento_premio',$_POST['cd_decuento_premio']);
			$this->classpremios->actualizar();
			header('location:?c=classpremios&m=index');
		}
		else{
			$this->classpremios = $this->classpremios->buscar($_REQUEST['id']);
			require_once 'view/header_app.php';
			require_once 'view/classpremios/editar.php';
			require_once 'view/footer.php';		}
		}

	public function eliminar()
	{
		$this->classpremios->setAtributo('cd_id_premio',$_REQUEST['id']);
		$this->classpremios->eliminar();
		header('location:?c=classpremios&m=index');
	}

	public function ver()
	{
		$this->classpremios = $this->classpremios->buscar($_REQUEST['id']);
		require_once 'view/header_app.php';
		require_once 'view/classpremios/ver.php';
		require_once 'view/footer.php';
	}
	
}
?>