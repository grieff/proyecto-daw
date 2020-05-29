<!DOCTYPE html>
<html lang="en">

<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>



<!-- Contenido calendario inner -->
<h1 class="header-h1">Calendario miembros</h1>
<!-- Buttons -->
<div class="buttons-miembros">
    <?php if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) { ?>
        <a href="index.php?view=eventonuevo" type="button" class="btn btn-elegant"><i class="fas fa-calendar-plus pr-2"></i></i>Añadir Evento </a>
        <a href="index.php?view=lista-evento" class="btn btn-elegant"><i class="fas fa-calendar-alt pr-2"></i></i> Editar eventos</a>
        <a href="index.php?view=eventos-miembros" class="btn btn-elegant"><i class="fas fa-sync pr-2" aria-hidden="true"></i> Actualizar</a>
    <?php } ?>
</div>
<div id="inner-calendar">
    <div id="calendar"></div>
</div>





<!-- Pie -->
<!-- Incluye scripts -->
<?php include 'app/view/inc/footer.php'; ?>