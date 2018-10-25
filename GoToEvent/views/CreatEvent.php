<?php
use daos\daodb\CategoryDao as D_Category;

$daocategory = D_Category::getInstance();

$listCategory = $daocategory->readAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3>Crear Evento</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>Event/create" method="post">
			<div>
				<label>Titulo: </label>
				<input type="text" name="title">
				<!--<label>Categoria: </label>
				<input type="text" name="category"> --> 
			</div>
		<br>
			<div>
				<label>Categoria: </label>
				<select name="id_artist" >
					<?php foreach ($listCategory as $key => $category) { ?>
							<option value="<?php echo $category->getId();  ?>"><?php echo $category->getDescription(); ?></option>
					<?php } ?>
				</select>
			</div>
			<div>
				<input type="submit" name="" value="enviar">
			</form>
			</div>
	</div>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>views/index">Volver al incio</a>
	</div>
	

</body>
</html>