<?php
use models\Calendar as M_Calendar;
use controllers\CalendarController as C_Calendar;

$calendarController = new C_Calendar();

$calendarlist = $calendarController->readAll();

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GoToEvent</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">

    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

  </head>

  <body>

    <?php include_once (VIEWS."header.php");?>
    <div id="slider" class="carousel slide mb-5" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slider" data-slide-to="0" class="active"></li>
              <li data-target="#slider" data-slide-to="1"></li>
              <li data-target="#slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://www.masquenegocio.com/wp-content/uploads/2018/03/evento-concierto-874x492.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="https://www.masquenegocio.com/wp-content/uploads/2018/03/evento-concierto-874x492.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
        <!-- comentado para que no ocupe espacio en inicio, lo dejo de referencia nada mas. (borrar mas adelante)
          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
          </div>-->
          <!-- Opciones artistas y eventos están aca de prueba, despues se debe pasar a su respectiva vista-->


          <!--<h2 class="my-4"> Linea compra</h2>
          <div class="list-group">
            <a href="<?php echo BASE; ?>Views/viewCreatePurchaseLine" class="list-group-item">Crear linea Compra</a>
            <a href="<?php echo BASE; ?>PurchaseLine/readAll" class="list-group-item">Ver linea Compras</a>
          </div>-->


        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-13">

          <div class="row">
            <?php if($calendarlist) { ?>
                    <?php foreach ($calendarlist as $key => $calendar) { ?>
                              <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                  <a href="<?php echo BASE; ?>views/viewEvent?id_calendar=<?php echo $calendar->getId(); ?>"><img src="<?php echo BASE.IMG_EVENT.$calendar->getEventImg(); ?>" class="card-img-top" alt=""></a>
                                  <div class="card-body">
                                    <h4 class="card-title">
                                      <a href="<?php echo BASE; ?>views/viewEvent?id_calendar=<?php echo $calendar->getId(); ?>"><?php echo $calendar->getEventTitle(); ?></a>
                                    </h4>
                                    <p class="card-text"><?php echo $calendar->getCategoryDescription(); ?></p>
                                  </div>
                                </div>
                              </div>
                <?php } ?>
              <?php } ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Two</a>
                  </h4>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
              </div>
            </div>



          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include(VIEWS. "footer.php");?>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
