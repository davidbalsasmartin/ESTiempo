<div class="bodyIndex" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Gran_V%C3%ADa_%28Madrid%29_1.jpg/1024px-Gran_V%C3%ADa_%28Madrid%29_1.jpg');">

<body>

<!--Main layout-->
<main class="mt-4">
<!--Main container-->
<div class="container">
    <!--Grid row-->
    <div class="row">  
      <!-- Card -->
      <div class="card enMedio Mabajo">
        <div class="card-body arreg">
          <form method="post" action="viaje">
          <div class="modViajes">
          <h4 class="card-title"><a>Mi viaje</a></h4>

            <div class="myselect23" style="width: 22rem;">
              <select name="ciudad" class="browser-default custom-select" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;" required>
                <?php if (empty($_SESSION['viaje'])) { ?>
                  <option selected disabled="true"> Seleccionar</option>
                  <?php } foreach($_SESSION['ciudades'] as $row): 
                   if ($_SESSION['viaje']['ciudad'] != $row) { ?>
                    <option><?= $row ?></option>
                   <?php } else { ?>
                     <option selected><?= $row ?></option>
                  <?php } endforeach; ?>
                </select>
              </div>

                <div class="md-form form-sm" style="width: 17rem;">
	              <i class="fa fa-calendar prefix"></i>
	              <input type="date" name="fecha_ini" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date("Y-m-d",strtotime("+ 365 days"))?>" id="fr56" class="form-control form-control-sm" required value= <?php if (isset($_SESSION['viaje'])) { echo "'".$_SESSION['viaje']['fecha_ini']."'"; } ?>>
                <p class="letra_fecha segunda">Inicio</p>
	          	</div>

	          	<div class="md-form form-sm" style="width: 17rem;">
	              <i class="fa fa-calendar prefix"></i>
	              <input type="date" name="fecha_fin" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date("Y-m-d",strtotime("+ 365 days"))?>" id="fr56" class="form-control form-control-sm" required value= <?php if (isset($_SESSION['viaje'])) { echo "'".$_SESSION['viaje']['fecha_fin']."'"; } ?>>
                <p class="letra_fecha segunda">Fin</p>
	          	</div>

              <?php if (isset($_SESSION['viaje'])) { ?>
                    <button type="submit" name="mod_viaje" style="margin-left: 0px;" class="btn btn-cyan Bajar">Modificar</button>
                  </div>
                </form>
                <form method="post" action="viaje">
                <button type="submit" name="borrar" style="" class="btn Bajar aniadirviaje">Eliminar</button>
                </form>
              <?php } else { ?>
                <button type="submit" name="mod_viaje" style="" class="btn btn-cyan Bajar">Añadir</button>
              </div>
              <?php } ?>

        </div>

      </div>
      <!-- Card -->

    </div>
    <!--Grid row-->

</div>
<!--Main container-->