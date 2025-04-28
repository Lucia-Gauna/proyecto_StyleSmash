
<nav class="navbar navbar-expand-lg navbar-light  position-relative">
    
  <div class="container-fluid">

   <!-- Botón  -->
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"> </span>

    </button>

    <!-- Enlaces a la izquierda -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-light" href="<?php echo base_url('tienda_view');?>">Tienda</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="<?php echo base_url('acerca_de');?>"> ¿Quienes Somos? </a></li>
        <li class="nav-item"><a class="nav-link text-light" href="<?php echo base_url('contacto');?>">Contacto</a></li>
      </ul>
      </div>

      <!-- Logo en el centro -->
    <a class="navbar-brand navbar-center position-absolute top-50 translate-middle " href="<?php echo base_url('/');?>">
      <img src="assets/img/logonuevo.png" alt="Logo de la empresa">
    </a>
    
    <!-- Carrito a la derecha -->
    <div class="position-absolute end-0 p-3" >
      <a href="#" class="btn btn-outline-secondary">
        🛒 Carrito
      </a>
    </div>

    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

