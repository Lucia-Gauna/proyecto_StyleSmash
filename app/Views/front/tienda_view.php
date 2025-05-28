<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda | Style Smash</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/miestilo.css">
</head>
<body>
  <main class="container my-5">
    <h2 class="mb-4">Nuestros Productos</h2>
    <div class="row">
      <?php
        // Productos
        $productos = [
          ["nombre" => "Paleta Bullpadel XPLO", "imagen" => "bulxplo.png", "precio" => "$500.000"],
          ["nombre" => "Paleta Wilson Bela V2", "imagen" => "paletawilson.jpeg", "precio" => "$670.000"],
          ["nombre" => "Paleta Adidas MetalBone", "imagen" => "Metalbone.jpg", "precio" => "$590.000"],
          ["nombre" => "Paleta Nox AT10", "imagen" => "paletanox.jpeg", "precio" => "$450.000"],
          ["nombre" => "Paleta Babolat Viper", "imagen" => "viper.png", "precio" => "$530.000"],
          ["nombre" => "Paleta Head Gravity", "imagen" => "paletahead.png", "precio" => "$430.000"],
          ["nombre" => "Paleta Siux", "imagen" => "paletasiux.jpg", "precio" => "$420.000"],
          ["nombre" => "Paleta Royal Pole 42", "imagen" => "Royalpole.png", "precio" => "$280.000"],
          ["nombre" => "Pelota Bullpadel Next", "imagen" => "pelotabull.jpg", "precio" => "$30.000"],
          ["nombre" => "Pelota Odea", "imagen" => "pelotaodea.jpg", "precio" => "$14.000"],
          ["nombre" => "Pelota Nox", "imagen" => "pelotanox.jpg", "precio" => "$27.000"],
          ["nombre" => "Pelota wilson", "imagen" => "pelotawilson.jpg", "precio" => "$32.000"],
          ["nombre" => "Bolso Adidas", "imagen" => "bolsoadidas.jpg", "precio" => "$280.000"],
          ["nombre" => "Bolso Varlion", "imagen" => "bolsovarlion.jpg", "precio" => "$190.000"],
          ["nombre" => "Bolso babolat", "imagen" => "bolso.jpeg", "precio" => "$300.000"],
          ["nombre" => "Bolso bullpadel", "imagen" => "bolsobul.png", "precio" => "$300.000"],

        ];

        foreach ($productos as $p) {
          echo '
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
            <div class="card h-100 text-justify">
              <img src="assets/img/' . $p["imagen"] . '" class="card-img-top" alt="' . $p["nombre"] . '">
              <div class="card-body">
                <h5 class="card-title">' . $p["nombre"] . '</h5>
                <p class="card-text">' . $p["precio"] . '</p>
                <a href="#" class="btn btn-outline-dark btn-sm">Ver más</a>
              </div>
            </div>
          </div>';
        }
      ?>
    </div>
  </main>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>