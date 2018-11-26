<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
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
              <div class="http://localhost:90/miproyecto/control/titCiudad"><?= $buscaCiudad ?></div>
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
            <?php if (!isset($anade_even)) { ?> <a class="navbar-brand" href="http://localhost:90/miproyecto/control/anadir_evento"> <i class="fa fa-clock-o"></i> Añadir Evento</a><?php } ?>
            
              <?php if (!isset($mod_via)) { ?> <li><a class="navbar-brand" href="http://localhost:90/miproyecto/control/viaje"> <i class="fa fa-automobile"></i> Viaje</a></i> </a></li><?php } ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> Perfil </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                <?php if (!isset($modifica_user)) { ?> <a class="dropdown-item" href="http://localhost:90/miproyecto/control/modifica_usuario">Modificar datos</a> <?php } ?>
                <a class="dropdown-item" href="http://localhost:90/miproyecto/modelo/cierrasesion">Salir de sesión</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!--/.Navbar -->
</header>
<!--Main Navigation-->

