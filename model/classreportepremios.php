<?php 
require_once 'conexion.php';

class classreportepremios  extends Conexion
{
	private $idfactura;
    private $cd_r_des_premio;
    private $cd_r_premio;

	private $conexion;
	
	function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function setAtributo($idfactura, $valor)
	{
		$this->$idfactura = ucfirst(strtolower($valor)); 
	}

	public function getAtributo($idfactura)
	{
		return $this->$idfactura;
	}

	public function buscar($cd_id_premio)
	{
		$sql = "CALL sp_cd_juego_buscar ('".$cd_id_premio."');";
		$result = $this->conexion->consultaRetorno($sql);
		$classjuego = $this->convertToclassreportepremios($result);
		return $classjuego;
	}

	public function listar()
	{
		$sql = "CALL sp_cd_reporte_premio_listar();";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function guardar()
	{
		$sql = "CALL sp_cd_puestos_guardar('$this->cd_id_premio','$this->cd_des_premio','$this->cd_decuento_premio');";
		$this->conexion->consultaSimple($sql);
	}

	public function actualizar()
	{
		$sql = "CALL sp_cd_puestos_editar('$this->cd_id_premio','$this->cd_des_premio','$this->cd_decuento_premio');";
		$this->conexion->consultaSimple($sql);
	}

	public function eliminar()
	{
		$sql = "CALL sp_cd_reporte_factura_eliminar('$this->idfactura');";
		$this->conexion->consultaSimple($sql);
	}

	public function reporteDatos(){
		$sql = "CALL sp_cd_reporte_datos('$this->idfactura');";
		$result = $this->conexion->consultaRetorno($sql);
		return $result;
	}

	public function convertToclassreportepremios($result)
	{
		$classreportepremios = new classreportepremios();
		while ($row = mysqli_fetch_array($result)) {
			$classreportepremios->setAtributo('idfactura',$row[0]);
		}
		return $classreportepremios;
	}
}
 ?>