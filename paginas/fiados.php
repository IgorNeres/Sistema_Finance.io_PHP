<?php
    include '../comandos/connection.php';
    include '../comandos/protect.php';
    include '../comandos/read.php';

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
    <nav class="navbar bg-info">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="menu.php">
            <img src="img/logo-dark.png" width="30" height="30" class="d-inline-block align-text-top">
                Finance.io
            </a>
        </div>
    </nav>

    <div class="container col-md-10 offset md-3">
        <div class="row">
            <div class="col text-center">
                <p class="fs-1">Fiados</p>
            </div>
        </div>

        <div class="row">
            <table class="table table-striped table-hover table-secondary border border-2 border-info rounded-5">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </thead>
                <?php
                    while($cliente = mysqli_fetch_assoc($listaSQL_clie)){?>
                    <tbody id="dados">
                        <tr>
                            <td><?php echo $cliente['nome_clie'] ?></td>
                            <td><?php echo $cliente['telefone_clie'] ?></td>
                            <td><?php echo $cliente['endereco_clie'] ?></td>
                            <td>
                                <a href="../comandos/divida.php?id_clie=<?php echo $cliente['id_clie']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i> Visualizar divida</a>
                                <a href="../comandos/adicionar_fiado.php?id_clie=<?php echo $cliente['id_clie']; ?>" class="btn btn-sm btn-success"><i class="bi bi-plus-circle-fill"></i> Adicionar divida</a>  
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
            </table>
        </div>
    </div>

    <div class="position-absolute bottom-0 start-0">
        <a href="menu.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left-square"></i> Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>