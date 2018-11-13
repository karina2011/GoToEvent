<?php
use controllers\UserController as C_User;
use controllers\CalendarController as C_Calendar;
use controllers\EventController as C_Event;
use controllers\ArtistController as C_Artist;
use controllers\EventPlaceController as C_Event_place;
use controllers\EventSquareController as C_Event_square;
use controllers\SquareTypeController as C_Square_type;
use daos\daodb\CalendarDao as D_Calendar;

use models\User as M_User;

$daoCalendar = D_Calendar::getInstance();

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

$calendarId = $calendarController->generateId(); // devuelve el id que va a usar el calendario a crear

$eventSquareController = new C_Event_square;
$listEventSquares = $eventSquareController->readAllByCalendarId($calendarId); // traer solo los eventsquares que correspondan al id calendario q se va a crear

$squareTypeController = new C_Square_type;
$listSquareType = $squareTypeController->readAll();

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
                      <option value="0">Seleccione un evento☺</option>
                      <?php  foreach ($listEvents as $key => $event) { ?>
                       <option value="<?php echo $event->getId(); ?>"><?php  echo $event->getTitle(); ?></option>
                       <?php } ?>
                   </select>
                </div>

                <label >Artista/s</label>
                <!-- Allan lo solucione agregando el id del input con el id del artista y el for de label con el mismo id del artista -->
                <?php foreach ($listArtists as $key => $artist) { ?>
                <div class="custom-control custom-checkbox ">
                        <input type="checkbox" class="custom-control-input" id="<?php echo $artist->getDni(); ?>" name="artists[]" value="<?php echo $artist->getId(); ?>">
                        <label class="custom-control-label" for="<?php echo $artist->getDni(); ?>" ><?php echo $artist->getName() . ' ' .  $artist->getLastName(). " " . $artist->getId(); ?></label>
                </div>
                <?php } ?>

                <div class="form-group">
                    <label for="eventPlaces">Lugar de evento</label>
                    <select class="custom-select"  name="eventPlaces">
                      <option value="0">Seleccione un lugar de evento</option>
                      <?php  foreach ($listEventPlaces as $key => $eventplace) { ?>
                       <option value="<?php echo $eventplace->getId(); ?>" id="eventplace"><?php  echo $eventplace->getDescription(); ?></option>
                       <?php } ?>
                   </select>
                </div>


                <button type="submit" class="btn btn-primary">Crear calendario</button>
            </form>

            <br>

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
                      <th>Evento</th>
                      <th>Fecha</th>
                      <th>Lugar del evento</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($list as $key => $calendar){   ?>
                    <tr>
                      <td><?php echo $calendar->getEventTitle(); ?></td>
                      <td><?php echo $calendar->getDate(); ?></td>
                      <td><?php echo $calendar->getEventPlaceDescription(); ?></td>
                      <td>
                          <form class="text-center" action="<?php echo BASE; ?>calendar/delete" method="post">
                            <button type="submit" class="btn btn-danger" name="id" value="<?php echo $calendar->getId();?>"><i class="fas fa-trash"></i></button>
                          </form>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Evento</th>
                      <th>Fecha</th>
                      <th>Lugar del evento</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </tfoot>

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


  	<script src="<?php echo BASE; ?>assets/ajax.js"></script>

  </body>

</html>
