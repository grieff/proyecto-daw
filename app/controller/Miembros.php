<?php
// Modelo
require_once 'app/model/Miembro_model.php';
require_once 'app/model/Usuario_model.php';


$intranet_miembros = new Miembro_model();
$intranet_user = new Usuario_model();

$nregistros = $intranet_miembros -> allMembers();


$reg_pag = 20; // Registros por pagina

// Seleccion de pagina para mostrar registros
if (isset($_GET['pag'])) {

    $pag = $_GET['pag'];

} else {
    $pag = 1; // Pagina inicial
}



$start = ($pag - 1) * $reg_pag; // Inicio registros

$total_pag = ceil($nregistros / $reg_pag); // Numero total pag

$listaMiembros = $intranet_miembros -> obtenerListaMiembros($start, $reg_pag);














// Vista

if (!isset($_SESSION['sucess'])) {
    header('location: index.php');
}
require_once 'app/view/intranet/inner_miembros.php';



?>
