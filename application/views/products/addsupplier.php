<?php

/* 
 * Copyright (C) 2018
 * 
 */

?>
Adicionar o borrar <b><?php echo $supplier["name"]; ?></b>un produto
<b><?php echo $product["description"]; ?></b>

<br/><br/>

<?php echo form_open('products/addsupplier/'.$id."/".$product["id"]."/".$supplier["id"]); ?>

<input type="hidden" name="suppliers_id" value="<?php echo $supplier["id"]; ?>"/>
<input type="hidden" name="products_id" value="<?php echo $product["id"]; ?>"/>

Precio: <input type="input" value="<?php
            if (isset($price)) {
                echo $price;
            }
            ?>" name="price"/>
<input type="submit" value="OK"/>
</form>

