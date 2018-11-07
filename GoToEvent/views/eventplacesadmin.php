<?php 
use controllers\UserController as C_User;
use controllers\EventPlaceController as C_Event_place;
use models\User as M_User;

$userController = new C_User;
$user = $userController->checkSession();

$eventPlaceController = new C_Event_place;
$list = $eventPlaceController->readAll();

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


            <h3>Crear lugar de evento</h3>

            <form action="<?php echo BASE; ?>eventPlace/create" method="post">
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" class="form-control" id="description" placeholder="Descripcion" name="description">
                </div>
                <div class="form-group">
                    <label for="capacity">Capacidad</label>
                    <input type="number" class="form-control" id="capacity" placeholder="Capacidad" name="capacity">
                </div>
                <button type="submit" class="btn btn-primary">Crear lugar de evento</button>
            </form>

            
            <hr>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Lugares de evento
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th>Capacidad</th>
                      <th>ID</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Descripcion</th>
                      <th>Capacidad</th>
                      <th>ID</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($list as $key => $eventPlace){ ?>
                    <tr>
                      <td><?php echo $eventPlace->getDescription(); ?></td>
                      <td><?php echo $eventPlace->getCapacity(); ?></td>
                      <td><?php echo $eventPlace->getId(); ?></td>
                      <td> <form class="text-center" action="<?php echo BASE; ?>eventPlace/delete" method="post">
          <button type="submit" class="btn btn-danger" name="dni" value="<?php echo $eventPlace->getDescription();?>"><i class="fas fa-trash"></i></button>
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
