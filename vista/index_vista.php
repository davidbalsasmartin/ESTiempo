<body>
<!--Main layout-->
<main class="mt-4">

<div class="bodyIndex" style="background-image: url(<?= $ciudadAhora['link']; ?>);">
  
</div>

<!--Main container-->
<div class="container">

  <div class="centrarFore">

    <div class="card actualidad transp">

        <div class="card-body">

                  <div class="divideEven uno">
                    <span class="tituloEven"> Tiempo </span><br/>
                    <img src="<?= $ciudadAhora['icono']; ?>">
                  </div>
                  <div class="divideEven dos">
                    <span class="tituloEven"> Precipitaciones </span><br/>
                    <span class="desUno"><?= $ciudadAhora['precidesc']; ?></span>
                  </div>
                  <div class="divideEven tres">
                    <span class="tituloEven"> Viento </span><br/>
                    <span class="desDos"><?= $ciudadAhora['viento']; ?> <span class="letraPeque">km/h  <?= $ciudadAhora['pviento']; ?></span>
                  </div>
                  <div class="divideEven cuatro">
                    <span class="tituloEven"> Humedad </span><br/>
                    <span class="desTres"><?= $ciudadAhora['hume']; ?> <span class="letraPeque">%</span></span>
                  </div>
                  <div class="divideEven cinco">
                    <span class="tituloEven"> Temperatura </span><br/>
                    <span class="desCuatro"><?= $ciudadAhora['temp']; ?> <span class="letraPeque">ºC</span></span>
                  </div>
        </div>
      </div>

      <!-- Card -->
      <div class="card forecast transp">

        <div class="card-body">

      <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Hoy</th>
                  <?php for ($e = 1;  $e < 7; $e++ ) {?>
                    <th scope="col"><?= strftime("%A",strtotime("+".$e." days -1 hours")); ?></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Tiempo</th>
                  <?php foreach($ciudadDias as $row): ?>
                    <td><img src="<?= $row['icono']; ?>"></td>
                  <?php endforeach ?>
                </tr>
                <tr>
                  <th scope="row">Precipitaciones</th>
                  <?php foreach($ciudadDias as $row): ?>
                    <td><?= $row['precidesc']; ?> <br/> <?= $row['preciprob']; ?> <span class="letraPeque">%</span></td>
                  <?php endforeach ?>
                </tr>
                <tr>
                  <th scope="row">Viento</th>
                  <?php foreach($ciudadDias as $row): ?>
                    <td><?= $row['viento']; ?> <span class="letraPeque">km/h <br/> <?= $row['pviento']; ?></td>
                  <?php endforeach ?>
                </tr>
                <tr>
                  <th scope="row">Humedad</th>
                  <?php foreach($ciudadDias as $row): ?>
                    <td><?= $row['hume']; ?> <span class="letraPeque">%</span></td>
                  <?php endforeach ?>
                </tr>
                <tr>
                  <th scope="row">Temperatura</th>
                  <?php foreach($ciudadDias as $row): ?>
                     <td><?= $row['temp']; ?> <span class="letraPeque">ºC</span></td>
                  <?php endforeach ?>
                </tr>
              </tbody>
            </table>

        </div>
      </div>

<?php if (isset($eventos)) { ?>

       <div class=" card cajaEventos transp">
        <!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <?php $i = 0; foreach($eventos as $row):
     if ($i == 0) {?><div class="carousel-item active"><?php } else { ?> <div class="carousel-item"> <?php }  $i++; ?>
    
      <img class="w-100" src="img/fotos_eventos/<?= $row['foto']; ?>">
      <p class="textoCentrado"><?= $row['nombre']; ?>&nbsp;<?php if ($row['validado'] == 'si') {
       ?><i class="miAzul fa fa-check-square"></i> <?php } ?> </p>
      <p  class="fechaCarr"><?= $row['fecha_inicio']; ?> - <?= $row['fecha_fin']; ?> &nbsp;</p>
    </div>
    <?php endforeach ?>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Before</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
</div>
<?php } ?>

<?php if(isset($restaDias)) { ?>
<div class="card transp cuentaDias miNaranja">  Quedan <?= $restaDias ?> días para el viaje a <?= $_SESSION['viaje']['ciudad'] ?> </div>
<?php } else if (isset($_SESSION['viaje'])) { ?>
<div class="card transp cuentaDias miVerde">  ¡Es el viaje a <?= $_SESSION['viaje']['ciudad'] ?>! </div>
<?php } ?>

       <?php if (!isset($eliminaCiu) && (isset($ciu1) || isset($ciu2) || isset($ciu3))) { ?>
     </div>
          <div class="ciudades">
           <?php if (isset($ciu1)) { ?>
            <div class="ciuAct">
              <p style="margin-bottom: 0; font-weight: 450;"><?= $_SESSION['usuario']->ciudad1 ?></p>
              <img src="<?= $ciu1['icono']; ?>">
              <?= $ciu1['temp']; ?> ºC
            </div>
            <div class="linea"></div>
            <?php } ?>

            <?php if (isset($ciu2)) { ?>
            <div class="ciuAct">
              <p style="margin-bottom: 0; font-weight: 450;"><?=  $_SESSION['usuario']->ciudad2 ?></p>
              <img src="<?= $ciu2['icono']; ?>">
              <?= $ciu2['temp']; ?> ºC
            </div>
            <div class="linea"></div>
            <?php } ?>

            <?php if (isset($ciu3)) { ?>
            <div class="ciuAct">
              <p style="margin-bottom: 0; font-weight: 450;"><?= $_SESSION['usuario']->ciudad3 ?></p>
              <img src="<?= $ciu3['icono']; ?>">
              <?= $ciu3['temp']; ?> ºC
            </div>
            <?php } ?>
          </div>
        <?php } ?>

</div>
<!--Main container-->
        
</main>
<!--Main layout-->

