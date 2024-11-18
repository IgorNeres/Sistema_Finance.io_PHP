<?php
    include 'connection.php';   
    
    $id = $_GET["id_clie"];
    
    if(isset($_GET['id_clie'])){
        $sqlDelete = mysqli_query($connectionBD, "DELETE FROM cliente WHERE id_clie  = {$id}")
        or die (mysqli_error($connectionBD));
        
        header('location: ../paginas/clientes.php');
    }else{
        header('location: erro.php');
    }

?>