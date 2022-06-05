<?php

include '../include/configuracion.php';
include '../modelo/usuario.Class.php';
switch ($_POST["tipoformulario"]) {
    case '1':
        iniciosession($_POST, $db);
        break;
    
    case '2':
        registrousuario($_POST, $db);
        break;
    
    default:
        
        break;
}
function registrousuario($datos, $db)
{
    $user = new Usuario($db);

    echo $user->insertarUsuario($datos);
}

function iniciosession($datos, $db){
    $user = new Usuario($db);

    $dat = $user->iniciosession($datos);
    if (Count($dat) > 0) {
        echo 'true';
        session_start();
        $_SESSION['usuario_logueado'] = $dat[0]["correo"];
    }else{
        echo 'false';
    }
}

?>