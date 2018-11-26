<!--Main layout-->
<main class="mt-4">

<!--Main container-->
<div class="container bajar">
         
      <!--Grid row-->
    <div class="row">  

      <!-- Card -->
      <div class="card centrar">

        <div class="card-body">

          <h4 class="card-title"><a>Modificar datos de perfil</a></h4>
         
          <!--Section: Live preview-->
      <section class="eaea">
        <form action="modifica_usuario" method="POST" autocomplete="off">
        <div class="contieneBloque">
          
            <div class="md-form form-sm arregloReg">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" name="user" id="123" class="form-control form-control-sm" required value= <?= $_SESSION['usuario']->usuario ?>>
                    <label for="form65">Usuario</label>
                </div>

                <div class="md-form form-sm arregloReg">
                    <i class="fa fa-eye-slash prefix"></i>
                    <input type="password" name="pass" id="asda" class="form-control form-control-sm" required>
                    <label for="form56">Contraseña</label>
                </div>

                <div class="md-form form-sm arregloReg">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" name="correo" id="ct434g" class="form-control form-control-sm" required value= <?= $_SESSION['usuario']->correo ?>>
                    <label for="form66">Correo electrónico</label>
                </div>
                <button type="submit" name="moduser" class="btn btn-cyan">Aceptar</button>
              </div>

                <div class="contieneBloque segundoCB">
                <span class="modifica">Residencia</span>
          <div class="myselect1" style="width: 22rem;">
            <?php if (isset($mod_user) && $mod_user == false) { ?>
              <p class="error ses">Ha ocurrido un error </p>
            <?php } ?>
          <select name="ciuR" class="browser-default custom-select" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;" required>
            <?php foreach($_SESSION['ciudades'] as $row): 
             if ($_SESSION['usuario']->ciudad != $row) { ?>
              <option><?= $row ?></option>
             <?php } else { ?>
               <option selected><?= $_SESSION['usuario']->ciudad ?></option>
            <?php } endforeach; ?>
          </select>
        </div>
        <span class="modifica mod_ciudad1">Ciudad 1</span>
        <div class="myselect2" style="width: 22rem;">
          <select name="ciu1" class="browser-default custom-select" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;">
           <?php if ($_SESSION['usuario']->ciudad1 == null) { ?>
                <option selected disabled="true"> Seleccionar</option>
             <?php } else {  ?>
                <option>Eliminar</option>
              <?php } ?>
            <?php foreach($_SESSION['ciudades'] as $row1): 
             if ($_SESSION['usuario']->ciudad1 != $row1) { ?>
              <option><?= $row1 ?></option>
              <?php } else { ?>
                <option selected><?= $row1 ?></option>
            <?php } endforeach; ?>
          </select>
        </div>
        <span class="modifica mod_ciudad2">Ciudad 2</span>
        <div class="myselect3" style="width: 22rem;">
          <select name="ciu2" class="browser-default custom-select" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;">
            <?php if ($_SESSION['usuario']->ciudad2 == null) { ?>
                <option selected disabled="true"> Seleccionar</option>
             <?php } else {  ?>
                <option>Eliminar</option>
              <?php } ?>
            <?php foreach($_SESSION['ciudades'] as $row2): 
             if ($_SESSION['usuario']->ciudad2 != $row2) { ?>
              <option><?= $row2 ?></option>
              <?php } else { ?>
                <option selected><?= $row2 ?></option>
            <?php } endforeach; ?>
          </select>
        </div>
        <span class="modifica mod_ciudad3">Ciudad 3</span>
        <div class="myselect4" style="width: 22rem;">
          <select name="ciu3" class="browser-default custom-select" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;">
            <?php if ($_SESSION['usuario']->ciudad3 == null) { ?>
                <option selected disabled="true"> Seleccionar</option>
             <?php } else {  ?>
                <option>Eliminar</option>
              <?php } ?>
            <?php foreach($_SESSION['ciudades'] as $row3): 
             if ($_SESSION['usuario']->ciudad3 != $row3) { ?>
              <option><?= $row3 ?></option>
              <?php } else { ?>
                <option selected><?= $row3 ?></option>
            <?php } endforeach; ?>
          </select>
        </div>
      </div>
    </form>
      </section>
      <!--Section: Live preview-->

        </div>
      </div>
    </div>
    <!--Grid row-->

</div>
<!--Main container-->
        
</main>
<!--Main layout-->