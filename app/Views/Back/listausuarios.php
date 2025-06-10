<div class="container mt-4 mb-4 p-4">

   <h2 class="text-center mb-4 display-4">Lista de Usuarios</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-3">
        <a href="<?= base_url('nuevo_usuario') ?>" class="btn btn-success me-2">Agregar Usuario</a>
        <a href="<?= base_url(' usuarios_baja') ?>" class="btn btn-secondary">Ver dados de baja</a>
    </div><div class="d-flex justify-content-between align-items-center mb-3">

    <table class="table table-striped table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Perfil</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?= esc($usuario['perfil']) ?></td>
                    <td><?= esc($usuario['nombre']) ?></td>
                    <td><?= esc($usuario['apellido']) ?></td>
                    <td><?= esc($usuario['email']) ?></td>
                    <td>
                        <a href="<?= base_url('editar_usuario/'.$usuario['id_usuario']) ?>" class="btn btn-sm btn-success">Editar</a>
                        <a href="<?= base_url('dar_baja/'.$usuario['id_usuario']) ?>" class="btn btn-sm btn-danger">Dar de baja</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (empty($usuarios) || count($usuarios) < 4): ?>
        <div style="height: 23vh;"></div>
    <?php endif; ?>
</div>

