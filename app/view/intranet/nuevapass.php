<!DOCTYPE html>
<html>
<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>

<h1 class="header-h1">Miembros</h1>
<div id="intranet-password">

    <!-- Buttons -->
    <div class="buttons-miembros">
        <?php if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) { ?>
            <a href="index.php?view=lista-miembros" class="btn btn-elegant"><i class="fas fa-long-arrow-alt-left pr-2" aria-hidden="true"></i> Volver</a>
        <?php } ?>
    </div>

    <div class="password">
        <form action="" method="post" id="form-pass">
            <h4 style="color:darkred">Al hacer click en aceptar, la contraseña anterior se cambiará por la que se muestra en pantalla. <br> No se podrá recuperar la contraseña anterior. </h4>
            <br>
            <div class="row">
                <div class="col-12">
                    <label for="active">Nueva contraseña</label><br>
                    <input type="text" name="nuevapass" class="form-control passnueva" value="<?php echo $nuePass ?>" required onkeypress="return false;" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <input type="submit" name="enviar" value="Actualizar" class="input_form btn btn-elegant">
                </div>
            </div>
        </form>
    </div>


</div>










<!-- Pie -->
<!-- Incluye scripts -->
<?php include 'app/view/inc/footer.php'; ?>