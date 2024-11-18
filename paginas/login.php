<?php
    include '../comandos/connection.php';

    if(isset($_POST['user']) || isset($_POST['password'])){

        if(strlen($_POST['user']) == 0){
            echo "Preencha seu user!";
        }else if(strlen($_POST['password']) == 0){
            echo "Preencha sua senha!";
        }else{
            //Não hackiar facilamente
            $user = $connectionBD->real_escape_string($_POST['user']);
            $password = $connectionBD->real_escape_string($_POST['password']);

            //verificar user e senha
            $sql_code = "SELECT * FROM usuario WHERE username = '$user' AND senha = '$password'";
            $sql_query = $connectionBD->query($sql_code) or die("Falha na executação do MySQL: " . $connectionBD->error);

            $qtd = $sql_query->num_rows;

            if($qtd == 1){

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }
                
                $_SESSION['id'] = $usuario['id_usuario'];
                $_SESSION['user'] = $usuario['username'];

                header('location: menu.php');

            }else{
                header('location: ../comandos/error_login.php');
            }


        }   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br><br><br><br><br><br><br><br>
    <div class="container col-md-4 offset md-3">
        <div class="row">
            <div class="col-9">
                <p class="text-center fs-1 text-primary mx-auto p-3 fw-bold">Login Finance.io</p>
            </div>
            <div class="col">
                <img src="img/logo.png" class="img-fluid" style="width: 100px;">
            </div>
        </div>
        <form action="" method="POST">
            <div class="p-3 bg-secondary-subtle border border-2 border-secondary rounded-5">
                <div class="row">
                    <div class="col"> 
                            <input type="text" class="form-control" name="user" placeholder="Usuario">
                    </div>    
                </div>

                <br>

                <div class="row">   
                    <div class="col">
                        <input type="password" class="form-control" name="password" placeholder="Senha">
                    </div>
                    <div class="col">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit"> <i class="bi bi-box-arrow-in-right"></i> Entrar</button>
                        </div>
                </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>