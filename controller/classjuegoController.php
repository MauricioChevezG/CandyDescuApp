<?php
require_once 'model/classjuego.php';
?>
<link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css">
<script src="assets/alertifyjs/alertify.min.js"></script>
<?php
class classjuegoController
{
	private $classjuego;
	private $cedula;
	private $juego;
	private $reporte;

	function __construct() {
		$this->classjuego =  new classjuego();
	}

	public function index(){
		require_once 'view/header_app.php';
		require_once 'view/classjuego/juego.php';
		require_once 'view/footer.php';
	}

	public function index1(){
		require_once 'view/header_app.php';
		require_once 'view/classjuego/previo.php';
		require_once 'view/footer.php';
	}

	public function index2(){
		require_once 'view/header_app.php';
		require_once 'view/classjuego/juego.php';
		require_once 'view/footer.php';
	}

	public function verificaCliente(){
		if ($_POST['submit']) {
			$this->classjuego->setAtributo('cedula', $_POST['cedula']);
			$this->classjuego->setAtributo('factura', $_POST['factura']);
			$cedula = $this->classjuego->verificarCliente($_POST['cedula']);
			if ($cedula[0] == 'S') {
				$this->classjuego->setAtributo('cedula', $_POST['cedula']);
				$this->classjuego->setAtributo('factura', $_POST['factura']);
				$juego = $this->classjuego->aplicarjuego($_POST['factura']);
				if ($juego[0] == 'S') {
					?>
						<script>
							alert('Factura ya existente');
						</script>
					<?php
					header('Location: ?c=classjuego&m=index1');
				} else {
					$this->classjuego->setAtributo('cedula', $_POST['cedula']);
					$this->classjuego->setAtributo('factura', $_POST['factura']);
					$this->classjuego->guardarfactura();
					?>
						<script>
							alert('Listo para jugar?');
						</script>
					<?php
					header('Location: ?c=classjuego&m=index');
				}
			} else {
				header('Location: ?c=classCliente&m=index');
			}
		}
	}

	public function ganaPremio(){
		$this->classjuego->setAtributo('cd_id_premio',$_REQUEST['id']);
		$dato = $this->classjuego->getAtributo('cd_id_premio');
		//$premio = $this->classjuego->aplicarpremio($dato);
		$this->classjuego->reporte_premio($dato);
		header('Location: ?c=classreportepremios&m=index');
	}
}
 ?>