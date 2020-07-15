<h1>Registrarse</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register']):?>
    
    <strong>Registro completado correctamente</strong>

<?php else: ?>

    <strong>Fallo al registar usuario</strong>

<?php endif; ?>

<form action="<?=base_url?>usuario/save" method="POST">

<laber for="nombre">Nombre</label>
<input type="text" name="nombre" required/>

<laber for="apellidos">Apellidos</label>
<input type="text" name="apellidos" required/>

<laber for="email">Email</label>
<input type="email" name="email" required/>

<laber for="password">Contraseña</label>
<input type="password" name="password" required/>

<input type="submit" value="Registrarse">

</form>