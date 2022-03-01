<?php
session_start();
require_once 'login.php';
$Func = new Funcionario("login", "127.0.0.1", "root", "");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/login.css" type="text/css">
    <link rel="icon" href="_imagens/Namaacha-icon.png">
    <title>Entrar</title>
</head>
<body>
    <?php
        if(isset($_POST['nome'])){
            if(!empty($_POST['nome']) && !empty($_POST['passe'])){

                $user = addslashes($_POST['nome']);
                $password = addslashes($_POST['passe']);
    
                $result = $Func->fazerLoginFunc($user, $password);
    
                if($result > 0){
                    $_SESSION['user'] = $user;
                    header("Location: stock.php");
                    exit();
                }else{
                    $_SESSION['invalido'] = true;
                    header("Location: index.php");
                    exit();
                }
            }else{
                echo "Preencha todos campos!";
            }

        }
    ?>
    <header id="cabecalho">
        <nav id="navegacao">
            <div id="entrar-txt">
                <h1>Entrar - Funcionários</h1>
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
                        <h2>Entrar</h2>
                        <?php
                            if(isset($_SESSION['invalido'])):
                        ?>
                        <div id="error">
                            <p><b>Erro: </b>Dados incorretos!</p>
                        </div>
                        <?php
                            endif;
                            unset($_SESSION['invalido']);
                        ?>
                        <!--<label for="nome">Nome:</label><br>-->
                        <input type="text" name="nome" id="nome" placeholder="Nome" maxlength="30" required autocomplete="off" autofocus><br>
                        <!--<label for="passe">Palavra-Passe</label><br>-->
                        <input type="password" name="passe" id="passe" placeholder="Palavra-Passe" maxlength="8" required><br>
                        <input type="submit" value="Entrar"><br>
                        <a id="redefinir" class="links" href="requestUpdate.php">Esqueceu a Palavra-Passe?</a><br>
                        <a id="entrarAdm" class="links" href="validation.php">Entrar como Administrador</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <img id="wave" src="_imagens/wave.png" alt="Wave">
</body>
</html>