<?php

/* 
 * Copyright (C) 2018
 * 
 */
?>

<div class="submenu">
<a class="link_button_3" href="<?php echo site_url('products/create');?>">Nuevo Produto</a>
</div>

<h2>Lista de productos</h2>
<?php if(isset($tadd)){ ?>
Producto agragado exitosamente.
<?php } ?>
<?php if(isset($trem)){ ?>
Producto REMOVIDO exitosamente.
<?php } ?>
<?php if(isset($pio)){ ?>
Cantidad cambiada exitosamente.
<?php } ?>

<?php echo form_open('products/search'); ?>   
<label for="search">Buscar</label>
    <input type="input" name="search" value="<?php if(isset($search_text)){ echo $search_text; } ?>"/><br/>
</form>
<?php if(isset($links)) echo $links; ?>
<table>
    <tr>
        <th>ID</th>
        <th>Descripcion</th>
        <th>Pocicion</th>
        <th>Stock</th>
        <th colspan="4"> </th>
    </tr>
    
    <?php if(isset($tabitens)){ ?>
<?php foreach ($tabitens as $items): ?>
    <tr>
        <td><?php echo $items['id']; ?></td>
        <td 
        <?php if($items["quantity"] <= $items["quantitymin"] && $items["quantitymin"] >0){ ?>
        style="color:red"
        <?php } ?>
        ><?php echo $items['description']; ?></td>        
        <td><?php echo $items['position']; ?></td>   
        <td <?php if($items["quantity"] <= $items["quantitymin"] && $items["quantitymin"] >0){ ?>
        style="color:red"
        <?php } ?>><?php echo $items['quantity']; ?>
        <?php if($items["quantity"] <= $items["quantitymin"] && $items["quantitymin"] >0){ ?>
        (min = <?php echo  $items["quantitymin"]?>)
        <?php } ?>
        </td>  
        <td><a style="padding: 3px 11px;" class="link_button_3_green" href="<?php echo site_url('products/stockio/'.$items['id']."/1");?>">Entrada</a></td>
        <td><a style="padding: 3px 11px;" class="link_button_3_red" href="<?php echo site_url('products/stockio/'.$items['id']."/0");?>">Salída</a></td>
        <td><a href="<?php echo site_url('products/create/'.$items['id']);?>">
            <img style="width:20px" src="<?php echo base_url()."/images/pencil.png" ?>" alt="Editar"/>
            </a></td>
        <td><a   href="<?php echo site_url('products/askremove/'.$items['id']);?>">
                <img style="width:20px" src="<?php echo base_url()."/images/trash.png" ?>" alt="Remove"/>
                </a></td>
        </tr>
<?php endforeach; ?>
    <?php }else{ ?>
        <tr>
            <td colspan="8">
        No elementos</td>
        </tr>
        <?php } ?>
        
        
        
</table>
<?php if(isset($links)) echo $links; ?>
