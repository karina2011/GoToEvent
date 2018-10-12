<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

  <p class="h3"><h3>Opciones artista:</h3></p>
  <br>
  <div>
    <a class="btn btn-primary" href="<?php echo BASE; ?>Home/createArtist" >Crear Artista</a>
  </div>

  <br>

  <div>
    <a class="btn btn-primary" href="<?php echo BASE; ?>Artist/getStore" >Ver Artista</a>
  </div>

  <br>

  <div>
    <a class="btn btn-primary" href="<?php echo BASE; ?>Home/deleteArtist">Borrar Artista</a>
  </div>

  <br>
  <br>

  <p><h3>Opciones evento: </h3></p>

  <br>

  <div>
    <a class="btn btn-primary" href="<?php echo BASE; ?>Home/creatEvent">Crear Evento</a>
  </div>

  <br>

  <div>
    <a class="btn btn-primary" href="<?php echo BASE; ?>Event/readAll">Ver eventos</a>
  </div>

  <br>

  <div>
    <a class="btn btn-primary" href="<?php echo BASE; ?>Home/deleteEvent">Borrar evento</a>
  </div>

</body>
</html>
