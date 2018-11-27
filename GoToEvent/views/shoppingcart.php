<?php namespace views; ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carrito de comrpas</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">

    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!--navbar-->
    <?php include_once (VIEWS."header.php");?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Carrito de compras
      </h1>
      <hr>

      <div class="row">
      <?php if(!empty($purchasesLineList)){ ?>
          <?php $contador = -1; ?>
              <?php foreach ($purchasesLineList as $key => $purchase_line) { ?>
                      <?php $contador++; ?>
                      <div class="col-lg-4 mb-4">
                        <div class="card h-100">
                          <h3 class="card-header"><?php echo $purchase_line->getEventTitle(); ?></h3>
                          <ul class="list-group list-group-flush">
                          <li class="list-group-item"><?php echo $purchase_line->getEventSquareDescription  (); ?></li>
                            <li class="list-group-item">Cantidad: <?php echo $purchase_line->getQuantity(); ?></li>
                            <li class="list-group-item">$<?php echo $purchase_line->getPrice(); ?> x entrada</li>
                            <div class="card-body">
                              <div class="display-4">$<?php echo $purchase_line->getTotalPrice(); ?></div>
                              <div class="font-italic">total</div>
                            </div>
                            <li class="list-group-item">
                              <a href="<?php echo BASE ?>purchaseline/deleteLine?posicion=<?php echo $contador; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </li>
                          </ul>
                        </div>
                        <div class="">
                          <br>
                          <button type="button" class="btn btn-primary"> <a href="<?php echo BASE ?>purchase/endPurhcase" style="text-decoration: none; color: white;">Finalizar compra</a> </button>
                        </div>
                      </div>

              <?php } ?>
      <?php } else { ?>
              <div class="col-lg-4">
                <h2>No hay compras en el carrito</h2>
              </div>
      <?php } ?>
      <!-- Content Row -->

      </div>
      <!-- /.row -->

      <br>
    </div>

    <!-- /.container -->

    <!-- Footer -->
    <?php // include(VIEWS. "footer.php");?>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
