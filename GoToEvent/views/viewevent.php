<?php
use controllers\CalendarController as C_Calendar;
use controllers\EventSquareController as C_Event_square;

$calendarController = new C_Calendar;
$eventSquareController = new C_Event_square;

$calendarId = $_GET["id_calendar"];

$calendar = $calendarController->readById($calendarId);

$event_squares = $eventSquareController->readAllByCalendarId($calendar->getId());

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ver evento</title>
    <!-- https://startbootstrap.com/template-overviews/blog-post/-->

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">

    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

  </head>

  <body>

    <?php include_once (VIEWS."header.php");?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $calendar->getEventTitle(); ?></h1>

          <hr>

          <!-- Date/Time -->
          <p>Fecha: <?php echo $calendar->getDate(); ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo BASE.IMG_EVENT.$calendar->getEventImg(); ?>" alt="bocalaconchatumadre">

          <hr>

          <!-- Post Content -->
          <h3>Lugar de evento </h3>
          <p class="lead"><?php echo $calendar->getEventPlaceDescription(); ?></p>

          <hr>


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categoria</h5>
            <div class="card-body">
              <p><?php echo $calendar->getCategoryDescription(); ?></p>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Artistas</h5>
            <div class="card-body">
              <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <?php foreach ($calendar->getArtists() as $key => $artist) { ?>
                    <li>
                      <p><?php echo $artist['0']->getName() . ' ' . $artist['0']->getLastName(); ?></p>
                    </li>
                    <?php } ?>
                  </ul>
              </div>
            </div>
          </div>

          <div class="card my-4">
            <h5 class="card-header">Plazas de evento</h5>
            <div class="card-body">
              <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <?php if($event_squares != null){ ?>
                    <?php foreach ($event_squares as $key => $event_square) { ?>
                    <li>
                      <p>- <?php echo $event_square->getSquareTypeDescription(); ?>  precio: <?php echo $event_square->getPrice(); ?></p>
                    </li>
                    <?php }
                  } else {?>
                    <p>Este evento no tiene plazas disponibles </p>
                  <?php } ?>
                  </ul>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->
      <h3>Plazas de evento</h3>
      <?php if($event_squares != null){ ?>
      <form action="#" method="post">
        <?php foreach ($event_squares as $key => $event_square) { ?>
        <div class="form-group">
          <label for=""><?php echo $event_square->getSquareTypeDescription(); ?>-->Precio: $<?php echo $event_square->getPrice(); ?></label>
          <input type="number" name="event_square" value="" class="form-control" placeholder="Cantidad de entradas">
        </div>
      <?php } ?>
        <div class="form-group">
          <button type="button" name="button" class="btn btn-primary">Comprar</button>
        </div>
      </form>
    <?php } else { ?>
      <p>Este evento no tiene plazas disponibles</p>
    <?php } ?>
    </div>
    <!-- /.container -->

    <?php include(VIEWS. "footer.php");?>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
