<?php
    require('conexion.php');
    conectar();
    //ACTIVIDAD 1: BUSCAR LA SALA A LA QUE SE HA CONECTADO
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
    
    <title>Sala de </title>
</head>
<body class = "container">
    <h1>SALA DE <??></h1>
    <form class = "row" action = "mensajes.php" method = "get">
        <input class ="col s9" type = "text" name = "mensaje" id = "mensaje">
        <label class="col s2" for="todos">
            <input class="col s1" type="checkbox" name="todos" id="todos">
            <span>A todos</span>
        </label>
        <input class = "btn col s1" type = "submit" value = "&#x2794">
    </form>
    <script>
        M.AutoInit();
    </script>
</body>
</html>