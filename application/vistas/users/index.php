<?php

/* 
 * Copyright (C) 2018
 * 
 */
?>
<div class="submenu">
<a class="link_button_3" href="<?php echo site_url('users/create');?>">Nuevo Usuario</a>
</div>

<h2>Lista de usuarios</h2>
<?php if(isset($useradd)){ ?>
Usuario agregado con exito.
<?php } ?>
<?php if(isset($userrem)){ ?>
Usuario REMOVIDO con exito.
<?php } ?>
<table>
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>OBS.</th>
        <th>Permiso</th>
        <th colspan="2"> </th>
    </tr>
<?php foreach ($users as $users_item): ?>
    <tr>
        <td><?php echo $users_item['id']; ?></td>
        <td><?php echo $users_item['username']; ?></td>        
        <td><?php echo $users_item['realname']; ?></td>   
        <td><?php echo $users_item['obs']; ?></td>  
        <td><?php echo $users_item['uprofiles_id']?></td>
        <td><a href="<?php echo site_url('users/create/'.$users_item['id']);?>">Editar</a></td>
        <td><a href="<?php echo site_url('users/remove/'.$users_item['id']);?>">Remover</a></td>
        </tr>
<?php endforeach; ?>
</table>
