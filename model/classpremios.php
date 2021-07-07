
<?php 
require_once 'conexion.php';

class classpremios  extends Conexion
{
	private $cd_id_premio;
	private $cd_des_premio;
	private $cd_decuento_premio;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($cd_des_premio, $valor)
	{
		$this->$cd_des_premio = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($cd_des_premio)
	{
		return $this->$cd_des_premio;
	}

	public function buscar($cd_id_premio)
	{
		$sql = "CALL sp_cd_premios_buscar ('".$cd_id_premio."');";
		$result = $this->conexion->consultaRetorno($sql);
		$classpremios = $this->convertToclasspremios($result);
		return $classpremios;
	}

	public function listar()
	{
		$sql = "CALL sp_cd_premios_listar();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL sp_cd_premios_guardar('$this->cd_id_premio','$this->cd_des_premio','$this->cd_decuento_premio');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "CALL sp_cd_premios_editar('$this->cd_id_premio','$this->cd_des_premio','$this->cd_decuento_premio');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL sp_cd_premios_eliminar('$this->cd_id_premio');";
		$this->conexion->consultaSimple($sql);
	}

	public function convertToclasspremios($result)
	{
		$classpremios = new classpremios();
		while ($row = mysqli_fetch_array($result)) {
			$classpremios->setAtributo('cd_id_premio',$row[0]);
			$classpremios->setAtributo('cd_des_premio',$row[1]);
			$classpremios->setAtributo('cd_decuento_premio',$row[2]);
		}
		return $classpremios;
	}
}
 ?>