<!DOCTYPE html>
<html lang="en">

<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>

<?php
require_once 'app/controller/usuario.php'; // controler


// echo $newpass .'<br>';
// echo $passuser;
$info_pass = 'La contraseña se genera automáticamente y no puede ser cambiada, salvo que se recarge la página. Este campo no puede modificarse. ';
$info_user = 'El usuario debe ser generado haciendo click en el botón. Para que se genere correctamente deben estar rellenados los campos de Nombre y Apellidos. ';


?>

<div class="header-h1">Nuevo miembro</div>

<input type="hidden" name="usuario" value="" id="huser">
<div class="form">
    <form action="index.php?view=miembro" method="POST" name="formulario_user">
        <div class="row">
            <div class="col">
                <label for="name"> Nombre</label>
                <input type="text" name="nombre" class="form-control" maxlength="50" required id="mnombre">
                <br>
            </div>
            <div class="col">
                <label for="surname"> Apellidos </label>
                <input type="text" name="surname" class="form-control" maxlength="50" required id="mapellido">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="name"> Usuario <i class="fas fa-info-circle icon-style" title="<?php echo $info_user; ?>"></i> </label>
                <input type="text" name="useregister" class="form-control readonly" maxlength="50" required onkeypress="return false;" placeholder="Haga click en generar usuario" id="muser">
                <br>
            </div>
            <div class="col">
                <label for="surname"> Contraseña <i class="fas fa-info-circle icon-style" title="<?php echo $info_pass; ?>"></i></label>
                <input type="text" name="passregister" class="form-control" maxlength="50" required onkeypress="return false;" value="<?= $passuser ?>" id="mpass">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="mail"> Email </label> <input type="email" name="mail" class="form-control" placeholder="No obligatorio">
                <br>
            </div>
            <div class="col">
                <label for="phone"> Teléfono </label> <input type="number" name="phone" class="form-control" maxlength="9" placeholder="No obligatorio">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="instrument"> Instrumento </label> <select name="instrument" id="instrument" class="form-control" required>
                    <option value="-"> - </option>
                    <option value="Bombardino"> Bombardino </option>
                    <option value="Clarinete"> Clarinete </option>
                    <option value="Clarinete bajo"> Clarinete bajo </option>
                    <option value="Fagot"> Fagot </option>
                    <option value="Flauta"> Flauta </option>
                    <option value="	Fliscorno"> Fliscorno </option>
                    <option value="Oboe"> Oboe </option>
                    <option value="Percusión"> Percusión </option>
                    <option value="Requinto"> Requinto </option>
                    <option value="Saxofon Alto"> Saxofon Alto </option>
                    <option value="Saxofon Baritono"> Saxofon Baritono </option>
                    <option value="Saxofon Tenor"> Saxofon Tenor </option>
                    <option value="Trombón"> Trombón </option>
                    <option value="Trompa"> Trompa </option>
                    <option value="Trompeta"> Trompeta </option>
                    <option value="Tuba"> Tuba </option>
                </select> <br>
            </div>
            <div class="col">
                <label for="rol"> Rol </label> <select name="rol" id="rol" class="form-control" required>
                    <option value="Miembro"> Miembro </option>
                    <option value="Junta Directiva"> Junta Directiva </option>
                    <option value="Presidente"> Presidente </option>
                    <option value="Director"> Director </option>
                </select> <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="fechaentrada"> Fecha entrada </label>
                <input type="text" name="fechaentrada" id="datepicker" class="form-control" required>
                <br>
            </div>
            <div class="col">
                <label for="active"> ¿Es un miembro en activo ? </label> <br><span class="vspace"></span>
                <input type="radio" name="active" id="activeyes" class="vspace" <?php if (isset($activo)) echo "checked"; ?> value="1">
                <label for="activeyes"> Activo </label> <span class="spaceform"></span>
                <input type="radio" name="active" id="activeno" class="vspace" value="0">
                <label for="activeno"> Inactivo </label>
            </div>
        </div>



        <button type="button" class="btn btn-elegant" onclick="generarUser();"><i class="far fa-user pr-2" aria - hidden="true"></i>Generar usuario</button>
        <input type="submit" name="enviar" value="Aceptar" class="input_form btn btn-elegant">

        <input type="reset" name="reset" value="Cancelar" class="input_form btn btn-elegant">
        <a href="index.php?view=lista-miembros" class="btn btn-elegant"> Lista Miembros </a>
    </form>
</div>


<!-- Datepicker -->
<script>
    $(function() {
        console.log('working');
        $("#datepicker").datepicker({
            format: "yyyy-mm-dd",
            language: 'es'
        });

    });
</script>
<!-- Pie-->
<?php include 'app/view/inc/footer.php'; ?>