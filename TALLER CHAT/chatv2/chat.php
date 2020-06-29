<?php
    session_start();
    require('conexion.php');
    $conex = conectar();
    //ACTIVIDAD 1: BUSCAR LA SALA A LA QUE SE HA CONECTADO
    if($_GET['sala'])  $idsala = $_GET['sala'];
    $consultasala = "SELECT nomeGrupo FROM GRUPOS WHERE idGrupo = '$idsala'";
    $result = consultar($consultasala, $conex);
    $fila = $result -> fetch_array();
    $sala = $fila['nomeGrupo'];
    $_SESSION['idsala'] = $idsala;
    $consultamensajes = "SELECT * FRP, ,EMSAKES WHERE grupo = '0' or grupo = '$idsala'";
    $resultmsg = consultar($consultamensajes, $conex);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Sala de <?=$sala?></title>
    <style>
        h1{
            font-size:250%;
            text-align:center;
        }
    </style>
</head>
<body class = "container">
    <span> - <?=$_SESSION['usuario']?> -</span>
    <h1>Sala de <?=$sala?></h1>
    <form class = "row" action = "mensajes.php?sala=<?=$idsala?>" method = "post">
        <input class ="col s9" type = "text" name = "mensaje" id = "mensaje">
        <label class="col s2" for="todos">
            <input class="col s1" type="checkbox" name="todos" id="todos">
            <span>A todos</span>
        </label>
        <input class = "btn col s1" type = "submit" value = "&#x2794">
    </form>
    <?php
    //ACTIVIDAD2: mostrar todos los mensajes del chat por salas
    ?>
    <script>
        M.AutoInit();
    </script>
</body>
</html>