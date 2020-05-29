<!DOCTYPE html>
<html lang="en">

<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>

<?php
include 'app/controller/editUsuario.php';

$selected = 'selected="selected"';


?>
<div class="header-h1">Editar miembro</div>
<div class="form">
    <form action="" method="POST" name="formulario_user">
        <div class="row">
            <div class="col">
                <label for="name">Nombre</label>
                <input type="text" name="nombre" class="form-control" maxlength="50" required value="<?php echo $nombre ?>"><br>
            </div>
            <div class="col">
                <label for="surname">Apellidos</label>
                <input type="text" name="surname" class="form-control" maxlength="50" required value="<?php echo $apellido ?>"><br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="mail">Email</label>
                <input type="email" name="mail" class="form-control" placeholder="No obligatorio" value="<?php echo $email ?>"><br>
            </div>
            <div class="col">
                <label for="phone">Teléfono</label>
                <input type="number" name="phone" class="form-control" maxlength="9" placeholder="No obligatorio" value="<?php echo $telefono ?>"><br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="instrument">Instrumento</label>
                <select name="instrument" id="instrument" class="form-control" required>
                    <option value="-" <?php if ($instrumento == "-")  echo $selected;  ?>> - </option>
                    <option value="Bombardino" <?php if ($instrumento == "Bombardino")  echo $selected;  ?>> Bombardino </option>
                    <option value="Clarinete" <?php if ($instrumento == "Clarinete")  echo $selected;  ?>> Clarinete </option>
                    <option value="Clarinete bajo" <?php if ($instrumento == "Clarinete bajo")  echo $selected;  ?>> Clarinete bajo </option>
                    <option value="Fagot" <?php if ($instrumento == "Fagot")  echo $selected;  ?>> Fagot </option>
                    <option value="Flauta" <?php if ($instrumento == "Flauta")  echo $selected;  ?>> Flauta </option>
                    <option value="Fliscorno" <?php if ($instrumento == "Fliscorno")  echo $selected;  ?>> Fliscorno </option>
                    <option value="Oboe" <?php if ($instrumento == "Oboe")  echo $selected;  ?>> Oboe </option>
                    <option value="Percusión" <?php if ($instrumento == "Percusión")  echo $selected;  ?>> Percusión </option>
                    <option value="Requinto" <?php if ($instrumento == "Requinto")  echo $selected;  ?>> Requinto </option>
                    <option value="Saxofon Alto" <?php if ($instrumento == "Saxofon Alto")  echo $selected;  ?>> Saxofon Alto </option>
                    <option value="Saxofon Baritono" <?php if ($instrumento == "Saxofon Baritono")  echo $selected;  ?>> Saxofon Baritono </option>
                    <option value="Saxofon Tenor" <?php if ($instrumento == "Saxofon Tenor")  echo $selected;  ?>> Saxofon Tenor </option>
                    <option value="Trombón" <?php if ($instrumento == "Trombón")  echo $selected;  ?>> Trombón </option>
                    <option value="Trompa" <?php if ($instrumento == "Trompa")  echo $selected;  ?>> Trompa </option>
                    <option value="Trompeta" <?php if ($instrumento == "Trompeta")  echo $selected;  ?>> Trompeta </option>
                    <option value="Tuba" <?php if ($instrumento == "Tuba")  echo $selected;  ?>> Tuba </option>
                </select><br>
            </div>
            <div class="col">
                <label for="rol">Rol</label>
                <select name="rol" id="rol" class="form-control" required>
                    <option value="Miembro" <?php if ($rol == "Miembro")  echo $selected;  ?>> Miembro </option>
                    <option value="Junta Directiva" <?php if ($rol == "Junta Directiva")  echo $selected;  ?>> Junta Directiva </option>
                    <option value="Presidente" <?php if ($rol == "Presidente")  echo $selected;  ?>> Presidente </option>
                    <option value="Director" <?php if ($rol == "Director")  echo $selected;  ?>> Director </option>
                </select> <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="fechaentrada">Fecha entrada</label>
                <input type="text" name="fechaentrada" id="datepicker" class="form-control" required value="<?php echo $fecha ?>"><br>
            </div>
            <div class="col">
                <label for="active">¿Es un miembro en activo?</label><br>
                <input type="radio" name="active" id="activeyes" <?php if (isset($activo) && $activo == 1) echo "checked"; ?> value="1"> <label for="activeyes">Activo</label> <span class="spaceform"></span>
                <input type="radio" name="active" id="activeno" <?php if (isset($activo) && $activo == 0) echo "checked"; ?> value="0"> <label for="activeno">Inactivo</label>
            </div>
        </div>






        <input type="submit" name="enviar" value="Actualizar" class="input_form btn btn-elegant">

        <input type="reset" name="reset" value="Cancelar" class="input_form btn btn-elegant">
        <a href="index.php?view=lista-miembros" class="btn btn-elegant">Lista Miembros</a>
    </form>

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


    <!-- Pie -->
    <!-- Incluye scripts -->
    <?php include 'app/view/inc/footer.php'; ?>