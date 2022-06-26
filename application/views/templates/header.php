<?php

/*
 * Copyright (C) 2018
 *
 */

?><!doctype html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url();?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style.css">
</head>
    <body
    style = "/*background-image: url('<?php //echo base_url();?>/images/greyzz.png');*/background-color:rgb(100,100,100,);"
    >

    <div id="wrapper">

<table id="headTitle"><tr><td> <h1>Inventario</h1> </td><td style="text-align: right;"><?php echo $realname ?></td><td style="text-align:right">
	<a href="<?php echo site_url('home/logout');?>">Salir</a> </td></tr></table>

<?php
$t_products = true;
$t_users = true;
$t_suppliers = true;
if(isset($upermissions)){

    if(strpos($upermissions, "[users.") === FALSE){
        $t_users = false;
    }
    if(strpos($upermissions, "[products.") === FALSE){
        $t_products = false;
    }
    if(strpos($upermissions, "[suppliers.") === FALSE){
        $t_suppliers = false;
    }
    if(strpos($upermissions, "*") !== FALSE){
        $t_products = true;
        $t_users = true;
        $t_suppliers = true;
    }
}
?>
<div id="navbar">
    <h6>Menu principal</h6>
<ul>

  <li><a <?php if($this->uri->segment(1) == 'home'){ ?> class="active" <?php } ?> href="<?php echo site_url('home/index');?>">Inicio</a></li>
  <?php if($t_users){ ?><li><a <?php if($this->uri->segment(1) == 'users'){ ?> class="active" <?php } ?> href="<?php echo site_url('users/index');?>">Usuarios</a></li><?php } ?>
  <?php if($t_products){ ?><li><a <?php if($this->uri->segment(1) == 'products'){ ?> class="active" <?php } ?> href="<?php echo site_url('products/index');?>">Productos</a></li><?php } ?>
  <?php if($t_suppliers){ ?><li><a <?php if($this->uri->segment(1) == 'suppliers'){ ?> class="active" <?php } ?> href="<?php echo site_url('suppliers/index');?>">Proveedores</a></li><?php } ?>
</ul>
</div>


   <div class="tabcontent">
