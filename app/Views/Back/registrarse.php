<!-- Vista del formulario de registro en CodeIgniter 4 -->

<div class="container pt-5 mt-5 mb-5">
    
    <!-- Título dentro de una tarjeta (Bootstrap) -->
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-lg-6 text-center mt-5">
                <h1 class="display-4">Registrarse</h1>
             </div>
        </div>
    </div

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
            <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px;">
                     <label for="nombre" class="form-label">Nombre</label>
                     <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre">
                </div>
            


                <!-- Mostrar error si el campo "nombre" no es válido -->
                <?php if ($validation->getError('nombre')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('nombre'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Apellido -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px;">
                     <label for="apellido" class="form-label">Apellido</label>
                     <input name="apellido" id="apellido" type="text" class="form-control" placeholder="apellido">
                </div>
            
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
