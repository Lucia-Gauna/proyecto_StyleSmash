<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contacto | Style Smash</title>
  <link rel="stylesheet" href="/mi-proyecto/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/mi-proyecto/assets/css/style.css">
</head>
<body>

  <main class="container my-5">
    <h2 class="mb-4">¿Querés contactarnos?</h2>
    <div class="row">
      <div class="col-12 col-md-6">
        <form action="#" method="post">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
          </div>
          <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar mensaje</button>
        </form>
      </div>
      <div class="col-12 col-md-6">
        <h5 class="mb-3">También podés contactarnos desde:</h5>
        <p><strong>Email:</strong> contacto@stylesmash.com</p>
        <p><strong>Teléfono:</strong> +54 9 3794033420</p>
        <p><strong>Dirección:</strong> 9 de Julio 1449</p>
      </div>
    </div>
  </main>

  

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>