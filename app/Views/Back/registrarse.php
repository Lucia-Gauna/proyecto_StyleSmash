<!-- Vista del formulario de registro en CodeIgniter 4 -->
<link href="assets/css/miestiloBack.css" rel="stylesheet">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    
    <video autoplay muted loop playsinline id="bg-video">
        <source src="<?= base_url('assets/img/videofondo.mp4') ?>" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>

        <!-- Contenido encima del video -->
    <div class="overlay d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg bg-black" style="max-width: 500px; width: 100%;">
            <h2 class="text-center mb-3">Registrarse</h2>
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
            <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -10px">
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
                <div class="mb-2" style="width: 500px; margin-top: -10px">
                     <label for="apellido" class="form-label">Apellido</label>
                     <input name="apellido" id="apellido" type="text" class="form-control" placeholder="Apellido">
                </div>
            
                <!-- Mostrar error si el campo "apellido" no es válido -->
                <?php if ($validation->getError('apellido')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('apellido'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Usuario -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -10px">
                     <label for="usuario" class="form-label">Usuario</label>
                     <input name="usuario" id="usuario" type="text" class="form-control" placeholder="@Usuario123">
                </div>
            
                <!-- Mostrar error si el campo "Usuario" no es válido -->
                <?php if ($validation->getError('usuario')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('usuario'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Correo -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -10px">
                     <label for="email" class="form-label">Correo Electrónico</label>
                     <input name="email" id="email" type="text" class="form-control" placeholder="Ejemplo@gmail.com">
                </div>
            
                <!-- Mostrar error si el campo "Correo" no es válido -->
                <?php if ($validation->getError('email')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('email'); ?>
                    </div>
                <?php endif; ?>
            </div>

             <!-- Campo: Contraseña -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -10px">
                     <label for="pass" class="form-label">Contraseña</label>
                     <input name="pass" id="pass" type="text" class="form-control" >
                </div>
            
                <!-- Mostrar error si el campo "Correo" no es válido -->
                <?php if ($validation->getError('email')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('email'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Botón de enviar -->
            <button type="submit" class="btn btn-primary">Registrarse</button>

        </div>
    </form>
</div>
