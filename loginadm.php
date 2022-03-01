<?php
session_start();
include ('sessionValid.php');
require_once 'login.php';
$Adm = new Funcionario("login", "127.0.0.1", "root", "");
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

                $adm = addslashes($_POST['nome']);
                $admpassword = addslashes($_POST['passe']);
    
                $resultadm = $Adm->fazerLoginAdm($adm, $admpassword);
    
                if($resultadm > 0){
                    $_SESSION['admin'] = $adm;
                    header("Location: stockadm.php");
                    exit();
                }else{
                    $_SESSION['adminvalido'] = true;
                    header("Location: loginadm.php");
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
                <h1>Entrar - Administrador</h1>
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
                            if(isset($_SESSION['adminvalido'])):
                        ?>
                        <div id="error">
                            <p><b>Erro: </b>Dados incorretos!</p>
                        </div>
                        <?php
                            endif;
                            unset($_SESSION['adminvalido']);
                        ?>
                        <!--<label for="nome">Nome:</label><br>-->
                        <input type="text" name="nome" id="nome" placeholder="Nome" maxlength="30" required autocomplete="off" autofocus><br>
                        <!--<label for="passe">Palavra-Passe</label><br>-->
                        <input type="password" name="passe" id="passe" placeholder="Palavra-Passe" maxlength="8" required><br>
                        <input type="submit" value="Entrar"><br>
                        <a id="redefinir" class="links" href="redefinirPasse.php">Esqueceu a Palavra-Passe?</a><br>
                        <a id="entrarFunc" class="links" href="index.php">Entrar como Funcionário</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <img id="wave" src="_imagens/wave.png" alt="Wave">
</body>
</html>