<?php
namespace views;
?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo BASE; ?>views/index">GoToEvent</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo BASE; ?>views/index">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">-->
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Eventos 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="<?php echo BASE; ?>views/eventsByDate">
                              <i class="mr-2" data-feather="user" width="20" height="20"></i>Eventos por fecha
                         </a>
                         <a class="dropdown-item" href="<?php echo BASE; ?>views/eventsByCategory">
                              <i class="mr-2" data-feather="user" width="20" height="20"></i>Eventos por categoria
                         </a>
                         <a class="dropdown-item" href="<?php echo BASE; ?>views/eventsByArtist">
                              <i class="mr-2" data-feather="log-out" width="20" height="20"></i> Eventos por artista
                         </a>
                    </div>
                  </li>
               <!-- </ul>
              </div>-->
            </li>
          <?php if($user) {
                  if ($user->getType() == "admin") { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASE; ?>views/viewadmin">Administrar</a>
            </li>
          <?php } }?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASE; ?>views/shoppingcart">Carrito <i class="fas fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item">
              <?php  if(!$user){ ?>
              <a class="nav-link" href="<?php echo BASE; ?>views/login">Iniciar sesion</a>
              
            <?php } else { ?>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <?= $user->getName() . ' ' . $user->getLastName() ?> <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="#">
                              <i class="mr-2" data-feather="user" width="20" height="20"></i>Mi perfil
                         </a>
                         <a class="dropdown-item" href="#">
                              <i class="mr-2" data-feather="user" width="20" height="20"></i>Mis compras
                         </a>
                         <a class="dropdown-item" href="<?php echo BASE; ?>user/logout">
                              <i class="mr-2" data-feather="log-out" width="20" height="20"></i> Cerrar Sesion
                         </a>
                    </div>
                  </li>
                </ul>
              </div>
            <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
