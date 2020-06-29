<?php
    function conectar(){
        $conexion = new mysqli('localhost','root','','chat');
        $conexion -> set_charset("utf8");
        return $conexion;
    }
    function consultar($consulta, $conexion){
        $resultado = $conexion -> query($consulta);
        return $resultado;
    }
?>