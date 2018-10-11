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
<!--<form action="Artist/store" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name ="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name ="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<br>-->
<form action="Artist/Store" method="post" accept-charset="utf-8">
  <div>
    <label for="name">Nombre: </label>
    <input type="text" name="name" value="" placeholder="Nombre">
  </div>

  <div>
    <label for="lastName">Apellido: </label>
    <input type="text" name="lastName" value="" placeholder="LastName">
  </div>

  <div>
    <label for="dni">D.N.I: </label>
    <input type="text" name="dni" value="" placeholder="D.N.I">
  </div>

  <div>
    <input type="submit" name="boton" value="Enviar">
  </div>
</form>


<br>
<br>

<div>
  <a href="Artist/getStore" >Ver Artista</a>
</div>
<br>

<!--<div>
<h3>Crear Evento</h3>
</div>
<br>
<form action="Event/creat" method="post">
  <div>
    <label>Titulo</label>
    <input type="text" name="title">
  </div>
  <br>
  <div>
    <input type="submit" name="" value="enviar">
  </div>

</form> -->

<br>

<button><a href="Home/creatEvent">Crear Evento</a></button>

<br>

<a href="Event/readAll">Ver eventos</a>

<?php

/*echo "<pre>";
var_dump($_SESSION);
echo "</pre>"; */

?>


</body>
</html>
