<?php
namespace views;
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
                <img class="d-block w-100" src="https://bombanoise.com/wp-content/uploads/2017/08/concert.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="https://cdn.tn.com.ar/sites/default/files/styles/1366x765/public/2017/11/17/1117_recital_felicidad_1280.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="http://chicasennewyork.com/wp-content/uploads/2016/01/2.jpg" alt="Third slide">
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

        <!--<div class="col-lg-13">
          <h2>Eventos</h2>
          <hr>
          <div class="row">
            <?php if($categoryList){ ?>
              <?php if($calendarlist) { ?>
                  <?php foreach ($categoryList as $key => $category) { ?>
                          <?php foreach ($calendarlist as $key => $calendar) { ?>
                                  <?php if($category->getDescription() == $calendar->getCategoryDescription()) { ?>
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
                          <?php } ?>
                    <?php } ?>
                  <?php } ?>

          </div>


        </div>-->
        <!-- /.col-lg-9 -->
        <div class="col-lg-13">
          <h2>Proximos Eventos </h2>
          <hr>
          <div class="row">
            <?php if($lastFiveCalendars){ ?>
                      <?php foreach ($lastFiveCalendars as $key => $calendar) { ?>
                              <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                  <a href="<?php echo BASE; ?>views/viewEvent?id_calendar=<?php echo $calendar->getId(); ?>"><img src="<?php echo BASE.IMG_EVENT.$calendar->getEventImg(); ?>" class="card-img-top" alt=""></a>
                                  <div class="card-body">
                                    <h4 class="card-title">
                                      <a href="<?php echo BASE; ?>views/viewEvent?id_calendar=<?php echo $calendar->getId(); ?>"><?php echo $calendar->getEventTitle(); ?></a>
                                    </h4>
                                    <p class="card-text"><?php echo $calendar->getCategoryDescription(); ?></p>
                                    <p class="card-text">Fecha: <?php echo $calendar->getDate(); ?></p>
                                  </div>
                                </div>
                              </div>
                      <?php } ?>
            <?php } ?>
          </div>
        </div>
        <?php if($categoryList){ ?>
              <?php foreach ($categoryList as $key => $category) { ?>
                <h2><?php echo $category->getDescription(); ?></h2>
                <hr>
                <div class="row">
                    <?php if($calendarlist) { ?>
                        <?php foreach ($calendarlist as $key => $calendar) { ?>
                              <?php if($category->getDescription() == $calendar->getCategoryDescription()) { ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                  <div class="card h-100">
                                    <a href="<?php echo BASE; ?>views/viewEvent?id_calendar=<?php echo $calendar->getId(); ?>"><img src="<?php echo BASE.IMG_EVENT.$calendar->getEventImg(); ?>" class="card-img-top" alt=""></a>
                                    <div class="card-body">
                                      <h4 class="card-title">
                                        <a href="<?php echo BASE; ?>views/viewEvent?id_calendar=<?php echo $calendar->getId(); ?>"><?php echo $calendar->getEventTitle(); ?></a>
                                      </h4>
                                      <p class="card-text"><?php echo $calendar->getCategoryDescription(); ?></p>
                                      <p class="card-text">Fecha: <?php echo $calendar->getDate(); ?></p>
                                    </div>
                                  </div>
                                </div>
                              <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
              <?php } ?>
        <?php } ?>

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
