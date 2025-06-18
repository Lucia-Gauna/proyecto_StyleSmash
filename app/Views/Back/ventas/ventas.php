<main class="container my-4 dislpay-4 text-center">
    <h2>Ventas</h2>
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
                        <a href="<?= base_url('/ventas/detalle/'.$venta['venta_id']) ?>" class="btn btn-info btn-sm">Ver Detalles</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>
