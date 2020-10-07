
<h1>Gestion de productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">
Crear Producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
	<strong class="alert_green">El Producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'): ?>
	<strong class="alert_red">El Producto No se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto');?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">El Producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
	<strong class="alert_red">El Producto No se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete');?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
<?php while($pro = $productos->fetch_object()): ?>
    <tr>
        <td><?=$pro->Id;?></td>
        <td><?=$pro->nombre;?></td>
        <td><?=$pro->precio;?></td>
        <td><?=$pro->stock;?></td>
        <td>
        	<a href="<?=base_url?>producto/editar&Id=<?=$pro->Id?>" class="button button-gestion">Editar</a>
        	<a href="<?=base_url?>producto/eliminar&Id=<?=$pro->Id?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>