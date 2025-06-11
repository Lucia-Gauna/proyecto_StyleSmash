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
            <?= $validation->showError('nombre_prod', 'custom_error') ?>
        </div>

        <!-- Categoría -->
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-select" name="categoria" id="categoria" required>
                <option value="">Seleccionar categoría</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $producto['categoria_id']) ? 'selected' : '' ?>>
                        <?= esc($cat['descripcion']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= $validation->showError('categoria', 'custom_error') ?>
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio de costo</label>
            <input type="number" step="0.01" class="form-control" name="precio" id="precio"
                   value="<?= set_value('precio', $producto['precio']) ?>" required>
            <?= $validation->showError('precio', 'custom_error') ?>
        </div>

        <!-- Precio de venta -->
        <div class="mb-3">
            <label for="precio_vta" class="form-label">Precio de venta</label>
            <input type="number" step="0.01" class="form-control" name="precio_vta" id="precio_vta"
                   value="<?= set_value('precio_vta', $producto['precio_vta']) ?>" required>
            <?= $validation->showError('precio_vta', 'custom_error') ?>
        </div>

        <!-- Stock -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock"
                   value="<?= set_value('stock', $producto['stock']) ?>" required>
            <?= $validation->showError('stock', 'custom_error') ?>
        </div>

        <!-- Stock mínimo -->
        <div class="mb-3">
            <label for="stock_min" class="form-label">Stock mínimo</label>
            <input type="number" class="form-control" name="stock_min" id="stock_min"
                   value="<?= set_value('stock_min', $producto['stock_min']) ?>" required>
            <?= $validation->showError('stock_min', 'custom_error') ?>
        </div>

        <!-- Imagen -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen actual</label><br>
            <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="Imagen actual" class="img-thumbnail mb-2" style="max-width: 150px;">
            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
            <?= $validation->showError('imagen', 'custom_error') ?>
        </div>

        <!-- Botones -->
        <div class="text-center">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="<?= base_url('producto') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

