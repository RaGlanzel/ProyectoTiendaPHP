<h1>Registrarse</h1>

<form action="index.php?controller=usuario&action=save" method="POST">

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