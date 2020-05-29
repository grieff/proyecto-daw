<!-- Navbar -->

<nav class="mb-1 navbar navbar-expand-md navbar-light   grey lighten-5">
  <a class="navbar-brand" href="#"><img class="logo-icon" src="public/images/icon_small_transp.png"></img></a>
  <button id="nav-hamburger" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="index.php">Inicio </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="index.php?view=plantilla">Plantilla</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Historia
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="index.php?view=historia">Origenes</a>
          <a class="dropdown-item" href="index.php?view=directores">Directores</a>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="index.php?view=eventos">Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="index.php?view=galeria">Galeria</a>
      </li>




    </ul>
    <ul class="navbar-nav ml-auto ">
      <?php if (isset($_SESSION['sucess'])) { ?>
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="index.php?view=intranet">Intranet</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-user"></i> <?php echo $_SESSION['usuario']; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default right-dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item waves-effect waves-light" href="index.php?view=eventos-miembros">Calendario</a>
            <a class="dropdown-item waves-effect waves-light" href="index.php?view=lista-miembros">Miembros</a>
            <a class="dropdown-item waves-effect waves-light" href="index.php?view=lista-partituras">Partituras</a>
            <a class="dropdown-item waves-effect waves-light" href="logout.php">Cerrar session</a>
          </div>
        </li>
      <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="index.php?view=login">Iniciar sesion</a>
        </li>
      <?php } ?>

    </ul>
  </div>
</nav>



<!-- END NAVBAR -->