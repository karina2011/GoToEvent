<?php 
use controllers\UserController as C_User;
use controllers\ArtistController as C_Artist;
use models\User as M_User;

$userController = new C_User;
$user = $userController->checkSession();

$artistController = new C_Artist;
$list = $artistController->readAll();

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


            <h3>Crear artista</h3>

            <form action="<?php echo BASE; ?>Artist/create" method="post">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Apellido" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="number" class="form-control" id="dni" placeholder="DNI" name="dni" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear artista</button>
            </form>

            
            <hr>

          <!-- DataTables -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Artistas
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>DNI</th>
                      <th>ID</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>DNI</th>
                      <th>ID</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php if($list != false) { ?>
                  <?php foreach ($list as $key => $artist){ ?>
                    <tr>
                      <td><?php echo $artist->getName(); ?></td>
                      <td><?php echo $artist->getLastName(); ?></td>
                      <td><?php echo $artist->getDni(); ?></td>
                      <td><?php echo $artist->getId(); ?></td>
                      <td> <form class="text-center" action="<?php echo BASE; ?>Artist/delete" method="post">
          <button type="submit" class="btn btn-danger" name="dni" value="<?php echo $artist->getDni();?>"><i class="fas fa-trash"></i></button>
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
