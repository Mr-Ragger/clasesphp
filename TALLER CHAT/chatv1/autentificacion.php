<?php
    require('conexion.php');
    $con = conectar();
    $usuario = $_POST['usuario'];
    $pwd = $_POST['pwd'];
    $sala = $_POST['sala'];
    $consultausuario = "SELECT * FROM USUARIOS WHERE usuario = '$usuario' AND pwd = '$pwd'";
    echo $consultausuario;
    $resultado = consultar($consultausuario, $con);
    var_dump($resultado);
    
    if (mysqli_num_rows($resultado) == 1){
        echo 'si';
        header("Location:chat.php?sala=$sala");
    }else{
        header("Location:index.php?error=1");
    }
?>