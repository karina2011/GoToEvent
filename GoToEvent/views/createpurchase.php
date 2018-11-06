<?php 
use daos\daodb\PurchaseLineDao as DaoPurchaseLine;
use daos\daodb\UserDao as DaoUser;

$daoPurchaseLine = DaoPurchaseLine::getInstance();
$daoUser = DaoUser::getInstance();

$listPurchaseLine = $daoPurchaseLine->readAll();
$listUser = $daoUser->readAll();



 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php include_once (VIEWS."header.php");?>
	
	<h3>Crear COMPRA</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>purchase/create" method="post">
			<div>
				<label>email de cliente: (Temporalmente)</label>
				<select class="custom-select"  name="userEmail">
				<?php  foreach ($listUser as $key => $user) { ?>
				 <option value="<?php echo $user->getEmail(); ?>"><?php  echo $user->getEmail(); ?></option>
				 <?php } ?>			 
				</select>
				<br>
				<label>Linea de compra:</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<?php foreach ($listPurchaseLine as $key => $purchase_line) { ?>
							<input type="checkbox" name="purchaselines[]" value="<?php echo $purchase_line->getId(); ?>"> <!-- enviamos como valor el objeto de linea de compra, ya que el create de compra tiene q recibir objetos de linea de compra-->
							<label for="purchase_line[]"><?php echo $purchase_line->getEventSquareDescription() ?></label>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

		<br>
			<div>
				<input type="submit" name="" value="enviar">
			</form>
	</div>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>views/index">Volver al incio</a>
	</div>
</body>
</html>