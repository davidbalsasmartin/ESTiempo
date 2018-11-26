<body class="zoom1">

<!--Main layout-->
<main class="mt-4">

<!--Main container-->
<div class="container">
      <!--Grid row-->
    <div class="row">  
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <form action="anadir_evento" enctype="multipart/form-data" method="POST" autocomplete="off">

          <h4 class="card-title"><a>Añadir evento</a></h4>
          <?php if (isset($comprobar) && $comprobar == false) { ?>
            <p class="error">Ha ocurrido un error </p>
          <?php } else if (isset($comprobar) && $comprobar == true) { ?>
            <p class="error verde">Evento añadido con éxito </p>
          <?php } ?>
          <!--Section: Live preview-->
      <section>
          <div class="myselect23" style="width: 22rem;">

          <select required name="ciudad" class="browser-default custom-select" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;">
            <option selected disabled="true">Ciudad</option>
            <?php foreach($_SESSION['ciudades'] as $row): ?>
              <option><?= $row ?></option>
            <?php endforeach ?>
          </select>
        </div>

          <div class="md-form form-sm" style="width: 22rem;">
              <i class="fa fa-user prefix"></i>
              <input name="titul" required type="text" id="fm656" class="form-control form-control-sm" value="<?php $titulo ?>">
              <label for="form656">Título</label>
          </div>

          <div class="md-form form-sm" style="width: 18rem;">
              <i class="fa fa-calendar prefix"></i>
              <input name="fecha_inicio" required type="date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date("Y-m-d",strtotime("+ 183 days"))?>" id="fr56" class="form-control form-control-sm">
              <p class="letra_fecha">Inicio</p>
          </div>
          <div class="md-form form-sm" style="width: 18rem;">
              <i class="fa fa-calendar prefix"></i>
              <input name="fecha_fin" required type="date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date("Y-m-d",strtotime("+ 183 days"))?>" id="fr56" class="form-control form-control-sm">
              <p class="letra_fecha">Fin</p>
          </div>

          <div class="input-group mb-3">
            <div class="custom-file">
              <label class="custom-file-label" for="inputGroupFile01">Selecciona una imagen</label>

            <input type="file" required class="custom-file-input" accept="image/*" name="foto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            </div>
          </div>
      </section>
      <!--Section: Live preview-->
          <button type="submit" name="aniade" class="btn btn-cyan">Aceptar</button>
          </form>

        </div>
      </div>

      <!-- Card -->
      <div class="imagen-aneven"></div>

    </div>
    <!--Grid row-->

</div>
<!--Main container-->

</main>
<!--Main layout-->