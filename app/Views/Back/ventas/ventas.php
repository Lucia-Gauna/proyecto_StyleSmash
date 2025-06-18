<div style="background-color: #ded8ca; min-height: 70vh;" class="py-4">
  <div class="container">
      <h2 class="text-center mb-4 display-4">Ventas</h2>
      <table class="table table-bordered">
          <thead class="table-dark">
              <tr>
                <th>ID Venta</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
               <?php foreach ($ventas as $venta): ?>
                   <tr>
                        <td><?= $venta['venta_id'] ?></td>
                        <td><?= $venta['fecha'] ?></td>
                        <td><?= $venta['nombre'] . ' ' . $venta['apellido'] ?></td>
                        <td>$<?= number_format($venta['total_venta'], 2) ?></td>
                        <td>
                         <a href="<?= base_url('/ventas/detalle/'.$venta['venta_id']) ?>" class="btn btn-success btn-sm">Ver Detalle</a>
                        </td>
                     </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>