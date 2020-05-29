<!DOCTYPE html>
<html>
<!-- Header y nav -->
<?php include 'app/view/inc/header.php';
include 'app/controller/listaEventos.php' ?>

<h1 class="header-h1">Lista Eventos</h1>
<div id="intranet-miembros">

    <!-- Buttons -->
    <div class="buttons-miembros">
        <?php if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) { ?>
            <a href="index.php?view=eventonuevo" type="button" class="btn btn-elegant"><i class="fas fa-user-plus pr-2"></i>Añadir Evento </a>
            <a href="index.php?view=lista-evento" class="btn btn-elegant"><i class="fas fa-sync pr-2" aria-hidden="true"></i> Actualizar</a>
        <?php } ?>
    </div>

    <!-- Paginacion -->
    <div class="pg-miembros">
        <ul class="pagination pg-blue pg-miembros">
            <?php if (isset($_GET['pag']) && $_GET['pag'] != 1) { ?>
                <li class="page-item"><a class="page-link" href="index.php?view=lista-evento&pag=<?php echo ($_GET['pag'] - 1) ?>">Anterior</a></li>
            <?php };

            for ($i = 1; $i <= ($total_pag); $i++) {
                echo '<li class="page-item">';
                echo '<a class="page-link" href="index.php?view=lista-evento&pag=' . $i . '">';
                echo $i . '</a></li>';
            }

            if (!isset($_GET['pag']) ||  $_GET['pag'] != $total_pag) {  ?>
                <li class="page-item"><a class="page-link" href="index.php?view=lista-evento&pag=<?php if (isset($_GET['pag'])) echo ($_GET['pag'] + 1);
                                                                                                    else echo '2'; ?>">Siguiente</a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- Tabla lista -->
    <div class="table-responsive-md tabla-miembros">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha fin</th>
                    <th scope="col">Ubicación</th>
                    <?php if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) { ?>
                        <th scope="col">Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaEventos as $evento) {
                    echo "<tr>";
                    echo "<td>" . $evento['ev_titulo'] . "</td>";
                
                    if ($evento['ev_tipo'] == 0) {
                        echo '<td> Procesión </td>';
                    } elseif
                    ($evento['ev_tipo'] == 1) {
                        echo '<td> Concierto </td>';
                    } elseif ($evento['ev_tipo'] == 2) {
                        echo '<td> Pasacalles </td>';
                    } elseif ($evento['ev_tipo'] == 4) {
                        echo '<td> Especial </td>';
                    } elseif ($evento['ev_tipo'] == 5) {
                        echo '<td> Toros </td>';
                    } elseif ($evento['ev_tipo'] == 50) {
                        echo '<td> Ensayo </td>';
                    } elseif ($evento['ev_tipo'] == 60) {
                        echo '<td> Ensayo Especial</td>';
                    } elseif ($evento['ev_tipo'] == 100) {
                        echo '<td> Especial (miembros) </td>';
                    }

                    echo "<td>" . $evento['ev_fechainicio'] . "</td>";
                    echo "<td>" . $evento['ev_fechafin'] . "</td>";

                    echo "<td>" . $evento['ev_ubicacion'] . "</td>";
                    

                    if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) {

                        echo "<td>";
                        // Edicion
                        echo "<a href=index.php?view=editarevento&id=" . $evento['ev_id'] . "><i class='fas fa-edit'></i></a>";

                        echo "<span class='pr-2'></span>";

                        
                    }
                    if ($_SESSION['tipo'] == 50) {

                        // Eliminar
                        echo "<a href=index.php?view=deletevento&id=" . $evento['us_id'] . "><i class='fas fa-trash'></i></a>";
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