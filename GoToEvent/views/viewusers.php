<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ver Categoria</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/1-col-portfolio.css" rel="stylesheet">
    <!-- Para los iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  </head>

  <body>

  <?php include_once (VIEWS."header.php");  ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Usuarios:
        <small></small>
      </h1>

      <!-- Project One -->
      <?php if (!empty($list)){  foreach ($list as $key => $user){  ?>
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php echo $user->getName(); ?></h3><!--Descripcion de la categoria-->

          <form action="<?php echo BASE; ?>User/delete" method="post">
          <a class="btn btn-primary" href="#">Ver categoria</a><!--cambiar esto a boton tambien-->
          <button name="description" type="submit" class="btn btn-danger" value="<?php echo $user->getEmail();?>"><i class="fas fa-trash"></i> </button>
          </form>

        </div>
      </div>
      <hr>
      <?php } } else { echo '<p>' ."NO HAY USUARIOS CARGADOS" .'</p>'; } ?>
      <div class="pagination justify-content-end">
      <button name="idEvent" type="submit" class="btn btn-success" title="agregar usuario"><i class="fas fa-plus"></i></button>
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

</html>
