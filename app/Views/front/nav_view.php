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

    <?php elseif ($logueado && $perfil == 2): ?>

      <div class="btn btn-success active btnUser btn-sm">
        <a href="#"  class="text-white" >USUARIO: <?php echo esc($nombre); ?></a>
      </div>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('tienda_view'); ?>">Tienda</a></li>

          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('acerca_de'); ?>">¿Quiénes Somos?</a></li>

          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('contacto'); ?>">Contacto</a></li>
          
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('logout'); ?>">Cerrar Sesión</a></li>
        </ul>
      </div>

      <!-- Logo -->
      <a class="navbar-brand navbar-center position-absolute top-50 translate-middle" href="<?php echo base_url('/'); ?>">
        <img src="<?php echo base_url('assets/img/logonuevo.png'); ?>" alt="Logo de la empresa">
      </a>

      <!-- Carrito -->
      <div class="position-absolute end-0 p-3">  <a href="#" class="btn btn-outline-secondary">
          🛒 Carrito
        </a>
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



