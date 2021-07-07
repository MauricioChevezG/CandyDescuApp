<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>CandyDescu</title>
  <link rel="icon" type="image/png" href="assets/imagenes/candy.png" sizes="196x196" />
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="public/css/login.css">
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="?c=classinicio&m=index">CandyDescu</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?c=classlogin&m=index"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">                     
                        <div class="row-fluid user-row">
                            <img src="assets/imagenes/candy.png" class="img-thumbnail img-responsive" alt="Conxole Admin">
                        </div>
                    </div>
                    <div class="panel-body">
                        <center>
                                <strong>
                                    <h4>
                                    CandyDescu
                                    </h4>
                                </strong>
                            </center>
                        <form class="form-signin" action="?c=classlogin&m=test_login" method="post" accept-charset="UTF-8" role="form">
                            <fieldset>
                                <label class="panel-login">
                                    <div class="login_result"></div>
                                </label>
                                <input class="form-control" placeholder="Usuario" id="usuario" name="usuario" type="text">
                                <input class="form-control" placeholder="Contraseña" id="clave" name="clave" type="password">
                                <br>
                                <a data-toggle="modal" data-target="#ModalLogin">Cambiar Contraseña?</a>
                                <br>
                                <div class="form-group">
                                  <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" id="submit" value="Iniciar Sesión">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
      <div class="container-fluid">
          <div class="text-center">
            <small>Derechos Reservados 2018</small>
          </div>
      </div>
  </footer>

  <div class="container-fluid ">
    <!-- Modal -->
    <div id="ModalLogin" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">   
            <div class="row-fluid user-row">
                <img src="assets/imagenes/candy.png" class="img-responsive" alt="Conxole Admin">
            </div>
            <h5 class="modal-title">
                <center>
                    <strong>    
                        <h4>
                        CandyDescu
                        </h4>
                    </strong>
                </center>
            </h5>
          </div>
          <div class="modal-body">
              <form class="form-signin" action="?c=classlogin&m=cambiar_clave" method="post" accept-charset="UTF-8" role="form">
                <fieldset>
                    <label class="panel-login">
                        <div class="login_result"></div>
                    </label>
                    <input class="form-control" placeholder="Correo" id="correos" name="correos" type="text">
                    <input class="form-control" placeholder="Usuario" id="usuarios" name="usuarios" type="text">
                    <input class="form-control" placeholder="Contraseña" id="claves" name="claves" type="password">
                    <br>
                    <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" id="submit" value="Enviar">
                </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
	  <script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="public/js/iniciar.js"></script>-->
</body>
</html>