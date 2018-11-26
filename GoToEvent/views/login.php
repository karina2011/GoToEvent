<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title> Login </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">

  <link href="<?php echo BASE; ?>assets/css/styles.css" rel="stylesheet">
  <!--https://startbootstrap.com/snippets/login/-->


</head>
<body >

<?php include_once (VIEWS."header.php");?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Inicia sesion</h5>
            <form class="form-signin" action="<?php echo BASE; ?>user/login" method='post'>
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                <label for="inputEmail">Email</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass"required>
                <label for="inputPassword">Contaseña</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar Sesion</button>
              <!--<button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Registrarse</button>-->
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-lg btn-outline-info btn-block text-uppercase" data-toggle="modal" data-target="#openModal">
                Registrarse
              </button>
            </form>
            <head></head>  

            <!-- Modal -->
                <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Crear usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo BASE; ?>user/create" method="post">
                            <div class="form-group">
                                  <label for="name">Nombre</label>
                                  <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
                              </div>
                              <div class="form-group">
                                  <label for="lastname">Apellido</label>
                                  <input type="text" class="form-control" id="lastname" placeholder="Apellido" name="lastname" required>
                              </div>
                              <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                              </div>
                              <div class="form-group">
                                  <label for="dni">DNI</label>
                                  <input type="number" class="form-control" id="dni" placeholder="DNI" name="dni" required>
                              </div>

                              <div class="form-group">
                                  <label for="pass">Contraseña</label>
                                  <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Crear usuario</button>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
                
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include_once (VIEWS."footer.php");?>
  
  <!-- Bootstrap core JavaScript -->
    <script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>