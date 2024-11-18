<?php
include '../comandos/connection.php';

if (isset($_GET['id_prod'])) {
    $id = intval($_GET['id_prod']);
    $stmt = $connectionBD->prepare("SELECT * FROM produto WHERE id_prod = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $n = $result->fetch_assoc();
        $nome = $n['nome_prod'];
        $codigo = $n['cod_prod'];
        $qtd_caixa = $n['qtd_caixa'];
        $preco_caixa = $n['preco_caixa'];
    } else {
        header('location: erro.php');
        exit;
    }
    $stmt->close();
}

if (isset($_POST['editar'])) {
    $id = intval($_GET['id_prod']);
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $qtd_caixa = intval($_POST['qtd_fardo']);
    $preco_caixa = floatval($_POST['preco_fardo']);
    $preco_suj = ($preco_caixa / $qtd_caixa) * 1.3;

    $stmt = $connectionBD->prepare("UPDATE produto SET nome_prod = ?, cod_prod = ?, qtd_caixa = ?, preco_caixa = ?, preco_sujerido = ? WHERE id_prod = ?");
    $stmt->bind_param("ssiddi", $nome, $codigo, $qtd_caixa, $preco_caixa, $preco_suj, $id);

    if ($stmt->execute()) {
        header('location: ../paginas/produtos.php');
    } else {
        header('location: erro.php');
    }
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="../paginas/menu.php">
            <img src="../paginas/img/logo-white.png" width="30" height="30" class="d-inline-block align-text-top">
                Finance.io
            </a>
        </div>
    </nav>

    <div class="container col-md-10 offset md-3">
        <div class="row">
            <div class="col text-center">
                <p class="fs-1">Atualizar Produto</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="p-3 bg-secondary-subtle border border-2 border-danger rounded-5">
                        <div class="row">
                            <div class="col"> 
                                <div class="input-group mb-3">
                                        <input type="text" class="form-control me-3" name="nome" value="<?php echo $nome ?>">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-distribute-horizontal"></i></span>
                                        <input type="text" class="form-control" value="<?php echo $codigo ?>" name="codigo">
                                    </div>
                            </div>    
                        </div>

                        <div class="row">   
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
                                    <input type="text" class="form-control" value="<?php echo $qtd_caixa ?>" name="qtd_fardo">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
                                    <input type="text" class="form-control" value="<?php echo $preco_caixa ?>" name="preco_fardo">
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-danger" type="submit" name="editar"><i class="bi bi-arrow-repeat"></i> Atualizar</button>
                                </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
    </div>

    <div class="position-absolute bottom-0 start-0">
        <a href="../paginas/produtos.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left-square"></i> Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>