<?php

/* 
 * Copyright (C) 2018
 * 
 */
?>



<h2>Lista de Proveedores</h2>



<?php echo form_open('suppliers/usrselectsearch/'.$responseto); ?>   
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
        
        <td><a href="<?php echo site_url($responseto."/".$items['id']);?>">Seleccionar</a></td>
        </tr>
<?php endforeach; ?>
    <?php }else{ ?>
        <tr>
            <td colspan="6">
        No items</td>
        </tr>
        <?php } ?>
        
        
        
</table>
<?php if(isset($links)) echo $links; ?>
