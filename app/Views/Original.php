<style>
    .home-section {
      position: relative;
      min-height: 100vh;
      background: url('assets/img/download(1).gif') no-repeat center center / cover;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
      overflow: hidden;
    }

    /* Degradado superior */
    .home-section::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      height: 70%;
      width: 100%;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent);
      z-index: 1;
    }

    /* Contenido sobre el fondo */
    .content-container {
      position: relative;
      z-index: 2;
      padding: 20px;
    }

    /* Animación de texto */
    .animated-text {
      opacity: 0;
      transform: translateZ(-100%);
      animation: slideIn 5.5s forwards;
    }

    @keyframes slideIn {
      to {
        transform: translateZ(0);
        opacity: 1;
      }
    }

    /* Responsive para móviles */
    @media (max-width: 400px) {
      .animated-text {
        font-size: 1.5rem;
      }

      .content-container p {
        font-size: 1rem;
      }
    }
  </style>




  <!-- SECCIÓN PRINCIPAL -->
  <section class="home-section">
    <div class="content-container">
      <h1 class="animated-text display-4 fw-bold">Bienvenido a Style Smash</h1>
      <p class="lead">El estilo se encuentra con el pádel</p>
    </div>
  </section>
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


