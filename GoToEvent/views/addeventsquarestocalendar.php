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

            <h3>Calendario: </h3>

            <b>-Evento:</b><p> <?php echo $calendar->getEventTitle() ?></p>
            <b>-Fecha:</b><p> <?php echo $calendar->getDate() ?></p>
            <b>-Lugar:</b><p> <?php echo $calendar->getEventPlaceDescription() ?></p>
            <b>-Plazas de evento:</b>
            <?php if ($listEventSquares == false) {
                    //  HACER ESTO CON TODOS LOS FOREACH DE TODAS LAS VISTAS EN ADMIN
                      echo "<br>Este calendario no tiene plazas de eventos cargadas. Cargue porfavor<br>";}
                  else { ?>
                <?php foreach ($listEventSquares as $key => $eventsquare) { ?>
                        <p><?php  echo $eventsquare->getSquareTypeDescription() ?>-->Cantidad: <?php echo $eventsquare->getAvailableQuantity() ?> </p>
                        <?php } }?>

                        <br>

                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#openModal2">
                    Crear tipo de plaza
                  </button> <!-- para ventana emergente/modal/flotante/comosellame-->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#openModal">
                Agregar plaza de evento
                </button> <!-- para ventana emergente/modal/flotante/comosellame-->

              <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Crear plazas de evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo BASE; ?>eventsquare/create" method="post">
                          <div class="form-group">
                                <label for="squaretype">Tipo de plaza:</label>
                                <select class="custom-select"  name="squaretype">
                                  <?php  foreach ($listSquareType as $key => $squaretype) { ?>
                                  <option value="<?php echo $squaretype->getId(); ?>"><?php  echo $squaretype->getDescription(); ?></option>
                                  <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" class="form-control" id="price" placeholder="Precio" name="price">
                            </div>

                            <div class="form-group">
                                <label for="available_quantity">Cantidad disponible</label>
                                <input type="number" class="form-control" id="available_quantity" placeholder="Cantidad" name="available_quantity">
                            </div>

                            <input type="hidden" name="id_calendar" value="<?php echo $calendar->getId(); ?>">
                            <button type="submit" class="btn btn-primary">Crear plaza de evento</button>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="openModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Crear tipo de plaza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo BASE; ?>squaretype/newSquareType" method="post">
                            <div class="form-group">
                                <label for="descrption">Descripcion de tipo de plaza:</label>
                                <input type="text" class="form-control" id="description" placeholder="Descripcion" name="description" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear tipo de plaza</button>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>

            <br>
            <br>

            <a href="<?php echo BASE; ?>views/calendarsadmin" class="btn btn-primary">Finalizar</a>

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
