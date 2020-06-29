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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>Sala de <?=$sala?></title>
    <style>
        h1{
            font-size:250%;
            text-align:center;
        }
    </style>
    <script>
        //Cuando la página esté cargada completamente
        $(document).ready(function(){
            //Cada segundo (1000 milisegundos) se ejecutará la función refrescar
            setTimeout(refrescar, 1000);
        });
        function refrescar(){
            //Actualiza la página
            location.reload();
        }
    </script>
</head>
<body class = "container">
        <?php
        //ACTIVIDAD 3: haz un link en el nombre del usuario que permita destruir la sesión al pulsar y volver al index
        ?>
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
    <table> 
    <tr>
        <th>Fecha</th>
        <th>Usuario</th>
        <th>Mensaje</th>
        <th></th>
    </tr>  
    <?php
        //ACTIVIDAD 2: mostrar todos los mensajes del chat por salas
        $consultamensajes= "SELECT * FROM MENSAJESALA WHERE grupo='$idsala' or grupo = '0' ORDER BY fechaHora DESC";
        $resultadomensajes = consultar($consultamensajes,$conex);
        while($filas = $resultadomensajes -> fetch_array()){
            if($filas['grupo']==0){
               $altavoz="\u{1F4E3}";
            }else{
                $altavoz='';
            }
            if($filas['usuario']==$_SESSION['usuario']){
                $eliminar="\u{274C}";
            }else{
                $eliminar='';
            }
            echo '<tr><td>'.$filas['fechaHora'].'</td><td>'.$filas['usuario'].'</td><td>'.$altavoz.' '.$filas['mensaje'].'</td><td>'.$eliminar.'</td></tr>';
        }
        //ACTIVIDAD 4: Haz un link en la cruz que permita eliminar mensajes a los usuarios
    ?>
    </table>

    <script>
        M.AutoInit();
    </script>
</body>
</html>