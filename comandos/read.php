<?php
    include 'connection.php';
    $listaSQL_clie = mysqli_query($connectionBD, "SELECT * FROM cliente ORDER BY nome_clie ASC");
    $listaSQL_prod = mysqli_query($connectionBD, "SELECT * FROM produto");
?>