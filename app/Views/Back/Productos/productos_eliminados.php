<div class="container mt-4">
    <h2 class="text-center mb-4">Productos Eliminados</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($producto as $prod): ?>
                    <?php if($prod['eliminado'] == 'SI'): ?>
                        <tr class="text-center">
                            <td><?= $prod['id'] ?></td>
                            <td><?= $prod['nombre_prod'] ?></td>
                            <td><?= $prod['precio'] ?></td>
                            <td><?= $prod['precio_vta'] ?></td>
                            <td><?= $prod['stock'] ?></td>
                            <td>
                                <img src="<?= base_url('assets/uploads/'.$prod['imagen']) ?>" width="60">
                            </td>
                            <td>
                                <a href="<?= base_url('activar/'.$prod['id']) ?>" class="btn btn-success btn-sm">Activar</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-3 text-center">
        <a href="<?= base_url('/producto') ?>" class="btn btn-secondary">Volver</a>
    </div>
</div>
