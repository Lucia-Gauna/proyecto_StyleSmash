
<nav class="navbar navbar-expand-lg navbar-light  position-relative">
    
  <div class="container-fluid">
    
   <!-- Botón  -->
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"> </span>

    </button>

    <?php if($perfil == 1): ?>
      <div class="btn btn-info active btnUser btn-sm">
        <a href="">USUARIO: <?php echo session ('nombre'); ?> </a>
      </div>
      <div class="collapse navbar-collapse " id="navbarSuportedContent">
        <ul class ="navbar-nav me-auto mb-2 mb-lg-0"> 
          <li class="nav-item">
            <a class="nav-link active" aria-current= "page" href="<? echo base_url('prueba');?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<? echo base_url('lista usuarios');?>">CRUD usuarios</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="<? echo base_url('producto controller');?>">CRUD productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<? echo base_url('ventas');?>" tabindex="-1" aria-disable="true">Muestra ventas</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<? echo base_url('listarconsultas');?>" tabindex= "-1" aria-disable="true">consultas</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<? echo base_url('logout');?>" tabindex= "-1" aria-disable="true">cerrar sesion</a>
          </li>
        </ul>
    </div>
    <?php endif?>
    <?php elseif($perfil == 2): ?>
      <div class="btn btn-info active btnUser btn-sm">
        <a href="" > CLIENTE: <?php echo session('nombre')?></a>
      </div>
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
    <?php endif ?>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

