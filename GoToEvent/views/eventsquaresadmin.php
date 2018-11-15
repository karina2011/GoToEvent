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


            <!--<h3>Crear Plazas de evento // ESTO YA NO SE USA ACA // se deja por si acaso</h3>

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

                <div class="form-group">
                    <label for="remainder">Remanente</label>
                    <input type="number" class="form-control" id="remainder" placeholder="Remanente" name="remainder">
                </div>

                <input type="hidden" name="$id_calendar" value="<?php echo $id_calendar; ?>">
                <button type="submit" class="btn btn-primary">Crear plaza de evento</button>
            </form>

            <hr> -->

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Plazas de evento
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tipo de plaza</th>
                      <th>Precio</th>
                      <th>Cantidad disponible</th>
                      <th>Remanente</th>
                      <th>Calendario</th>
                      <th>ID</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tipo de plaza</th>
                      <th>Precio</th>
                      <th>Cantidad disponible</th>
                      <th>Remanente</th>
                      <th>Calendario</th>
                      <th>ID</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php if($list != false) { ?>
                  <?php foreach ($list as $key => $eventSquare){ ?>
                    <tr>
                      <td><?php echo $eventSquare->getSquareTypeDescription(); ?></td>
                      <td><?php echo $eventSquare->getPrice(); ?></td>
                      <td><?php echo $eventSquare->getAvailableQuantity(); ?></td>
                      <td><?php echo $eventSquare->getRemainder(); ?></td>
                      <td>Evento: <?php echo $eventSquare->getCalendarEvent() . '<br>Fecha: ' . $eventSquare->getCalendarDate(); ?></td>
                      <td><?php echo $eventSquare->getId(); ?></td>
                      <td> <form class="text-center" action="<?php echo BASE; ?>eventsquare/delete" method="post">
          <button type="submit" class="btn btn-danger" name="dni" value="<?php echo $eventSquare->getId();?>"><i class="fas fa-trash"></i></button>
          </form> </td>
                    </tr>
                    <?php } }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <!--<footer class="sticky-footer">
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

  </body>

</html>
