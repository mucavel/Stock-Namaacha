<?php
session_start();
include ('sessionValid.php');
require_once 'login.php';
$redef = new Funcionario("login", "127.0.0.1", "root", "");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/redefinirPasse.css" type="text/css">
    <link rel="icon" href="_imagens/Namaacha-icon.png">
    <title>Redefinir</title>
</head>
<body>
    <?php
        if(isset($_POST['nome'])){
            if(!empty($_POST['nome']) && !empty($_POST['passe']) && !empty($_POST['confPasse'])){

                $nome = addslashes($_POST['nome']);
                $novaPasse = addslashes($_POST['passe']);
                $confNovaPasse = addslashes($_POST['confPasse']);

                if($novaPasse == $confNovaPasse){
                   if($redef->redefinirPasse($nome, $novaPasse)){
                       echo "Dados atualizados!";
                   }else{
                        echo ("Usuário não existe!<br>Dados não atualizados!");
                   }
                }else{
                    echo "Palavras-Passe diferentes!";
                }
            }else{
                echo "Preencha todos campos!";
            }
        }
    ?>
    <header id="cabecalho">
        <nav id="navegacao">
            <div id="entrar-txt">
                <h1>Redefinir Palavra-Passe</h1>
            </div>
        </nav>
    </header>
    <section id="main">
        <div id="containerBox">
            <div id="logo-div">
                <img src="_imagens/Namaacha-logo.png" alt="Namaacha-logo">
            </div>
            <div id="form">
                <form method="POST">
                    <div id="formulario">
                        <h2>Redefinir</h2>
                        <input type="text" name="nome" id="nome" autocomplete="off" required placeholder="Nome">
                        <input type="password" name="passe" id="passe" placeholder="Nova Palavra-Passe" maxlength="30" required autocomplete="off" autofocus>
                        <input type="password" name="confPasse" id="confPasse" placeholder="Confirmar nova Palavra-Passe" maxlength="8" required><br>
                        <input type="submit" id="redefinirBtn" value="Redefinir"><br>
                        <a id="voltar" href="logoutRedefinir.php">Voltar ao Login</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <img id="wave" src="_imagens/wave.png" alt="Wave">
</body>
</html>
