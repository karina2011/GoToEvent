<?php
namespace views;
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
                    <input type="date" class="form-control" id="date" placeholder="Fecha" name="date" required>
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
                <?php $cont=0; foreach ($listArtists as $key => $artist) { $cont++;?>
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
                  <?php if($list != false) { ?>
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
                  <?php } }?>
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
        <!--DA PROBLEMAS CON LOS ALERT<footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>-->
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
