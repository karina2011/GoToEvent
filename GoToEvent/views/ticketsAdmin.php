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


            <h3>Crear Ticket</h3>

            <form action="<?php echo BASE; ?>ticket/create" method="post">
                
                <button type="submit" class="btn btn-primary">Generar ticket</button>
            </form>
            
            <hr>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Tickets
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Numero</th>
                      <th>QR</th>
                      <th>ID</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Numero</th>
                      <th>QR</th>
                      <th>ID</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  
                  <?php if($list != false){ foreach ($list as $key => $ticket){ ?>
                    <tr>
                      <td><?php echo $ticket->getNumber(); ?></td>
                      <td class="text-center"><img src="<?php echo BASE . $ticket->getQr(); ?>" width='65' height='46'></td><!-- modificar models y agregar img-->
                      <td><?php echo $ticket->getId(); ?></td>
                      <td> <form class="text-center" action="<?php echo BASE; ?>ticket/delete" method="post">
                      <button type="submit" class="btn btn-danger" name="number" value="<?php echo $ticket->getNumber();?>"><i class="fas fa-trash"></i></button>
                      </form> </td>
                    </tr>
                    <?php }} ?> 
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