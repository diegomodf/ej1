<?php
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0 ;
    echo $erro;
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/login/body.css">
</head>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <center>
                <img src="strategos.png">
            </center>
        </div>
        <div class="col-md-6 login-form-2">
                <form action="sistema/php/validar_acesso/login_funcionario.php" method="post">
                    <h3>Plataforma Strategos</h3>
                    <div class="col-md-12">
                            <a href="index.php"><button type="button" class="btn btn-secondary btn-sm">Área do Cliente</button></a>
                            <a href="index_profissionais.php"><button type="button" class="btn btn-info btn-sm">Área do Profissional</button><br><br></a>
                    <div class="form-group">
                        <input type="email" class="form-control" id="name" name="email" placeholder="E-mail" />
                    </div>
                    <div class="form-group"> 
                        <input type="password" class="form-control" id="mail" name="senha" placeholder="Senha" />
                    </div>
                    <div class="button">
                        <button class="btn btn-submit" type="submit">Login</button>
                    </div>
                    
                    <?php
                        if($erro == 1){
                                echo "<br>";
                                echo "<p>Usuário ou senha inválidos</p>";
                        }
                    ?>    
          </form>
        </div>
    </div>
</div>
    
