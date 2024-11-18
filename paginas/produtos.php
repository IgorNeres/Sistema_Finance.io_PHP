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
    <title>Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="menu.php">
            <img src="img/logo-white.png" width="30" height="30" class="d-inline-block align-text-top">
                Finance.io
            </a>
        </div>
    </nav>

    <div class="container col-md-10 offset md-3">
        <div class="row">
            <div class="col text-center">
                <p class="fs-1">Cadrastrar Produto</p>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-9">
                <form action="../comandos/save_prod.php" method="POST">
                    <div class="p-3 bg-secondary-subtle border border-2 border-danger rounded-5">
                        <div class="row">
                            <div class="col"> 
                                <div class="input-group mb-3">
                                        <input type="text" class="form-control me-3" name="nome" placeholder="Nome">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-distribute-horizontal"></i></span>
                                        <input type="text" class="form-control" placeholder="Código" name="codigo">
                                    </div>
                            </div>    
                        </div>

                        <div class="row">   
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
                                    <input type="text" class="form-control" placeholder="Quantidade por fardo" name="qtd_fardo">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
                                    <input type="text" class="form-control" placeholder="Preço por Fardo" name="preco_fardo">
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-bag-plus"></i> Cadrastrar</button>
                                </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col col-md-2">
                <div class="card bg-danger border border-2 border-secundary rounded-5 text-light" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Atenção</h5>
                        <p class="card-text">Não pode haver dois produtos com o mesmo código! Cada código é unico!</p>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <table class="table table-striped table-hover table-secondary border border-2 border-danger rounded-5">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Código</th>
                    <th scope="col">Quantidade por fardo</th>
                    <th scope="col">Preço do fardo</th>
                    <th scope="col">Sujestão de venda</th>
                    <th scope="col">Editar</th>
                </thead>
                <?php
                    while($produto = mysqli_fetch_assoc($listaSQL_prod)){?>
                    <tbody id="dados">
                        <tr>
                            <td><?php echo $produto['nome_prod'] ?></td>
                            <td><?php echo $produto['cod_prod'] ?></td>
                            <td><?php echo $produto['qtd_caixa'] ?></td>
                            <td><?php echo $produto['preco_caixa'] ?> R$</td>
                            <td><?php echo number_format($produto['preco_sujerido'], 2) ?> R$</td>
                            <td>
                                <a href="../comandos/delete_prod.php?id_prod=<?php echo $produto['id_prod']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Excluir</a>
                                    
                                <a href="../comandos/update_prod.php?id_prod=<?php echo $produto['id_prod']; ?>" class="btn btn-sm btn-info"><i class="bi bi-arrow-repeat"></i> Atualizar</a>
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