<div style="background-color: #ded8ca; min-height: 70vh;" class="py-4">
  <div class="container">
    <h2 class="text-center mb-4 display-4">Consultas</h2>

    <table class="table table-bordered">
      <thead class="table-warning">
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Mensaje</th>
          <th>Se respondió</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($consultas)): ?>
          <?php foreach ($consultas as $consulta): ?>
            <tr>
              <td><?= esc($consulta['nombre']) ?></td>
              <td><?= esc($consulta['email']) ?></td>
              <td><?= esc($consulta['mensaje']) ?></td>
              <td><?= esc($consulta['respondido']) ?></td>
              <td>
                <?php if ($consulta['respondido'] == 'NO'): ?>
                  <a href="<?= base_url('consulta/responder/' . $consulta['id_consulta']) ?>" class="btn btn-success btn-sm">Atender</a>
                <?php else: ?>
                  <a href="<?= base_url('consulta/eliminar/' . $consulta['id_consulta']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="5" class="text-center">No hay consultas registradas.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
