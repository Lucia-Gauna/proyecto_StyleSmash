


<section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
    <div class="col-md-6 mb-4 mb-md-0">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner rounded shadow">
      <div class="carousel-item active">
        <img src="assets/img/festejotapia.jpeg" class="d-block w-100" alt="Imagen 1">
      </div>
      <div class="carousel-item">
        <img src="assets/img/agustapia.jpg" class="d-block w-100" alt="Imagen 2">
      </div>
      <div class="carousel-item">
        <img src="assets/img/tapia.png" class="d-block w-100" alt="Imagen 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>
      <div class="col-md-6 text-md-start text-center">
        <h1 class="hero-title">Equipate para ganar.</h1>
      </div>
    </div>
  </div>
</section>

<div class="container seccion-producto">
  <h2 class="titulo-grande">Productos destacados</h2>

  <br>
  <div class="producto-imagen">
    <img src="assets/img/metalbone2025.png" alt="Paletas de Padel">
  </div>
  <h3 class="producto-nombre">Paletas </h3>
  
</div>
<br>
<div class="producto-imagen">
    <img src="assets/img/pelotasbul.png" alt="Pelotas de padel">
  </div>
  <h3 class="producto-nombre"> Pelotas </h3>

</div>
<br>
<div class="producto-imagen">
    <img src="assets/img/bolsobab.png" alt="Bolso de padel">
  </div>
  <h3 class="producto-nombre"> Bolsos </h3>

</div>

<div class="container social-section">
  <h2>Síguenos en las redes sociales</h2>
  <div class="row">
    <?php
      $imagenes = [
        "logoig.jpeg",
        "logowpp.jpeg",
        "logotiktok.jpeg",
        "logocorreo.jpeg"
      ];

      foreach ($imagenes as $imagen) {
        echo '
        <div class="col-6 col-md-3 social-card">
          <img src="assets/img/' . $imagen . '" class="img-fluid social-img" style="max-width: 80px" alt="Producto">
        </div>';
      }
    ?>
  </div>
</div>


