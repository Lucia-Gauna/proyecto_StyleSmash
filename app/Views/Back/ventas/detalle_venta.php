<div class="container my-5">
    <?php if (empty($detalle)) : ?>
        <div class="alert alert-dark text-center" role="alert">
            <h4 class="alert-heading">No hay detalles para esta venta</h4>
            <a class="btn btn-warning mt-3" href="<?= base_url('ventas') ?>">Volver a ventas</a>
        </div>
    <?php else : ?>
        <h1 class="text-center mb-4 display-4">Detalle de Venta</h1>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; $total = 0; ?>
                    <?php foreach ($detalle as $item) : ?>
                        <?php $subtotal = $item['precio_vta'] * $item['cantidad']; ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($item['nombre']) ?></td>
                            <td><?= esc($item['nombre_prod']) ?></td>
                            <td>
                                <img src="<?= base_url('assets/uploads/' . esc($item['imagen'])) ?>" width="100" height="60" class="img-thumbnail" alt="imagen producto">
                            </td>
                            <td><?= number_format($item['cantidad']) ?></td>
                            <td>$<?= number_format($item['precio_vta'], 2) ?></td>
                            <td>$<?= number_format($subtotal, 2) ?></td>
                            <?php $total += $subtotal; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="table-secondary">
                    <tr>
                        <td colspan="6" class="text-end"><strong>Total</strong></td>
                        <td><strong>$<?= number_format($total, 2) ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="text-center mt-4">
            <a class="btn btn-secondary" href="<?= base_url('ventas') ?>">← Volver</a>
        </div>
    <?php endif; ?>
</div>
