<?php

/* 
 * Copyright (C) 2018
 * 
 */
?>

<div class="submenu">
<a class="link_button_3" href="<?php echo site_url('suppliers/create');?>">Nuevo Proveedor</a>
</div>

<h2>Lista de Proveedores</h2>
<?php if(isset($tadd)){ ?>
Proveedor agregado con exito.
<?php } ?>
<?php if(isset($trem)){ ?>
Proveedor REMOVIDO con exito.
<?php } ?>


<?php echo form_open('suppliers/search'); ?>   
<label for="search">Buscar</label>
    <input type="input" name="search" value="<?php if(isset($search_text)){ echo $search_text; } ?>"/><br/>
</form>
<?php if(isset($links)) echo $links; ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Direcci&oacute;n</th>
        <th colspan="2"> </th>
    </tr>
    
    <?php if(isset($tabitens)){ ?>
<?php foreach ($tabitens as $items): ?>
    <tr>
        <td><?php echo $items['id']; ?></td>
        <td><?php echo $items['name']; ?></td>        
        <td><?php echo $items['email']; ?></td>   
        <td><?php echo $items['address']; ?></td>          
        <td><a href="<?php echo site_url('suppliers/create/'.$items['id']);?>">Editar</a></td>
        <td><a href="<?php echo site_url('suppliers/askremove/'.$items['id']);?>">Remover</a></td>
        </tr>
<?php endforeach; ?>
    <?php }else{ ?>
        <tr>
            <td colspan="6">
        No hay elementos</td>
        </tr>
        <?php } ?>
        
        
        
</table>
<?php if(isset($links)) echo $links; ?>
