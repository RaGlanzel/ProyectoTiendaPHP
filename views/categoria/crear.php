<h1>Crear nueva categoría</h1>

<form action="<?=base_url?>categoria/save" metod="POST">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" required/>

<input type="submit" value="Guardar"/>
</form>