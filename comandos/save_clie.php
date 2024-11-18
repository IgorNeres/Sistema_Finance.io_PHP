<?php 
include 'connection.php';

$nome = $connectionBD->real_escape_string($_POST['nome']);
$telefone = $connectionBD->real_escape_string($_POST['telefone']);
$endereco = $connectionBD->real_escape_string($_POST['endereco']);

$stmt = $connectionBD->prepare("INSERT INTO cliente (nome_clie, telefone_clie, endereco_clie) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $telefone, $endereco);

if ($stmt->execute()) {
    header('location: ../paginas/clientes.php');
} else {
    header('location: erro.php');
}

$stmt->close();
?>
