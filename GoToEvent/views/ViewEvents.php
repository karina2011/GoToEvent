<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ver Eventos</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/1-col-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo BASE; ?>views/index">GoToEvent</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Eventos:
        <small></small>
      </h1>

      <!-- Project One -->
      <?php if (!empty($lista)){ foreach ($lista as $key => $event){ ?>
      
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php echo $event->getTitle(); ?></h3><!--Titulo del evento-->
          <p>Tipo de evento: <?php echo $event->getDescriptionCategory();  ?></p>

          <form action="<?php echo BASE; ?>Event/delete" method="post">
          <a class="btn btn-primary" href="#">Ver evento</a><!--cambiar esto a boton tambien-->
          <button name="title" type="submit" class="btn btn-danger" value="<?php echo $event->getTitle();?>"><i class="fas fa-trash"></i> </button>
          </form>

        </div>
      </div>
      <hr>
      <?php } } else { echo '<p>' ."NO HAY EVENTOS CARGADOS" .'</p>'; } ?>
      <div class="pagination justify-content-end">
      <button name="idEvent" type="submit" class="btn btn-success" title="agregar evento"><i class="fas fa-plus"></i></button>
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



<!-- // borrar esto
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Title</th>
		</tr>
	<?php while(!empty($lista)){ ?>
		<?php $event = array_pop($lista) ?>
		<tr>
			<td><?php echo $event->getTitle(); ?></td>
		</tr>
	<?php } ?>
	</table>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>Home/index">Volver al inicio</a>
	</div>
</body>
</html>
-->