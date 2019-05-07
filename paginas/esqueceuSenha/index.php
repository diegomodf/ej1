<?php
    session_start();
    if(!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['funcao'])){
        header('Location: ../../../index.php?erro=1');    
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../sistema/css/login/body.css">
</head>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <center>
                <img src="../../sistema/adminlte/dist/img/logo.png">
            </center>
        </div>
        <div class="col-md-6 login-form-2">
            <form>
                <h3>Esqueceu sua senha?</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Digite seu e-mail" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Enviar E-mail" />
                    </div>
                    <div class="form-group">
                        <a href="../../index.php" class="btnForgetPwd" value="Login">Voltar</a>
                    </div>
            </form>
        </div>
    </div>
</div>