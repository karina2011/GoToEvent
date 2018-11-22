<?php namespace views; ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

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

      <!--<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Pricing</li>
      </ol>-->
      <div class="row">
      <?php if(isset($purchasesLineList)){ ?>
              <?php foreach ($purchasesLineList as $key => $purchase_line) { ?>
                      <?php echo "<pre>";
                            //var_dump($purchase_line->getQuantity());
                            echo "</pre>"; ?>
                      <div class="col-lg-4 mb-4">
                        <div class="card h-100">
                          <!-- hay que ver porque no me deja mostrar el titulo del evento, nose porque tira error REVISAR -->
                          <h3 class="card-header"><?php //echo $purchase_line->getEventTitle(); ?></h3>
                          <div class="card-body">
                            <div class="display-4">$<?php echo $purchase_line->getTotalPrice(); ?></div>
                            <div class="font-italic">total</div>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cantidad: <?php echo $purchase_line->getQuantity(); ?></li>
                            <li class="list-group-item">$<?php echo $purchase_line->getPrice(); ?> x entrada</li>
                            <li class="list-group-item">Tipo: <?php echo $purchase_line->getEventSquareDescription  (); ?></li>
                            <li class="list-group-item">
                              <a href="#" class="btn btn-primary">Cancelar</a>
                            </li>
                          </ul>
                        </div>
                      </div>
              <?php } ?>
      <?php } else { ?>
              <h2>No hay compras en el carrito</h2>
      <?php } ?>
      <!-- Content Row -->


        <!--<div class="col-lg-4 mb-4">
          <div class="card card-outline-primary h-100">
            <h3 class="card-header bg-primary text-white">Plus</h3>
            <div class="card-body">
              <div class="display-4">$39.99</div>
              <div class="font-italic">per month</div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">
                <a href="#" class="btn btn-primary">Sign Up!</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h3 class="card-header">Ultra</h3>
            <div class="card-body">
              <div class="display-4">$159.99</div>
              <div class="font-italic">per month</div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">
                <a href="#" class="btn btn-primary">Sign Up!</a>
              </li>
            </ul>
          </div>
        </div> -->

      </div>
      <!-- /.row -->
      <div class="">
        <button type="button" class="btn btn-primary"> <a href="<?php echo BASE ?>purchase/endPurhcase" style="text-decoration: none; color: white;">Finalizar compra</a> </button>
      </div>
      <br>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include(VIEWS. "footer.php");?>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
