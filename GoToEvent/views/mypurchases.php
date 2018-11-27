<?php namespace views; ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mis compras</title>

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
      <h1 class="mt-4 mb-3">Mis compras
      </h1>
      <hr>

      <!--<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Pricing</li>
      </ol>-->
      <div class="row">
      <?php if(!empty($list)){ ?>
              <?php foreach ($list as $key => $purchase) { ?>
                <?php if(!empty($purchase->getPurchaseLines())){ ?>
                  <?php foreach ($purchase->getPurchaseLines() as $key => $purchase_line) { ?>
                      <div class="col-lg-4 mb-4">
                        <div class="card h-100">
                          <!-- hay que ver porque no me deja mostrar el titulo del evento, nose porque tira error REVISAR -->
                          <h3 class="card-header"><?php echo $purchase_line->getEventTitle(); ?></h3>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $purchase_line->getEventSquareDescription  (); ?></li>
                            <li class="list-group-item">Fecha: <?php echo $purchase->getDate(); ?></li>
                            <li class="list-group-item">Cantidad: <?php echo $purchase_line->getQuantity(); ?></li>
                            <li class="list-group-item">$<?php echo $purchase_line->getPrice(); ?> x entrada</li>
                            <li class="list-group-item">Total: $<?php echo $purchase_line->getTotalPrice(); ?></li>                  
                            <div class="card-body">
                                <div class="font-italic">Ticket:</div>
                                <div class="display-4">#<?php echo $purchase_line->getTicketNumber(); ?></div>
                            </div>
                            <?php echo BASE . $purchase_line->getQR(); ?>
                            <td class="text-center"><img src="<?php echo BASE . $purchase_line->getQR(); ?>" width='65' height='46'></td><!-- modificar models y agregar img-->
                          </ul>
                        </div>
                      </div>
                <?php } ?>
              <?php } ?>
      <?php }} else { ?>
              <h2>Aun no hiciste ninguna compra</h2>
      <?php } ?>

      </div>
      <!-- /.row -->
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
