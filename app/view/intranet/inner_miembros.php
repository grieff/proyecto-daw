<!DOCTYPE html>
<html>
<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>

<h1 class="header-h1">Lista Miembros</h1>
<div id="intranet-miembros">

    <!-- Buttons -->
    <div class="buttons-miembros">
        <?php if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) { ?>
            <a href="index.php?view=miembro" type="button" class="btn btn-elegant"><i class="fas fa-user-plus pr-2"></i>Añadir Miembro </a>
            <a href="index.php?view=lista-miembros" class="btn btn-elegant"><i class="fas fa-sync pr-2" aria-hidden="true"></i> Actualizar</a>
        <?php } ?>
    </div>

    <!-- Paginacion -->
    <div class="pg-miembros">
        <ul class="pagination pg-blue pg-miembros">
            <?php if (isset($_GET['pag']) && $_GET['pag'] != 1) { ?>
                <li class="page-item"><a class="page-link" href="index.php?view=lista-miembros&pag=<?php echo ($_GET['pag'] - 1) ?>">Anterior</a></li>
            <?php };

            for ($i = 1; $i <= ($total_pag); $i++) {
                echo '<li class="page-item">';
                echo '<a class="page-link" href="index.php?view=lista-miembros&pag=' . $i . '">';
                echo $i . '</a></li>';
            }

            if (!isset($_GET['pag']) ||  $_GET['pag'] != $total_pag) {  ?>
                <li class="page-item"><a class="page-link" href="index.php?view=lista-miembros&pag=<?php if (isset($_GET['pag'])) echo ($_GET['pag'] + 1);
                                                                                                    else echo '2'; ?>">Siguiente</a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- Tabla lista -->
    <div class="table-responsive-md tabla-miembros">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Instrumento</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Activo</th>
                    <?php if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) { ?>
                        <th scope="col">Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaMiembros as $miembro) {
                    echo "<tr>";
                    echo "<td>" . $miembro['us_username'] . "</td>";
                    echo "<td>" . $miembro['m_nombre'] . "</td>";
                    echo "<td>" . $miembro['m_apellidos'] . "</td>";
                    echo "<td>" . $miembro['m_instrumento'] . "</td>";
                    echo "<td>" . $miembro['m_rol'] . "</td>";
                    if ($miembro['m_activo'] == 1) {
                        echo '<td> <i class="fas fa-user-check"></i> </td>';
                    } else {
                        echo '<td> <i class="fas fa-user-slash"></i> </td>';
                    }

                    if ($_SESSION['tipo'] == 20 || $_SESSION['tipo'] == 50) {

                        echo "<td>";
                        // Edicion
                        echo "<a href=index.php?view=editarmiembro&id=" . $miembro['us_id'] . "><i class='fas fa-edit'></i></a>";

                        echo "<span class='pr-2'></span>";

                        // Pass
                        echo "<a href=index.php?view=nuevapass&id=" . $miembro['us_id'] . "><i class='fas fa-key'></i></a>";

                        echo "<span class='pr-2'></span>";
                    }
                    if ($_SESSION['tipo'] == 50) {

                        // Eliminar
                        echo "<a href=index.php?view=deletemiembro&id=" . $miembro['us_id'] . "><i class='fas fa-trash'></i></a>";
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