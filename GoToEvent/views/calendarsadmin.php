<?php 
use controllers\UserController as C_User;
use controllers\CalendarController as C_Calendar;
use controllers\EventController as C_Event;
use controllers\ArtistController as C_Artist;
use controllers\EventPlaceController as C_Event_place;
use controllers\EventSquareController as C_Event_square;

use models\User as M_User;

$userController = new C_User;
$user = $userController->checkSession();

$calendarController = new C_Calendar;
$list = $calendarController->readAll();

$eventController = new C_Event;
$listEvents = $eventController->readAll();

$artistController = new C_Artist;
$listArtists = $artistController->readAll();

$eventPlaceController = new C_Event_place;
$listEventPlaces = $eventPlaceController->readAll();

$eventSquareController = new C_Event_square;
$listEventSquares = $eventSquareController->readAll();

?>
<!DOCTYPE html>
<html lang="en">

    <?php include_once (VIEWS."headAdmin.php");?>

  <body id="page-top">

      <?php include_once (VIEWS."navAdmin.php");?>

    <div id="wrapper">
      <?php include_once (VIEWS."sidebarAdmin.php");?>

      <div id="content-wrapper">

        <div class="container-fluid">


            <h3>Crear calendario </h3>

            <form action="<?php echo BASE; ?>calendar/create" method="post">
                <div class="form-group">
                    <label for="date">Fecha:</label>
                    <input type="date" class="form-control" id="date" placeholder="Fecha" name="date">
                </div>


                <div class="form-group">
                    <label for="event">Evento</label>
                    <select class="custom-select"  name="event">
                      <?php  foreach ($listEvents as $key => $event) { ?>
                       <option value="<?php echo $event->getId(); ?>"><?php  echo $event->getTitle(); ?></option>
                       <?php } ?>      
                   </select>
                </div>

                <label >Artista/s (ARREGLAR ESTO )</label> 
                <?php foreach ($listArtists as $key => $artist) { ?>
                <div class="custom-control custom-checkbox ">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="artists[]" value="<?php echo $artist->getId(); ?>">
                        <label class="custom-control-label" for="customCheck1"><?php echo $artist->getName() . ' ' .  $artist->getLastName(); ?></label>         
                </div>
                <?php } ?>

                <div class="form-group">
                    <label for="eventPlaces">Lugar de evento</label>
                    <select class="custom-select"  name="eventPlaces">
                      <?php  foreach ($listEventPlaces as $key => $eventplace) { ?>
                       <option value="<?php echo $eventplace->getId(); ?>"><?php  echo $eventplace->getDescription(); ?></option>
                       <?php } ?>      
                   </select>
                </div>

                <div class="form-group">
                    <label for="eventSquares[]">Plazas de evento:</label>
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <?php foreach ($listEventSquares as $key => $eventsquare) { ?>
                        <input type="checkbox" aria-label="eventSquares" name="eventSquares[]" value="<?php echo $eventsquare->getId(); ?>">
                        <label for="eventSquares[]"><?php  echo $eventsquare->getSquareTypeDescription() . ' ' .  $eventsquare->getAvailableQuantity(); ?></label>
                        <?php } ?>
                      </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Crear calendario</button>
            </form>

            
            <hr>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> COMPLETAR ESTO CON CALENDARIO
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Cliente</th>
                      <th>Lineas de compra</th>
                      <th>Precio</th>
                      <th>ID</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Fecha</th>
                      <th>Cliente</th>
                      <th>Lineas de compra</th>
                      <th>Precio</th>
                      <th>ID</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($list as $key => $purchase){ ?>
                    <tr>
                      <td><?php echo $purchase->getDate(); ?></td>
                      <td><?php echo $purchase->getCustomerEmail(); ?></td>
                      <td><?php echo $purchase->getPurchaseLines(); ?></td>
                      <td><?php echo $purchase->getPrice(); ?></td>
                      <td><?php echo $purchase->getId(); ?></td>
                      <td> <form action="<?php echo BASE; ?>purchase/delete" method="post">
          <button type="submit" class="btn btn-danger" name="dni" value="<?php echo $purchase->getId();?>"><i class="fas fa-trash"></i></button>
          </form> </td>
                    </tr>
                    <?php } ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo BASE; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo BASE; ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo BASE; ?>assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo BASE; ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?php echo BASE; ?>assets/js/demo/chart-area-demo.js"></script>

  </body>

</html>
