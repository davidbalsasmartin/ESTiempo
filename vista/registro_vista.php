<!--Main layout-->
<main class="mt-4">

<!--Main container-->
<div class="container">

    <!--Grid row-->
    <div class="row" style="margin-top: 46px">  

      <!-- Card -->
      <div class="card mitad">

        <div class="card-body">

          <form method="post" action="registro" autocomplete="off">

          <h4 class="card-title"><a>Registrarse</a></h4>

            <?php if (isset($comprobar) && $comprobar == false) { ?>
              <p class="error">Ha ocurrido un error </p>
            <?php } ?>

                <div class="md-form form-sm arregloReg">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" name="user" id="123" class="form-control form-control-sm" required>
                    <label for="form65">Usuario</label>
                </div>

                <div class="md-form form-sm arregloReg">
                    <i class="fa fa-eye-slash prefix"></i>
                    <input type="password" name="pass" id="asda" class="form-control form-control-sm" required>
                    <label for="form56">Contraseña</label>
                </div>

                <div class="md-form form-sm arregloReg">
                    <i class="fa fa-eye-slash prefix"></i>
                    <input type="password" name="pass2" id="asdadwew" class="form-control form-control-sm" required>
                    <label for="form56">Repetir contraseña</label>
                </div>

                <div class="md-form form-sm arregloReg">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" name="correo" id="ct434g" class="form-control form-control-sm" required>
                    <label for="form66">Correo electrónico</label>
                </div>

                <div class="myselect23" style="width: 22rem;">
              <select required name="ciudad" class="browser-default custom-select" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;">
                <option selected disabled="true">Ciudad de residencia</option>
                <?php foreach($result as $row): ?>
                  <option><?=$row['ciudad']?></option>
                <?php endforeach ?>
              </select>
            </div>
            
            <button type="submit" name="registra" style="margin-top: 34px;" class="btn btn-cyan but">Aceptar</button>

          </form>

        </div>

      </div>
      <!-- Card -->
      <div class="imagen-reg"></div>

    </div>
    <!--Grid row-->

</div>
<!--Main container-->
        
</main>
<!--Main layout-->