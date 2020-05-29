<?php

// Modelo
	require_once 'app/model/Usuario_model.php';

    $login = new Usuario_model();
    $sucess = false;

if (!empty($_POST)) {  
 
    $user = htmlentities(addslashes($_POST['loguser']));
    $pass = htmlentities(addslashes($_POST['logpass']));

    
    // // Password hash
    // $opc = ['cost' => 8]; // Coste
    
    // $pass_hash = password_hash($pass, PASSWORD_BCRYPT, $opc);

    // echo $pass_hash;
    $matrizUsuario = $login -> comprobarUsuario($user,$pass);
    
    if ($matrizUsuario > 0) {

        session_start();
        $_SESSION['sucess'] = true;
        $_SESSION['usuario'] = $user;
        header('index.php');
        // $matrizTipo = $login -> tipoUsuario($user, $pass);
        // $_SESSION['tipo'] = $matrizTipo;
        $tipoUsuario = $login->tipoUsuario($_SESSION['usuario']);
        foreach ($tipoUsuario as $user) {
        
            // echo $tipoUsuario;
        $_SESSION['tipo'] = $user['us_tipo'];
        }
    }
    
    
} else {
    // echo "Not submited";
}







// Vista
if (isset($_SESSION['sucess'])) {
    header('location: index.php'); 
        
    } else {
    // $_SESSION['sucess'] = false;
    require_once 'app/view/login.php';
    

    }
   
    


    ?>