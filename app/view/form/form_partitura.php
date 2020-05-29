<!DOCTYPE html>
<html lang="en">

<!-- Header y nav -->
<?php include 'app/view/inc/header.php';
require_once 'app/controller/nuevaPart.php'; // controler
?>
<div class="header-h1">Añadir partitura</div>

<div class="form">
    <form action="" method="POST" name="formulario_part">
        <div class="row">
            <div class="col">
                <label for="name"> Titulo</label>
                <input type="text" name="titulo" class="form-control" maxlength="100" required>
                <br>
            </div>
            <div class="col">
                <label for="surname"> Compositor </label>
                <input type="text" name="compositor" class="form-control" maxlength="100" required>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="fechaentrada"> Ruta </label>
                <input type="text" name="ruta" class="form-control" required>
                <br>
            </div>
            <div class="col">
                <label for="rol"> Tipo </label> <select name="tipo" class="form-control" required>
                    <option value="0"> Marcha Procesión </option>
                    <option value="1"> Concierto </option>
                    <option value="2"> Pasodoble </option>
                    <option value="5"> Pasodoble taurino </option>
                    <option value="3"> Otro </option>
                </select> <br>
            </div>
        </div>




        <input type="submit" name="enviar" value="Aceptar" class="input_form btn btn-elegant">

        <input type="reset" name="reset" value="Cancelar" class="input_form btn btn-elegant">
        <a href="index.php?view=lista-partituras" class="btn btn-elegant"> Lista Partituras </a>
    </form>
</div>











<!-- Pie-->
<?php include 'app/view/inc/footer.php'; ?>