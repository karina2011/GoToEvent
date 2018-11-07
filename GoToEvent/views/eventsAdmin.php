<?php
use controllers\UserController as C_User;
use controllers\EventController as C_Event;
use models\User as M_User;

$userController = new C_User;
$user = $userController->checkSession();

$eventController = new C_Event;
$list = $eventController->readAll();

use daos\daodb\CategoryDao as D_Category;

$daocategory = D_Category::getInstance();

$listCategory = $daocategory->readAll();
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


            <h3>Crear Evento</h3>

            <form action="<?php echo BASE; ?>event/create" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" id="title" placeholder="Titulo" name="title">
                </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <select name="id_category">
					<?php foreach ($listCategory as $key => $category) { ?>
							         <option value="<?php echo $category->getId();  ?>"><?php echo $category->getDescription(); ?></option>
					<?php } ?>
				            </select>
                </div>
                <div class="form-group">
                  <label>Cargar imagen: </label>
                  <input type="file" name="eventimg" value="eventimg">
                </div>
                <button type="submit" class="btn btn-primary">Crear evento</button>
            </form>


            <hr>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Eventos
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Titulo</th>
                      <th>Categoria</th>
                      <th>img</th>
                      <th>ID</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Titulo</th>
                      <th>Categoria</th>
                      <th>img</th>
                      <th>ID</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($list as $key => $event){ ?>
                    <tr>
                      <td><?php echo $event->getTitle(); ?></td>
                      <td><?php echo $event->getCategoryDescription(); ?></td>
                      <td><?php ?>echo $event->getImg();</td><!-- modificar models y agregar img-->
                      <td><?php echo $event->getId(); ?></td>
                      <td> <form action="<?php echo BASE; ?>event/delete" method="post">
          <button type="submit" class="btn btn-danger" name="dni" value="<?php echo $event->getTitle();?>"><i class="fas fa-trash"></i></button>
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
