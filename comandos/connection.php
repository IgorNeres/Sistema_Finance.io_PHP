<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbName = "fiadophp";

    $connectionBD = mysqli_connect($server, $user, $password, $dbName);

    if(!$connectionBD){
        echo "Erro ao conectar :(";
    }
?>