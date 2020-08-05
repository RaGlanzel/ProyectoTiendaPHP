<h1>Gestionar categorías</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
<?php while($cat = $categorias->fetch_object()): ?>
    <tr>
        <td><?=$cat->id;?></td>
        <td><?=$cat->nombre;?></td>
    </tr>
<?php endwhile;?>
</table>