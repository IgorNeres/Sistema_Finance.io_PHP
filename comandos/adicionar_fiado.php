<?php
include '../comandos/connection.php';
include '../comandos/protect.php';

$id_dev = isset($_GET['id_clie']) ? intval($_GET['id_clie']) : 0;

if (isset($_POST['save_fi'])) {
    $data = $_POST['data'];
    $apelido = $_POST['apelido'];
    $valor = $_POST['preco'];

    if (!empty($data) && !empty($apelido) && !empty($valor)) {
        $stmt = $connectionBD->prepare("INSERT INTO compra (fk_id_clie, data_com, apelido_com, valor_com) VALUES (?, ?, ?, ?)");
        
        $stmt->bind_param("isss", $id_dev, $data, $apelido, $valor);

        if ($stmt->execute()) {
            header('Location: ../paginas/fiados.php');
        } else {
            header('Location: erro.php');
        }

        $stmt->close();
    } else {
        header('location: erro.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divida</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-info">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="../paginas/menu.php">
            <img src="../paginas/img/logo-dark.png" width="30" height="30" class="d-inline-block align-text-top">
                Finance.io
            </a>
        </div>
    </nav>

    <div class="container col-md-10 offset md-3">
        <div class="row">
            <div class="col text-center">
                <p class="fs-1">Adicionar Divida</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="p-3 bg-secondary-subtle border border-2 border-info rounded-5">
                        <div class="row">
                                <div class="col"> 
                                    <input type="date" class="form-control me-3" name="data">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control me-3" name="apelido" placeholder="Apelido">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
                                            <input type="text" class="form-control" placeholder="Preço" name="preco">
                                        </div>
                                    </div>
                                    <div class="col">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-info" type="submit" name="save_fi"><i class="bi bi-bag-plus"></i> Adicionar</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    <div class="position-absolute bottom-0 start-0">
        <a href="../paginas/fiados.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left-square"></i> Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>