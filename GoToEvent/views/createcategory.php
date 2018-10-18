<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">

</head>
<body>
<form action="<?php echo BASE; ?>Category/create" method="post">
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Descripcion: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description" placeholder="description" name="description">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>