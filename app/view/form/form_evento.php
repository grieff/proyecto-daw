<!DOCTYPE html>
<html lang="en">

<!-- Header y nav -->
<?php include 'app/view/inc/header.php';
include 'app/controller/nuevoEvento.php'; ?>

<div class="header-h1">Nuevo evento</div>
<div class="form">
    <form action="" method="POST" name="formulario_ev">
        <div class="row">
            <div class="col">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" maxlength="50" required><br>
            </div>
            <br>

            <div class="col">
                <label for="tipo">Tipo</label><br>
                <select name="tipo" class="form-control" required>
                    <option value="0"> Procesión </option>
                    <option value="1"> Concierto </option>
                    <option value="2"> Pasacalles</option>
                    <option value="5"> Toros </option>
                    <option value="4"> Especial </option>
                    <option value="50"> Ensayo</option>
                    <option value="60"> Ensayo Especial </option>
                    <option value="100"> Especial (miembros) </option>
                </select> <br>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="No obligatorio"><br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="fecha-inicio">Fecha inicio</label>
                <input type="text" name="fecha-inicio" id="datetimepicker-inicio" class="form-control" required><input type="time" name="hora-inicio" class="form-control" required id="hora-inicio">
                <br>
            </div><br><br>

            <div class="col">
                <label for="fecha-fin">Fecha fin</label>
                <input type="text" name="fecha-fin" id="datetimepicker-fin" class="form-control" required><input type="time" name="hora-fin" id="hora-fin" class="form-control" required>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" required><br>
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