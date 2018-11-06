<?php 
use controllers\UserController as C_User;
use controllers\PurchaseController as C_Purchase;
use controllers\PurchaseLineController as C_Purchase_line;
use models\User as M_User;

$userController = new C_User;
$user = $userController->checkSession();
$listUser = $userController->readAll();

$purchaseController = new C_Purchase;
$list = $purchaseController->readAll();

$purchaseLineController = new C_Purchase_line;
$listPurchaseLine = $purchaseLineController->readAll();

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


            <h3>Crear Compra </h3>

            <form action="<?php echo BASE; ?>purchase/create" method="post">
                <div class="form-group">
                    <label for="email">Email de cliente: (Temporalmente, hay q comprobar que existe)</label>
                    <select class="custom-select"  name="userEmail">
                      <?php  foreach ($listUser as $key => $user) { ?>
                       <option value="<?php echo $user->getEmail(); ?>"><?php  echo $user->getEmail(); ?></option>
                       <?php } ?>      
                   </select>
                </div>
                <div class="form-group">
                    <label for="purchaseline">Linea de compra</label>
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <?php foreach ($listPurchaseLine as $key => $purchaseline) { ?>
                        <input type="checkbox" aria-label="linea de compra" name="purchaselines[]" value="<?php echo $purchase_line->getId(); ?>">
                        <label for="purchaselines[]"><?php echo $purchase_line->getEventSquareDescription() ?></label>
                        <?php } ?>
                      </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Crear compra</button>
            </form>

            
            <hr>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Compras
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
