<?php
// Modelo
require_once 'app/model/Usuario_model.php';

$user = new Usuario_model();

// Generar nueva password

$nuePass = $user -> randomString();

// $opc = ['cost' => 8];
// $pass_hash = password_hash($nuePass, PASSWORD_BCRYPT, $opc);

// Actualizar pass en DB
if (isset($_GET['id'])) {

    $id = $_GET['id'];

// Al hacer click en aceptar, cambiar pass
if (isset($_POST['enviar'])) {
        $update = $user->updatePass($id, $nuePass);

        // Redirige a la lista
        header('location: index.php?view=lista-miembros');
}

    

}



// Vista
if (!isset($_SESSION['sucess'])) {
    header('location: index.php');
}
require_once 'app/view/intranet/nuevapass.php';


?>