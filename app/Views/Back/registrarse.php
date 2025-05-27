<!-- Vista del formulario de registro en CodeIgniter 4 -->

<div class="container pt-5 mt-5 mb-5">
    
    <!-- Título dentro de una tarjeta (Bootstrap) -->
    <div class="card-header text-justify">
        <div class="row d-flex justify-content-center">
            <div class="card col-lg-3" style="width: 50%;">
                <h4>Registrarse</h4>
            </div>
        </div>
    </div>

    <?php 
    // Accedemos al servicio de validación de CodeIgniter
    $validation = \Config\Services::validation(); 
    ?>

    <!-- Formulario que se enviará por POST -->
    <form method="post" action="<?= base_url('/enviar-form') ?>">
        
        <!-- Token de seguridad -->
        <?= csrf_field(); ?>

        <!-- Mensajes de error en general (fallo en el registro) -->
        <?php if (!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('fail'); ?>
            </div>
        <?php endif; ?>

        <!-- Mensajes de éxito -->
        <?php if (!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Contenedor del formulario con Bootstrap -->
        <div class="card-body justify-content-center" media="(max-width:768px)">

            <!-- Campo: Nombre -->
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input name="nombre" type="text" class="form-control" placeholder="nombre">

                <!-- Mostrar error si el campo "nombre" no es válido -->
                <?php if ($validation->getError('nombre')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('nombre'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Apellido -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="apellido">

                <!-- Mostrar error si el campo "apellido" no es válido -->
                <?php if ($validation->getError('apellido')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('apellido'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Botón de enviar -->
            <button type="submit" class="btn btn-primary">Registrarse</button>

        </div>
    </form>
</div>
