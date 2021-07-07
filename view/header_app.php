<!DOCTYPE html>
<html lang="en">
<head>
  <title>CandyDescu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="assets/imagenes/candy.png" sizes="196x196" />
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
  <?php 
    session_start();
    if(isset($_SESSION['usuario']) && isset($_SESSION['puesto']) && isset($_SESSION['idpuesto'])) {
      $usuario = $_SESSION['usuario'];
      $puesto = $_SESSION['puesto'];
      $idpuesto = $_SESSION['idpuesto'];
      ?>
      <div id="usu" style="display: none;">
        <?php 
          echo htmlspecialchars($usuario);
         ?>
      </div>
      <?php
    } else {
      header("Location: ?c=classlogin&m=index");
    }
  ?>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="?c=classprincipal&m=index">CandyDescu</a>
      </div>
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="?c=classprincipal&m=index">Inicio</a></li>-->
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php 
              if ($idpuesto == 1) :
             ?>
            <li><a href="?c=classusuarios"><span class="glyphicon glyphicon-wrench"></span> Usuarios</a></li>
            <?php 
              endif;
             ?>
            <li><a href="?c=classCliente"><span class="glyphicon glyphicon-wrench"></span> Clientes</a></li>
            <?php 
              if ($idpuesto == 1) :
             ?>
            <li><a href="?c=classpuestos"><span class="glyphicon glyphicon-wrench"></span> Puestos</a></li>
            <?php 
              endif;
             ?>
             <?php 
              if ($idpuesto == 1) :
             ?>
            <li><a href="?c=classpremios"><span class="glyphicon glyphicon-wrench"></span> Premios</a></li>
            <?php 
              endif;
             ?>
          </ul>
        </li>
        <li><a href="?c=classjuego&m=index1">Verificar</a></li>
        <?php 
          if ($idpuesto == 1) :
         ?>
        <li><a href="?c=classjuego">Juego</a></li>
        <?php 
          endif;
         ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a>
            <span class="glyphicon glyphicon-user"> 
              <?php
                echo($usuario);
                echo " | ";
                echo($puesto);
              ?>
            </span>
          </a>
        </li>
        <li><a onclick="cerrarSesion()"><span class="glyphicon glyphicon-log-out"></span> Login Out</a></li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid ">