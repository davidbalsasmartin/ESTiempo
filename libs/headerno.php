<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>EStiempo</title>
  <!-- favicon -->
  <link href="http://localhost:90/miproyecto/img/icono3.ico" rel="shortcut icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="http://localhost:90/miproyecto/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="http://localhost:90/miproyecto/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="http://localhost:90/miproyecto/css/style.css" rel="stylesheet">
</head>
<body>

<!--Main Navigation-->
<header>
      <!--Navbar -->
      <nav class="mb-1 navbar navbar-expand-lg navbar-dark cyan">
        <a class="navbar-brand" href="http://localhost:90/miproyecto/index">EStiempo<img height="30px" src="http://localhost:90/miproyecto/img/sol_acua.png" style="margin-left: 10px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (isset($buscaCiudad)) { ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
          <ul class="navbar-nav ml-auto">
              <div class="titCiudad"><?= $_POST["buscaCiudad"] ?></div>
          </ul>
        </div>
        <?php }?>
         <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
          <ul class="navbar-nav ml-auto">
              <a class="navbar-brand" href="javascript:busquedaon()">Buscar ciudad</a>
          </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
          <ul class="navbar-nav ml-auto">
            <?php if (!isset($registra)) { ?>
              <a class="navbar-brand" href="http://localhost:90/miproyecto/control/registro">Registrarse</a>
            <?php }?>
            <?php if (!isset($loguea)) { ?>
              <a class="navbar-brand" href="http://localhost:90/miproyecto/control/login">Iniciar sesión</a>
            <?php }?>
          </ul>
        </div>
      </nav>
      <!--/.Navbar -->       
</header>

