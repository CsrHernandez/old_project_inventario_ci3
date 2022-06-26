<?php

/* 
 * Copyright (C) 2018
 *
 */

?>

<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php if($edit)echo form_open('users/create/'.$id); else echo form_open('users/create'); ?>

    <label for="realname">Nombre</label>
    <input type="input" name="realname" value="<?php if(isset($user)){ echo $user["realname"]; } ?>"/><br/>
    
    <label for="username" >Usuario</label>
    <input type="input" name="username" value="<?php if(isset($user)){ echo $user["username"]; } ?>"/><br/>
    
    <label for="password">Contrase&ntilde;a</label>
    <input type="password" name="password"/><br/>
    
    <label for="obs">Obs.</label>
    <textarea name="obs"><?php if(isset($user)){ echo $user["obs"]; } ?></textarea><br />

    <label for="uprofiles_id">Permiso</label>
    <!--<input type="input" name="uprofiles_id" value="<?php if(isset($user)){ echo $user["uprofiles_id"]; } ?>"><br/>-->
    <select name="uprofiles_id" id="">
        <option value="<?php if(isset($user)){ echo $user["uprofiles_id"]; } ?>"><?php if(isset($user)){ echo $user["uprofiles_id"]; } ?></option>
        <option value="1">1</option>
        <option value="2">2</option>
    </select><br/>

    <?php if($edit){ ?>
    <input type="submit" name="submit" value="Actualizar" />
    <?php }else { ?>
    <input type="submit" name="submit" value="Crear" />
    <?php } ?>

</form>

