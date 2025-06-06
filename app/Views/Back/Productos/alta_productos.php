<div class="container mt-1 mb-1 d-flex justify-content-center">
    <div class="card" style="width: 75%">
        <div class="card-header text-center">
            <h2>Alta de Productos</h2>
        </div>

        <?php if (!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger m-3">
                <?= session()->getFlashdata('fail'); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success m-3">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php $validation = \Config\Services::validation(); ?>

        <form action="<?= base_url('/enviar-prod'); ?>" method="post" enctype="multipart/form-data" class="p-4">

            <!-- Nombre del producto -->
            <div class="mb-3">
                <label for="nombre_prod" class="form-label">Producto</label>
                <input class="form-control" type="text" name="nombre_prod" id="nombre_prod"
                    value="<?= set_value('nombre_prod'); ?>" placeholder="Nombre del producto" autofocus>
                <?php if ($validation->getError('nombre_prod')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('nombre_prod'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Categoría -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-control" name="categoria" id="categoria">
                    <option value="0">Seleccionar Categoría</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id']; ?>" <?= set_select('categoria', $categoria['id']); ?>>
                            <?= $categoria['id'] . ". " . $categoria['descripcion']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($validation->getError('categoria')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('categoria'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Precio de costo -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio de Costo</label>
                <input class="form-control" type="text" name="precio" id="precio"
                    value="<?= set_value('precio'); ?>">
                <?php if ($validation->getError('precio')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('precio'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Precio de venta -->
            <div class="mb-3">
                <label for="precio_vta" class="form-label">Precio de Venta</label>
                <input class="form-control" type="text" name="precio_vta" id="precio_vta"
                    value="<?= set_value('precio_vta'); ?>">
                <?php if ($validation->getError('precio_vta')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('precio_vta'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Stock mínimo -->
            <div class="mb-3">
                <label for="stock_min" class="form-label">Stock mínimo</label>
                <input class="form-control" type="text" name="stock_min" id="stock_min"
                    value="<?= set_value('stock_min'); ?>">
                <?php if ($validation->getError('stock_min')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('stock_min'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Stock actual -->
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input class="form-control" type="text" name="stock" id="stock"
                    value="<?= set_value('stock_min'); ?>">
                <?php if ($validation->getError('stock')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('stock'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen" id="imagen" accept="image/png,image/jpg,image/jpeg">
                <?php if ($validation->getError('imagen')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('imagen'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
                <a href="<?= base_url('crear'); ?>" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
</div>
