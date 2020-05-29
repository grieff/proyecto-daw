<!DOCTYPE html>
<html lang="en">

<!-- Header y nav -->
<?php include 'app/view/inc/header.php';
include 'app/controller/editEvento.php';
$selected = 'selected="selected'; ?>

<div class="header-h1">Editar evento</div>
<div class="form">
    <form action="" method="POST" name="formulario_ev">
        <div class="row">
            <div class="col">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" maxlength="50" required value="<?php echo $titulo ?>"><br>
            </div>
            <br>

            <div class="col">
                <label for="tipo">Tipo</label><br>
                <select name="tipo" class="form-control" required>
                    <option value="0" <?php if ($tipo == 0) echo $selected ?>> Procesión </option>
                    <option value="1" <?php if ($tipo == 1) echo $selected ?>> Concierto </option>
                    <option value="2" <?php if ($tipo == 2) echo $selected ?>> Pasacalles</option>
                    <option value="5" <?php if ($tipo == 5) echo $selected ?>> Toros </option>
                    <option value="4" <?php if ($tipo == 4) echo $selected ?>> Especial </option>
                    <option value="50" <?php if ($tipo == 50) echo $selected ?>> Ensayo</option>
                    <option value="60" <?php if ($tipo == 60) echo $selected ?>> Ensayo Especial </option>
                    <option value="100" <?php if ($tipo == 100) echo $selected ?>> Especial (miembros) </option>
                </select> <br>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="No obligatorio" value="<?php echo $descripcion ?>"><br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="fecha-inicio">Fecha inicio</label>
                <input type="text" name="fecha-inicio" id="datetimepicker-inicio" class="form-control" required value="<?php echo $diainicio ?>"><input type="time" name="hora-inicio" class="form-control" required id="hora-inicio" value="<?php echo $horainicio ?>">
                <br>
            </div><br><br>

            <div class="col">
                <label for="fecha-fin">Fecha fin</label>
                <input type="text" name="fecha-fin" id="datetimepicker-fin" class="form-control" required value="<?php echo $diafin ?>"><input type="time" name="hora-fin" id="hora-fin" class="form-control" required value="<?php echo $horafin ?>">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" required value="<?php echo $ubicacion ?>"><br>
            </div>

        </div>






        <input type="submit" name="enviar" value="Aceptar" class="input_form btn btn-elegant">

        <input type="reset" name="reset" value="Cancelar" class="input_form btn btn-elegant">
        <a href="index.php?view=eventos-miembros" class="btn btn-elegant">Calendario Miembros</a>
    </form>

    <script>
        $('#datetimepicker-inicio').datepicker({
            format: "yyyy-mm-dd",
            language: 'es'
        });
        $('#datetimepicker-fin').datepicker({
            format: "yyyy-mm-dd",
            language: 'es'
        });
    </script>




    <!-- Pie -->
    <!-- Incluye scripts -->
    <?php include 'app/view/inc/footer.php'; ?>