<?php 
require_once 'conexion.php';

class classjuego  extends Conexion
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
		$sql = "CALL sp_cd_juego_buscar ('".$cd_id_premio."');";
		$result = $this->conexion->consultaRetorno($sql);
		$classjuego = $this->convertToclassjuego($result);
		return $classjuego;
	}

	public function listar()
	{
		$sql = "CALL sp_cd_premios_listar();";
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
		$sql = "CALL sp_cd_puestos_eliminar('$this->cd_id_premio');";
		$this->conexion->consultaSimple($sql);
	}

	public function guardarfactura()
	{
		$sql = "CALL sp_cd_factura_guardar('$this->cedula','$this->factura');";
		$this->conexion->consultaSimple($sql);
	}

	public function verificarCliente($cedula){
		$sql = "SELECT fn_verificar_cliente('".$cedula."');";
		$result = $this->conexion->consultaRetorno($sql);
		$dato = mysqli_fetch_array($result);
		return $dato;
	}

	public function aplicarjuego($facturas){
		$sql = "SELECT fn_aplicarjuego('".$facturas."');";
		$result = $this->conexion->consultaRetorno($sql);
		$dato = mysqli_fetch_array($result);
		return $dato;
	}

	public function aplicarpremio($premio){
		$sql = "SELECT fn_aplicapremio('".$premio."');";
		$result = $this->conexion->consultaRetorno($sql);
		$dato = mysqli_fetch_array($result);
		return $dato;
	}

	public function convertToclassjuego($result)
	{
		$classjuego = new classjuego();
		while ($row = mysqli_fetch_array($result)) {
			$classjuego->setAtributo('cd_id_premio',$row[0]);
            $classjuego->setAtributo('cd_des_premio',$row[1]);
            $classjuego->setAtributo('cd_decuento_premio',$row[2]);
		}
		return $classjuego;
	}
}
 ?>