<?php
    include 'connection.php';   
    
    $id = $_GET["id_clie"];
    
        $sqlDelete = mysqli_query($connectionBD, "DELETE FROM compra WHERE fk_id_clie  = {$id}")
        or die (mysqli_error($connectionBD));
        
        header('location: ../paginas/fiados.php');

?>