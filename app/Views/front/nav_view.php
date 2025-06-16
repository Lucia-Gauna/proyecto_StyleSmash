<?php 
  $session = session();
  $nombre = $session->get('nombre');
  $perfil = $session->get('id_perfil'); 
  $logueado = $session->get('logueado');
?>

<nav class="navbar navbar-expand-lg navbar-dark position-relative">
  <div class="container-fluid">
    
    <!-- Botón hamburguesa para móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php if ($logueado && $perfil == 1): ?>
      <!-- ADMINISTRADOR -->
      <div class="btn btn-success active btnUser btn-sm">
        <a href="#"  class="text-white" >USUARIO: <?php echo esc($nombre); ?></a>
      </div>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url('/'); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('usuarios'); ?>">CRUD usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('producto'); ?>">CRUD productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('ventas'); ?>">Muestra ventas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('listarconsultas'); ?>">Consultas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('logout'); ?>">Cerrar sesión</a>
          </li>
        </ul>
      </div>
     
     <!-- SI EL CLIENTE ESTA LOGUEADO --> 
     <?php elseif ($logueado && $perfil == 2): ?>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('tienda_view'); ?>">Tienda</a></li>

          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('acerca_de'); ?>">¿Quiénes Somos?</a></li>

          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('contacto'); ?>">Contacto</a></li>
        </ul>
      </div>

      <!-- Logo -->
      <a class="navbar-brand navbar-center position-absolute top-50 translate-middle" href="<?php echo base_url('/'); ?>">
        <img src="<?php echo base_url('assets/img/logonuevo.png'); ?>" alt="Logo de la empresa">
      </a>

      <!-- Botón Carrito + Menú Usuario a la derecha -->
      <div class="d-flex align-items-center end-0 top-0 p-3 gap-3">

        <!-- Carrito -->
        <a href="carrito" class="btn btn-outline-secondary position-relative">
        🛒
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success"><?=$total_items ?? 0 ?>
          </span>
        </a>

        <!-- Menú de Usuario -->
        <div class="dropdown">
          <button class="btn btn-success dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= esc($nombre); ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" style="background-color: rgb(60, 60, 58);">
            <li><a class="dropdown-item text-white mt-3" href="mis_compras"> Mis Compras</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="<?= base_url('logout'); ?>">Cerrar sesión</a></li>
          </ul>

        </div>

      </div>


     <?php else: ?>
      <!-- VISITANTE NO LOGUEADO -->
      <div class="collapse navbar-collapse" id="navbarContent">

        <!-- Logo -->
        <a class="navbar-brand navbar-center position-absolute top-50 translate-middle" href="<?php echo base_url('/'); ?>">
           <img src="<?php echo base_url('assets/img/logonuevo.png'); ?>" alt="Logo de la empresa">
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/login'); ?>">Iniciar Sesión</a></li>

          <!-- Enlaces que lo llevan al login si intenta usar funciones -->
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/login'); ?>" >Tienda</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/login'); ?>" >Contacto</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('acerca_de'); ?>">¿Quiénes Somos?</a></li>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</nav>



