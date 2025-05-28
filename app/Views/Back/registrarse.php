<!-- Vista del formulario de registro en CodeIgniter 4 -->
<link href="assets/css/miestiloBack.css" rel="stylesheet">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    
    <video autoplay muted loop playsinline id="bg-video">
        <source src="<?= base_url('assets/img/videofondo.mp4') ?>" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>

        <!-- Contenido encima del video -->
    <div class="d-flex justify-content-center align-items-center">
        <h2 class="text-center mb-3">Registrarse</h2>
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
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
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
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
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
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
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
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
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
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
                     <label for="pass" class="form-label">Contraseña</label>
                     <input name="pass" id="pass" type="text" class="form-control" >
                </div>
            
                <!-- Mostrar error si el campo "Contraseña" no es válido -->
                <?php if ($validation->getError('pass')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('pass'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Campo: Verificar contraseña -->
           <div class="container d-flex justify-content-center mt-4">
                <div class="mb-2" style="width: 500px; margin-top: -20px; color: white">
                     <label for="password2" class="form-label">Verificar Contraseña</label>
                     <input name="password2" id="pass" type="text" class="form-control" >
                </div>
            
                <!-- Mostrar error si el campo "Contraseña" no es válido -->
                <?php if ($validation->getError('password2')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('password2'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Botón de enviar -->
             <div class="mt-4">
                <button type="submit" class="btn btn-primary">Registrarse</button>
             </div>
            

        </div>
    </form>
</div>
