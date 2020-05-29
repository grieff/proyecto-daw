<!DOCTYPE html>
<html lang="en">

<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>



<!-- Contenido partituras -->
<h1 class="header-h1">Partituras</h1>

<div id="lista-partituras">
    <!-- Buttons -->
    <div class="buttons-miembros">
        <?php if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) { ?>
            <a href="index.php?view=partitura" type="button" class="btn btn-elegant"><i class="fas fa-plus-circle pr-2"></i></i>Añadir Partitura </a>
            <a href="index.php?view=lista-partituras" class="btn btn-elegant"><i class="fas fa-sync pr-2" aria-hidden="true"></i> Actualizar</a>
        <?php } ?>
    </div>


    <!-- Tabla lista -->
    <div class="table-responsive-md tabla-miembros">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Compositor</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ruta</th>
                    <?php if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) { ?>
                        <th scope="col">Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaPartituras as $part) {
                    echo "<tr>";
                    echo "<td>" . $part['part_titulo'] . "</td>";
                    echo "<td>" . $part['part_compositor'] . "</td>";
                    if ($part['part_tipo'] == 0) {
                        echo '<td> Marcha de procesion </td>';
                    } elseif ($part['part_tipo'] == 1) {
                        echo '<td> Concierto </td>';
                    } elseif ($part['part_tipo'] == 2) {
                        echo '<td> Pasodoble </td>';
                    } elseif ($part['part_tipo'] == 3) {
                        echo '<td> Otro </td>';
                    } elseif ($part['part_tipo'] == 5) {
                        echo '<td> Pasodoble taurino </td>';
                    }
                    echo "<td><a href='" . $part['part_ruta'] . "' target='_blank'><i class='fas fa-external-link-alt'></i> Descargar</a></td>";


                    if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) {
                        echo "<td>";
                        // Edicion
                        echo "<a href=index.php?view=editarpart&id=" . $part['part_id'] . "><i class='fas fa-edit'></i></a>";
                        
                    }

                    if ($_SESSION['tipo'] == 50) {

                        // Eliminar
                        echo "<a href=index.php?view=deletepart&id=" . $part['part_id'] . "><i class='fas fa-trash'></i></a>";
                    }

                    echo "</td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

</div>






<!-- Pie -->
<!-- Incluye scripts -->
<?php include 'app/view/inc/footer.php'; ?>