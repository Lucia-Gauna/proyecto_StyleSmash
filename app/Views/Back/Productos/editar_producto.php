<?php $validation = \Config\Services::validation(); ?>

<div class="container mt-3 mb-4 p-4 bg-light rounded" style="max-width: 700px;">
    <h2 class="text-center mb-4">Editar Producto</h2>

    <!-- Mensajes de error -->
    <?php if (session()->getFlashdata('fail')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/modifica/' . $producto['id']) ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

        <!-- Nombre del producto -->
        <div class="mb-3">
            <label for="nombre_prod" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" name="nombre_prod" id="nombre_prod"
                   value="<?= set_value('nombre_prod', $producto['nombre_prod']) ?>" required>
            <?php if ($validation->getError('nombre_prod')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('nombre_prod') ?></div>
            <?php endif; ?>
        </div>

        <!-- Categoría -->
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-select" name="categoria" id="categoria" required>
                <option value="">Seleccionar categoría</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>"
                        <?= ($cat['id'] == $producto['categoria_id']) ? 'selected' : '' ?>>
                        <?= $cat['descripcion'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if ($validation->getError('categoria')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('categoria') ?></div>
            <?php endif; ?>
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio de costo</label>
            <input type="number" step="0.01" class="form-control" name="precio" id="precio"
                   value="<?= set_value('precio', $producto['precio']) ?>" required>
            <?php if ($validation->getError('precio')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('precio') ?></div>
            <?php endif; ?>
        </div>

        <!-- Precio de venta -->
        <div class="mb-3">
            <label for="precio_vta" class="form-label">Precio de venta</label>
            <input type="number" step="0.01" class="form-control" name="precio_vta" id="precio_vta"
                   value="<?= set_value('precio_vta', $producto['precio_vta']) ?>" required>
            <?php if ($validation->getError('precio_vta')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('precio_vta') ?></div>
            <?php endif; ?>
        </div>

        <!-- Stock -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock"
                   value="<?= set_value('stock', $producto['stock']) ?>" required>
            <?php if ($validation->getError('stock')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('stock') ?></div>
            <?php endif; ?>
        </div>

        <!-- Stock mínimo -->
        <div class="mb-3">
            <label for="stock_min" class="form-label">Stock mínimo</label>
            <input type="number" class="form-control" name="stock_min" id="stock_min"
                   value="<?= set_value('stock_min', $producto['stock_min']) ?>" required>
            <?php if ($validation->getError('stock_min')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('stock_min') ?></div>
            <?php endif; ?>
        </div>

        <!-- Imagen -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen actual</label><br>
            <img src="<?= base_url('assets/uploads/' . $producto['imagen']) ?>" width="100" class="img-thumbnail mb-2">
            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
            <?php if ($validation->getError('imagen')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('imagen') ?></div>
            <?php endif; ?>
        </div>

        <!-- Botones -->
        <div class="text-center">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="<?= base_url('listar') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
