<?php 
    namespace views;
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
    
	<title>GoToEvent</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet"> 

  <!-- for the footer so it always down -->
  <link href="<?php echo BASE; ?>assets/css/styles.css" rel="stylesheet"> 

    
</head>
<body style = "background: white;">

	<?php include_once (VIEWS."header.php");?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h2 class="my-4">Eventos por artista</h2>
          <hr>
            <form action="<?php echo BASE; ?>views/eventsByArtist" method="GET">
              <div class="form-group">
                <label for="category">Seleccione artista</label>
                <select name="artist" class="custom-select" required>
                    <option>Seleccione un artista</option>
                  <?php foreach ($listArtist as $key => $artist) { ?>
                      <option value="<?php echo $artist->getId();  ?>"><?php echo $artist->getName() . ' ' . $artist->getLastName(); ?></option>
                  <?php } ?>
				</select>
              </div>
              <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

        <?php if($calendarlist) {?>
        <h4 class="my-4">Eventos para: <?php echo $selectedArtist->getName() . ' ' . $selectedArtist->getLastName(); ?></h4>
        <?php } ?>

           <!-- row. -->         
          <div class="row my-4">
              <?php if($calendarlist) {?>
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
              <?php } else { echo '<h4> NO HAY EVENTOS PARA ESE ARTISTA</h4>'; }?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <br>
    <!-- /.container -->

    <!-- Footer -->
        <?php include(VIEWS. "footer.php");?>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>