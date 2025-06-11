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
  <h2 class="mb-4 display-4 text-center">Nuestros Productos</h2>
  <div class="row">
    <?php foreach ($productos as $p): ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="card h-100 text-justify">
          <img src="<?= base_url('assets/img/' . $p['imagen']) ?>" class="card-img-top" alt="<?= esc($p['nombre_prod']) ?>">
          <div class="card-body">
            <h5 class="card-title"><?= esc($p['nombre_prod']) ?></h5>
            <p class="card-text">$<?= number_format($p['precio_vta'], 0, ',', '.') ?></p>
            <form action="<?= base_url('carrito/agregar/' . $p['id']) ?>" method="post">
             <?= csrf_field() ?>
             <button type="submit" class="btn btn-outline-dark btn-sm w-100">
               Agregar al carrito
             </button>
            </form>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>