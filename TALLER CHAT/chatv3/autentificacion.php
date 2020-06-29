<?php
    session_start();
    require('conexion.php');
    $con = conectar();
    $usuario = $_POST['usuario'];
    $pwd = $_POST['pwd'];
    $sala = $_POST['sala'];
    $consultausuario = "SELECT * FROM USUARIOS WHERE usuario = '$usuario' AND pwd = '$pwd'";
    $resultado = consultar($consultausuario, $con);
    $fila = $resultado -> fetch_array();
    $idusuario = $fila['idUsuario'];
    $_SESSION['idusuario'] = $idusuario;
    if (mysqli_num_rows($resultado) == 1){
        $_SESSION['usuario'] = $usuario;
        header("Location:chat.php?sala=$sala");
    }else{
        header("Location:index.php?error=1");
    }
?>