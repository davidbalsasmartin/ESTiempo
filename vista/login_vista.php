<!--Main layout-->
<main class="mt-4">

<!--Main container-->
<div class="container">

    <!--Grid row-->
    <div class="row" style="margin-top: 100px">  

      <!-- Card -->
      <div class="card mitad">

        <div class="card-body">
          <form method="post" action="login">

          <h4 class="card-title"><a>Inicio de sesión</a></h4>

           <?php if ($comprobar == false) { ?> 
              <p class="error">Ha ocurrido un error </p>
            <?php } ?> 
         
          <!--Section: Live preview-->
      <section>

          <div class="md-form form-sm" style="width: 22rem;">
              <i class="fa fa-user prefix"></i>
              <input type="text" id="asdasd" name="user" class="form-control form-control-sm" required>
              <label for="form656">Usuario</label>
          </div>

          <div class="md-form form-sm" style="width: 22rem;">
              <i class="fa fa-eye-slash prefix"></i>
              <input type="password" id="aszfs" name="pass" class="form-control form-control-sm" required>
              <label for="form656">Contraseña</label>
          </div>

      </section>
      <!--Section: Live preview-->
          <button name="loguear" type="submit" class="btn btn-cyan">Aceptar</button>
        </form>
          
        </div>
      </div>

      <!-- Card -->
      <div class="imagen-log"></div>

    </div>
    <!--Grid row-->

</div>
<!--Main container-->
        
</main>
<!--Main layout-->