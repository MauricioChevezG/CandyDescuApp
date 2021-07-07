<?php 
require_once 'model/classreportepremios.php';
require_once 'public/reporte/plantilla.php';
class classreportepremiosController
{
	private $classreportepremios;
	private $reportePremio;

	function __construct()
	{
		$this->classreportepremios = new classreportepremios();
	}

	public function index(){
		require_once 'view/header_app.php';
		require_once 'view/classjuego/reportepremio.php';
		require_once 'view/footer.php';
	}

	public function reporte(){
		$this->classreportepremios->setAtributo('idfactura', $_REQUEST['id']);
		$this->reportePremio = new classreportepremios();

		$this->reportePremio->setAtributo('idfactura', $_REQUEST['id']);
		$datos = $this->reportePremio->reporteDatos();

		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFillColor(255,255,255);
		$pdf->SetFont('Arial','B',11);
		try
		{
			while ($row = mysqli_fetch_array($datos)) {
				$pdf->MultiCell(120, 15, utf8_decode("Número de Fatura: ".$row[0]), 0, 0, 'J');
				$pdf->MultiCell(120, 15, utf8_decode("Fecha de Factura: ".$row[1]), 0, 0, 'J');
				$pdf->MultiCell(120, 15, utf8_decode("Nombre Cliente: ".$row[2]." ".$row[3]." ".$row[4]), 0, 0, 'J');
				$pdf->MultiCell(120, 15, utf8_decode("Descripción del Premio: ".$row[5]), 0, 0, 'J');
				$pdf->MultiCell(120, 15, utf8_decode("Resultado del Premio: ".$row[6]."%"), 0, 0, 'J');
			 }
			 $pdf->Output();
		} catch(Exception $e){
			$pdf->Cell(30, 10, "Sin datos".$e, 0, 0, 'C');
			$pdf->Output();
		}
		$this->classreportepremios->eliminar();
		//header('Location: ?c=classreportepremios&m=index');
	}
}
?>