<?php
    include 'connection.php';   
    
    $id = $_GET["id_prod"];
    
    if(isset($_GET['id_prod'])){
        $sqlDelete = mysqli_query($connectionBD, "DELETE FROM produto WHERE id_prod  = {$id}")
        or die (mysqli_error($connectionBD));
        
        header('location: ../paginas/produtos.php');
    }else{
        header('location: erro.php');
    }

?>