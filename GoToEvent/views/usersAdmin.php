<?php 
use controllers\UserController as C_User;

use models\User as M_User;


$userController = new C_User;
$user = $userController->checkSession();

$list = $userController->readAll();

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


            <h3>Crear Usuario</h3>

            <form action="<?php echo BASE; ?>user/create" method="post">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" placeholder="Nombre" name="name">
                </div>
                <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Apellido" name="lastname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="number" class="form-control" id="dni" placeholder="DNI" name="dni">
                </div>
                <div class="form-group">
                    <label for="type">Tipo</label>
                    <select class="custom-select" id="inputGroupSelect01" name="type">
				     <option value="admin">Admin</option>
				     <option value="cliente">Cliente</option>
				    </select>
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <input type="pass" class="form-control" id="pass" placeholder="Contraseña" name="pass">
                </div>

                <button type="submit" class="btn btn-primary">Crear usuario</button>
            </form>
            
            <hr>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Usuarios
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Dni</th>
                      <th>Tipo</th>
                      <th>Contraseña</th>
                      <th>ID</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Dni</th>
                      <th>Tipo</th>
                      <th>Contraseña</th>
                      <th>ID</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($list as $key => $user){ ?>
                    <tr>
                      <td><?php echo $user->getName(); ?></td>
                      <td><?php echo $user->getLastName(); ?></td>
                      <td><?php echo $user->getEmail(); ?></td>
                      <td><?php echo $user->getDni(); ?></td>
                      <td><?php echo $user->getType(); ?></td>
                      <td><?php echo $user->getPass(); ?></td>
                      <td><?php echo $user->getId(); ?></td>
                      <td> <form class="text-center" action="<?php echo BASE; ?>user/delete" method="post">
          <button type="submit" class="btn btn-danger" name="dni" value="<?php echo $user->getEmail();?>"><i class="fas fa-trash"></i></button>
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