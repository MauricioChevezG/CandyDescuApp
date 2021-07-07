<?php 
require_once 'model/classlogin.php';
?>
<link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css">
<script src="assets/alertifyjs/alertify.min.js"></script>
<?php 
//require_once 'view/login.php';
class classloginController {
	//Definición de variables
	private $classlogin;
	private $idusuario;
	private $existe_usuario;
	private $puesto;
	private $acceso;
	private $claveerronea;
	private $msg;

	function __construct() {
		$this->classlogin =  new classlogin();
	}

	public function index() {
		session_start();
		session_destroy();
		require_once 'view/login.php';
	}

	public function login(){
		if (isset($_POST['submit'])) {
			try {
				if (empty($_POST["usuario"] || $_POST["clave"])) {
					?>
					 <script>
					 	alertify.alert('Alerta','Debe digitar un usuario y una clave');
					 </script>
					<?php
				} else {
					if ($_POST) {
						$this->classlogin->setAtributo('usuario', $_POST['usuario']);
						$this->classlogin->setAtributo('clave', $_POST['clave']);
						$idusuario 		= $this->classlogin->obtUsaurioID($_POST['usuario'], $_POST['clave']);
						$existe_usuario = $this->classlogin->existeUsuario($idusuario[0], $_POST['usuario'], $_POST['clave']);
						if ($idusuario[0] == NULL) {
							?>
							 <script>
							 	alertify.alert('Alerta','El ID del usuario no existe');
							 </script>
							<?php
							header('location: ?c=classprincipal&m=index');
						} 
						else {
							echo "estas aca";
							header('location: ?c=classprincipal&m=index');
							?>
							 <script>
							 	alertify.alert('Alerta','Exite: '.$existe_usuario[0]);
							 </script>
							<?php
							if ($existe_usuario[0] == 'S') {
								if ($this->classlogin->entrar($_POST['usuario'],$_POST['clave']) == true) {
									session_start();
									if ($_SESSION['idpuesto'] == 1) {
										header("Location: ?c=classprincipal&m=index");	
									} else if ($_SESSION['idpuesto'] == 2){
										header("Location: ?c=classprincipal&m=index");
									} else  if ($_SESSION['idpuesto'] == 3) {
										header("Location: ?c=classprincipal&m=index");								
									} else if ($_SESSION['idpuesto'] == 4) {
										header("Location: ?c=classprincipal&m=index");
									} else {
										header("Location: ?c=class03puestos&m=index");
									}
								} else {
									?>
									<script>
										alert("Usuario y Clave son incorrectos");
										location.href = "?c=classlogin&m=index";
									</script>
									<?php
								}
								echo "ahora aca";
								header('location: ?c=classprincipal&m=index');
							} 
							else {
								?>
								<script>
									alertify.alert('Alerta','No existe usuario');
								</script>
								<?php
								header('location: ?c=classprincipal&m=index');
							}
						}
					} else {
						require_once 'view/login.php';
					}
				}
			} catch (Exception $e) {
				?>
					<script>
						location.href = "?c=classlogin&m=index";
					</script>
				<?php
			}
		}
	}

	public function cambiar_clave(){
		if (isset($_POST["submit"])) {
			try{
				if (empty($_POST["correos"] || $_POST["usuarios"] || $_POST["claves"])) {
					throw new Exception("correo y usuario son incorrectos");
				} else {
					if ($_POST) {
						$this->classlogin->setAtributo('correos',$_POST['correos']);
						$this->classlogin->setAtributo('usuarios',$_POST['usuarios']);
						$this->classlogin->setAtributo('claves',$_POST['claves']);
						$this->classlogin->cambiar_clave($_POST['correos'],$_POST['usuarios'],$_POST["claves"]);
						echo ".";
						?>
							<script>
								alertify.alert('Alerta','Se cambio la nueva clave', function(){ 
									alertify.success('Ok');
									location.href = "?c=classlogin&m=index"; 
								});
							</script>
						<?php
					} else {
						require_once 'view/login.php';
					}
				}
			}
			catch (Exception $e) {
				echo ".";
				?>
				<script>
					alertify.alert('Alerta','Se cambio la nueva clave', function(){ 
									alertify.success('Ok');
									location.href = "?c=classlogin&m=index"; 
								});
				</script>
				<?php
		    }
		}
	}

	public function test_login(){
		if (isset($_POST["submit"])) {
			try{
				if (empty($_POST["usuario"] || $_POST["clave"])) {
					throw new Exception("Usuario y Clave estan vacios");
				} else {
					if ($_POST) {
						$this->classlogin->setAtributo('usuario',$_POST['usuario']);
						$this->classlogin->setAtributo('clave',$_POST['clave']);
						//$this->classlogin->entrar($_POST['usuario'],$_POST['clave']);
						if ($this->classlogin->entrar($_POST['usuario'],$_POST['clave']) == true) {
							session_start();
							if ($_SESSION['idpuesto'] == 1) {
								header("Location: ?c=classprincipal&m=index");
							} else if ($_SESSION['idpuesto'] == 2){
								header("Location: ?c=classprincipal&m=index");
							} else  if ($_SESSION['idpuesto'] == 3) {
								header("Location: ?c=classprincipal&m=index");	
							} else if ($_SESSION['idpuesto'] == 4) {
								header("Location: ?c=classprincipal&m=index");
							} else {
								header("Location: ?c=classinicio&m=index");
							}
						} else {
							echo ".";
							?>
							<script>
								alertify.alert("Alerta","Usuario y Clave son incorrectos", function(){ 
									alertify.success('Ok');
									location.href = "?c=classlogin&m=index"; 
								});
							</script>
							<?php
						}
					} else {
						require_once 'view/login.php';
					}
				}
			}
			catch (Exception $e) {
				echo ".";
				?>
				<script>
					alertify.alert('Alerta','Usuario y Clave estan vacios', function(){ 
						alertify.success('Ok');
						location.href = "?c=classlogin&m=index"; 
					});
				</script>
				<?php
		    }
		}
	}
}
?>