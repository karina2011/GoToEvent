<?php namespace views; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if(isset($_SESSION['carrito'])) { ?>
            <?php foreach ($_SESSION['carrito'] as $key => $purchaseline) { ?>
                    <div class="">
                      <h2>Linea de compra:</h2>
                    </div>
                    <div class="">
                      <p><?php echo $purchaseline->getPrice(); ?></p>
                    </div>
                    <div class="">
                      <p><?php echo $purchaseline->getNumber(); ?></p>
                    </div>
                    <div class="">
                      <p><?php echo $purchaseline->getEventSquare(); ?></p>
                    </div>

                    <br>
                    <br>
                    <br>
            <?php } ?>
          <?php } else { ?>
                    <h1>No hay lineas de compras</h1>
                <?php } ?>
  </body>
</html>
