<?php
include '../comandos/connection.php';

if (isset($_GET['id_clie'])) {
    $id = intval($_GET['id_clie']);
    $stmt = $connectionBD->prepare("SELECT * FROM cliente WHERE id_clie = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $n = $result->fetch_assoc();
        $nome = $n['nome_clie'];
        $telefone = $n['telefone_clie'];
        $endereco = $n['endereco_clie'];
    } else {
        header('location: erro.php');
    }
    $stmt->close();
}

if (isset($_POST['editar'])) {
    $id = intval($_GET['id_clie']);
    $nome = $connectionBD->real_escape_string($_POST['nome']);
    $telefone = $connectionBD->real_escape_string($_POST['telefone']);
    $endereco = $connectionBD->real_escape_string($_POST['endereco']);

    $stmt = $connectionBD->prepare("UPDATE cliente SET nome_clie = ?, telefone_clie = ?, endereco_clie = ? WHERE id_clie = ?");
    $stmt->bind_param("sssi", $nome, $telefone, $endereco, $id);

    if ($stmt->execute()) {
        header('location: ../paginas/clientes.php');
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
    <title>Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="../paginas/menu.php">
            <img src="../paginas/img/logo-dark.png" width="30" height="30" class="d-inline-block align-text-top">
                Finance.io
            </a>
        </div>
    </nav>

    <br><br><br><br><br><br>

    <div class="container col-md-10 offset md-3">
        <div class="row">
            <div class="col text-center">
                <p class="fs-1">Atualizar Cliente</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="p-3 bg-secondary-subtle border border-2 border-warning rounded-5">
                        <div class="row">
                            <div class="col"> 
                                <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="text" class="form-control" value="<?php echo $telefone ?>" name="telefone">
                                    </div>
                            </div>    
                        </div>

                        <div class="row">   
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
                                    <input type="text" class="form-control" value="<?php echo $endereco ?>" name="endereco">
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-warning" type="submit" name="editar"><i class="bi bi-arrow-repeat"></i> Atualizar</button>
                                </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="position-absolute bottom-0 start-0">
        <a href="../paginas/clientes.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left-square"></i> Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>