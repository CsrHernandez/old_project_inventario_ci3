<?php
/* 
 * Copyright (C) 2018
 * 
 */
?>

<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php
if ($edit)
    echo form_open('products/create/' . $id);
else
    echo form_open('products/create');
?>

<table>

<?php if ($edit) { ?>
        <tr>
            <td>ID:</td><td> <?php echo $formitem["id"]; ?></td>
        </tr>
<?php } ?>

    <tr>
        <td>
            <label for="description">Descripci&oacute;n</label></td><td>
            <input size="50" type="input" name="description" value="<?php
            if (isset($formitem)) {
                echo $formitem["description"];
            }
            ?>"/></td>
    </tr>
    <tr>
        <td>
            <label for="quantity" >Cantidad</label></td><td>
            <input type="input" name="quantity" value="<?php
            if (isset($formitem)) {
                echo $formitem["quantity"];
            }
            ?>"/></td>
    </tr>
    <tr>
        <td>
            <label for="quantitymin" >Cantidad Minima</label></td><td>
            <input type="input" name="quantitymin" value="<?php
            if (isset($formitem)) {
                echo $formitem["quantitymin"];
            }
            ?>"/></td>
    </tr>
    <tr>
        <td>
            <label for="position" >Posicion no Stock</label></td><td>
            <input type="input" name="position" value="<?php
            if (isset($formitem)) {
                echo $formitem["position"];
            }
            ?>"/></td>
    </tr>
    <tr>
        <td>
            <label for="obs">Obs.</label>
        </td>
        <td>
            <textarea name="obs">
                <?php
                if (isset($formitem)) {
                    echo $formitem["obs"];
                }
                ?></textarea>
        </td>
    </tr>
    <tr>
        <td></td><td>
            <?php if ($edit) { ?>
                <input type="submit" name="submit" value="Actualizar" />
            <?php } else { ?>
                <input type="submit" name="submit" value="Crear" />
<?php } ?>
        </td>
    </tr>

</table>
</form>

<h2>Provedores</h2>
<table>
 <tr>
	 <th>ID</th>
	 <th>Nombre</th>
     <th>Precio</th>
     <th colspan="2"></th>
 </tr>
 
     <?php if(isset($suppliers)){ ?>
<?php foreach ($suppliers as $items): ?>
    <tr>
        <td><?php echo $items['id']; ?></td>
        <td><?php echo $items['name']; ?></td>        
        <td><?php echo $items['price']; ?></td>   
        <td><a href="<?php echo site_url('products/addsupplier/'.$items['psid'].'/'.$formitem["id"].'/'.$items['id']);?>">Editar</a></td>
        <td><a href="<?php echo site_url('products/askremovesupplier/'.$items['psid']);?>">Remover</a></td>
        </tr>
<?php endforeach; ?>
    <?php }else{ ?>
        <tr>
            <td colspan="8">
        No elementos</td>
        </tr>
        <?php } ?>
        
</table>
<?php if ($edit) { ?>
<a class="link_button_3" href="<?php echo site_url('suppliers/usrselect/products/addsupplier/-1/'.$formitem["id"]);?>">Agregar Proveedor</a>
<?php } ?>