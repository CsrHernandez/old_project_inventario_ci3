<?php

/* 
 * Copyright (C) 2018
 * 
 */

?>

Modificar producto <b><?php echo $product["description"]; ?>.</b>

<?php echo form_open('products/stockio/' . $id . '/'. $in); ?>

<?php if($in){ ?>
<h2>Entrada de Material</h2>
<?php }else{ ?>
<h2>Salida de Material</h2>
<?php } ?>

<?php echo $product["description"] ?><br/>

Cantidad: <input type="input" name="quantity" value="0"/>
<input type="submit" value="OK"/>

</form>