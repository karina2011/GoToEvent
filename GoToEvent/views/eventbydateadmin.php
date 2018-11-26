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
          <div class="container">
            <div class="row">
                      <div class="col-lg-3">
                        <h2 class="my-4">Total de ventas por fechas</h2>
                        <hr>
                          <form action="<?php echo BASE; ?>views/eventbydateadmin" method="GET">
                            <div class="form-group">
                              <label for="date">Ingrese fecha</label>
                              <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                          </form>
                      </div>
                      <div class="col-lg-9">

                          <?php if($list) {?>
                          <h4 class="my-4">Dia: <?php if(isset($_GET['date'])){ echo $_GET["date"]; } ?></h4>
                          <?php } ?>
                          <div class="row my-4">
                                     <label for="date"><h4>Total vendido: $<?php echo $totalevent; ?></h4></label>

                          </div>
                      </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
                      <div class="col-lg-3">
                        <h2 class="my-4">  Total de ventas por Categoria</h2>
                        <hr>
                          <form action="<?php echo BASE; ?>views/eventbydateadmin" method="GET">
                            <div class="form-group">
                              <label for="category">  Seleccione la categoria</label>
                              <select name="category" class="custom-select" required>
                              <option>Seleccione una categoria</option>
                                <?php foreach ($listCategory as $key => $category) { ?>
                                <option value="<?php echo $category->getId();  ?>"><?php echo $category->getDescription(); ?></option>
                              <?php } ?>
				                      </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                          </form>
                      </div>
                      <div class="col-lg-9">

                          <?php if($list) {?>
                                      <h4 class="my-4"> <?php if(isset($_GET['date'])){
                                                           echo $_GET["date"];?>Dia:
                                                           <?php }
                                                      else if(isset($_GET['category'])){
                                                    
                                                        ?>Categoria: <?php $oneCategory=$this->categoryController->readById($_GET['category']);
                                                                            echo $oneCategory->getDescription();
                                                      } ?></h4>
                          <?php } ?>
                          <div class="row my-4">
                                     <label for="date"><h4>Total vendido: $<?php echo $totaleventC; ?></h4></label>

                          </div>
                      </div>
                      </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <!-- SACADO PORQ DA PROBLEMAS CON LOS ALERT<footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2018</span>
          </div>
        </div>
      </footer>

    </div>-->
    <!-- /.content-wrapper -->


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
