<?php 
use controllers\UserController as C_User;
use models\User as M_User;

$userController = new C_User;
$user = $userController->checkSession();
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
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
          <?php if($user) { 
                  if ($user->getType() == "admin") { ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Administrar</a>
            </li>
          <?php } }?>
            <li class="nav-item">
              <a class="nav-link" href="#">Carrito <i class="fas fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item">
              <?php  if(!$user){ ?>
              <a class="nav-link" href="<?php echo BASE; ?>views/login">Iniciar Sesion</a>
            <?php } else { ?>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <?= $user->getName() . ' ' . $user->getLastName() ?> 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="#">
                              <i class="mr-2" data-feather="user" width="20" height="20"></i>Mi perfil
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
