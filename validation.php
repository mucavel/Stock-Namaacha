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
    <link rel="stylesheet" href="_css/redefinirPasse.css" type="text/css">
    <link rel="icon" href="_imagens/Namaacha-icon.png">
    <title>Entrar</title>
</head>
<body>
    <?php
        if(isset($_POST['passe'])){
            if(!empty($_POST['passe'])){

                $validPass = addslashes($_POST['passe']);
    
                $result = $Func->validar($validPass);
    
                if($result > 0){
                    $_SESSION['validado'] = true;
                    header("Location: loginadm.php");
                    exit();
                }else{
                    $_SESSION['invalido'] = true;
                    header("Location: validation.php");
                    exit();
                }
            }else{
                echo "Preencha o campo!";
            }

        }
    ?>
    <header id="cabecalho">
        <nav id="navegacao">
            <div id="entrar-txt">
                <h1>Validação</h1>
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
                        <h2>Validação</h2>
                        <?php
                            if(isset($_SESSION['invalido'])):
                        ?>
                            <div id="error">
                                <p><b>Erro: </b>Palavra-Passe incorreta!</p>
                            </div>
                        <?php
                            endif;
                            unset($_SESSION['invalido']);
                        ?>
                        <input type="password" name="passe" id="passe" placeholder="Palavra-Passe" maxlength="8" required><br>
                        <input type="submit" value="Validar"><br>
                        <a id="voltar" href="index.php">Voltar</a>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <img id="wave" src="_imagens/wave.png" alt="Wave">
</body>
</html>