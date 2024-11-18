<?php
    include 'connection.php';   
    
    $id = $_GET["id_com"];
    
    $sqlDelete = mysqli_query($connectionBD, "DELETE FROM compra WHERE id_com  = {$id}")
    or die (mysqli_error($connectionBD));
        
    header('location: ../paginas/fiados.php');

?>