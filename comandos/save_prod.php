<?php 
include 'connection.php';

$nome = $connectionBD->real_escape_string($_POST['nome']);
$codigo = $connectionBD->real_escape_string($_POST['codigo']);
$qtd_caixa = floatval($_POST['qtd_fardo']);
$preco_caixa = floatval($_POST['preco_fardo']);
$preco_suj = ($preco_caixa / $qtd_caixa) * 1.3;

$stmt = $connectionBD->prepare("INSERT INTO produto (nome_prod, cod_prod, qtd_caixa, preco_caixa, preco_sujerido) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssidd", $nome, $codigo, $qtd_caixa, $preco_caixa, $preco_suj);

if ($stmt->execute()) {
    header('location: ../paginas/produtos.php');
} else {
    header('location: erro.php');   
}

$stmt->close();
?>
