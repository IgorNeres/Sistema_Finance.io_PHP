<?php
include '../comandos/connection.php';
include '../comandos/protect.php';

$id_dev = isset($_GET["id_clie"]) ? intval($_GET["id_clie"]) : 0;

$stmt_lista = $connectionBD->prepare("SELECT * FROM compra WHERE fk_id_clie = ? ORDER BY data_com ASC");
$stmt_lista->bind_param("i", $id_dev);
$stmt_lista->execute();
$result_lista = $stmt_lista->get_result();

$stmt_soma = $connectionBD->prepare("SELECT SUM(valor_com) AS total FROM compra WHERE fk_id_clie = ?");
$stmt_soma->bind_param("i", $id_dev);
$stmt_soma->execute();
$result_soma = $stmt_soma->get_result();

if ($row_soma = $result_soma->fetch_assoc()) {
    $total = $row_soma['total'] ?: 0;
} else {
    header('location: erro.php');
    exit;
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
                <p class="fs-1">Divida</p>
            </div>
        </div>

        <div class="row">
            <table class="table table-striped table-hover table-secondary border border-2 border-info rounded-5">
                <thead>
                    <th scope="col">Data</th>
                    <th scope="col">Apelido</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Editar</th>
                </thead>
                <?php while ($compra = $result_lista->fetch_assoc()) { ?>
                <tbody id="dados">
                    <tr>
                        <td><?php echo htmlspecialchars($compra['data_com'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($compra['apelido_com'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($compra['valor_com'], ENT_QUOTES, 'UTF-8'); ?> R$</td>
                        <td>
                            <a href="../comandos/update_com.php?id_com=<?php echo $compra['id_com']; ?>" class="btn btn-sm btn-info"><i class="bi bi-arrow-repeat"></i> Atualizar</a>
                            <a href="../comandos/delete_com.php?id_com=<?php echo $compra['id_com']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-cart-x-fill"></i> Excluir</a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
                <tfoot class="table-dark">
                    <tr>
                        <td>Total:</td>
                        <td></td>
                        <td><?php echo $total; ?> R$</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="position-absolute bottom-0 start-0">
        <a href="../paginas/fiados.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left-square"></i> Voltar</a>
    </div>

    <button type="button" class="btn btn-danger position-absolute bottom-0 end-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-trash3-fill"></i> Limpar a Divida
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    Não tem como retornar a divida após confimar!
            </div>
            <div class="modal-footer">
                <a href="drop_divida.php?id_clie=<?php echo $id_dev; ?>" class="btn btn-danger">Apagar Divida</a>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
