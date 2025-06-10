<!-- productos.php - Vista de listado de productos -->
<div class="container mt-3 mb-4 p-3 bg-cream rounded">

    <h2 class="text-center mb-4 display-4">Lista de Productos</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-3">
        <a href="<?= base_url('crear') ?>" class="btn btn-success me-2">Agregar</a>
        <a href="<?= base_url('eliminados') ?>" class="btn btn-danger">Eliminados</a>
    </div>


    <table class="table table-bordered table-striped table-hover table-light table-sm text-center" id="tablaProductos">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Precio Venta</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($producto as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nombre_prod']; ?></td>
                <td><?= number_format($row['precio'], 2); ?></td>
                <td><?= number_format($row['precio_vta'], 2); ?></td>
                <td><?= $row['stock']; ?></td>
                <td>
                    <img src="<?= base_url('assets/uploads/' . $row['imagen']) ?>" width="60" height="60" class="img-thumbnail">
                </td>
                <td>
                    <a href="<?= base_url('editar/' . $row['id']) ?>" class="btn btn-success btn-sm">Editar</a>
                    <a href="<?= base_url('borrar/' . $row['id']) ?>" class="btn btn-secondary btn-sm" 
                    onclick="return confirm('¿Estás seguro de eliminar este producto?')">Borrar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        

    </table>
</div>

<!-- Puedes añadir esto si usás DataTables -->
<script>
    // $(document).ready(function () {
    //     $('#tablaProductos').DataTable();
    // });
</script>
