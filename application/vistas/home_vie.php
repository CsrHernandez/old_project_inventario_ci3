<?php

/* 
 * Copyright (C) 2018
 * 
 */

?>
<br/>
<div style="text-align:center">

   <h3>Hola <?php echo $username; ?>!</h3>
   </div>

   <br/><br/>
   <?php if(isset($lowitens) && count($lowitens) > 0){ ?>
	   

           <div style="width:800px;margin:0 auto">
               
           <table>
               <tr><th colspan="4">Productos con bajo stock</th></tr>
    <tr>
        <th>ID</th>
        <th>Descrpci&oacute;n</th>
        <th>Posicion</th>
        <th>Stock</th>
        
    </tr>   
    
<?php foreach ($lowitens as $items): ?>
    <tr>
        <td><?php echo $items['id']; ?></td>
        <td 
        <?php if($items["quantity"] <= $items["quantitymin"] && $items["quantitymin"] >0){ ?>
        style="color:red"
        <?php } ?>
        ><?php echo $items['description']; ?></td>        
        <td><?php echo $items['position']; ?></td>   
        <td><?php echo $items['quantity']; ?>
        <?php if($items["quantity"] <= $items["quantitymin"] && $items["quantitymin"] >0){ ?>
        (min = <?php echo  $items["quantitymin"]?>)
        <?php } ?>
        </td>  
        
       
        
        </tr>
<?php endforeach; ?>         
</table>
      </div>     
<?php } ?>
   
<br/><br/><br/><br/><br/>