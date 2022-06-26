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
    echo form_open('suppliers/create/' . $id);
else
    echo form_open('suppliers/create');
?>

<table>

<?php if ($edit) { ?>
        <tr>
            <td>ID:</td><td> <?php echo $formitem["id"]; ?></td>
        </tr>
<?php } ?>

    <tr>
        <td>
            <label for="name">Nombre</label></td><td>
            <input size="50" type="input" name="name" value="<?php
            if (isset($formitem)) {
                echo $formitem["name"];
            }
            ?>"/></td>
    </tr>
    <tr>
        <td>
            <label for="email" >Email</label></td><td>
            <input type="input" name="email" value="<?php
            if (isset($formitem)) {
                echo $formitem["email"];
            }
            ?>"/></td>
    </tr>
    <tr>
        <td>
            <label for="contact">Contacto</label>
        </td>
        <td>
            <textarea name="contact"><?php
                if (isset($formitem)) {
                    echo $formitem["contact"];
                }
                ?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <label for="address">Direcci&oacute;n</label>
        </td>
        <td>
            <textarea name="address"><?php
                if (isset($formitem)) {
                    echo $formitem["address"];
                }
                ?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <label for="obs">Obs.</label>
        </td>
        <td>
            <textarea name="obs"><?php
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

