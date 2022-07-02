<?php
session_start();
include ('sessionValiduser.php');
include_once('login.php');
$d = new Funcionario("login", "127.0.0.1", "root", "");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <link rel="icon" href="_imagens/Namaacha-icon.png">
    <link rel="stylesheet" href="_css/style.css">
</head>
<body>
    <header id="cabecalho">
        <div id="navbar">
            <nav id="navegacao">
                <div id="nav-h1">
                    <h1>Água da Namaacha</h1>
                </div>
                <div id="nav-container">
                    <div id="boasvindas">
                        <p>Olá, <?php echo $_SESSION['user'] ?></p>
                    </div>
                    <div id="sair">
                        <a href="logout.php">Terminar sessão</a><img src="_imagens/logout.png" alt="Terminar sessão">
                    </div>
                </div>
            </nav>
        </div>
    </header>
<!--<aside id="aside"></aside>  --->
    <section id="container">
        <div class="container">
            <div id="titleStock">
                <h2>Sistema de Gestão de Stock</h2>
            </div>
            <div id="botao">
                <button id="btn-registrar" onclick="registrar()">
                    <a href="Javascript:;">Registrar</a>
                </button>
                <img id="seta" src="_imagens/seta.png" alt="Seta">
            </div>
            <div id="form-container" class="fade">
                <div id="formulario">
                    <?php
                        if(isset($_POST['QtdGarraf'])){
                            if(!empty($_POST['QtdGarraf'])){
                                $qtd = addslashes($_POST['QtdGarraf']);
                                $tamanho = addslashes($_POST['tamanhoGarraf']);
                                $estado = addslashes($_POST['estado']);

                                $d->addRegistro($qtd, $tamanho, $estado);
                                header("Location: stock.php");

                            }
                        }

                    ?>
                    <form method="POST" id="form">
                        <label id="Qtd">Quantidade de Garrafas</label>
                        <input type="number" name="QtdGarraf" id="QtdGarraf" autofocus>
                        <label for="tamanho">Tamanho da Garrafa (L)</label>
                        <select name="tamanhoGarraf" id="tamanhoGarraf">
                            <option value="0,5 Litros">0,5 Litros</option>
                            <option value="1,5 Litros">1,5 Litros</option>
                            <option value="5 Litros">5 Litros</option>
                            <option value="20 Litros">20 Litros</option>
                        </select><br>
                        <label for="estadoGarraf">Estado</label>
                        <select name="estado" id="estado">
                            <option value="Cheia">Cheia</option>
                            <option value="Vazia">Vazia</option>
                        </select><br>
                        <br><input type="submit" value="Adicionar">
                    </form>
                </div>
            </div>
            <div id="titleRegistro">
                <h2>Registros</h2>
            </div>
            <div id="registros">
                <table class="tabela">
                    <tr id="titulo">
                        <td>Quantidade de Garrafas</td>
                        <td>Tamanho da Garrafa (L)</td>
                        <td >Estado</td>
                    </tr>
                <?php
                    $dados = $d->buscarDados();
                    if(count($dados) > 0){
                        for ($i=0; $i < count($dados); $i++) {
                            echo "<tr>";
                        foreach($dados[$i] as $key => $value){
                            if($key != "idGarraf"){
                                echo "<td>".$value."</td>";
                            }
                        }      
                        echo "</tr>";
                        }
                    }else{
                        echo "Ainda sem registros!";
                    }
                ?>
            </table>
            </div>
            <footer id="rodape">
                <p>Desenvolvedor: Salvador Carlos Mucavele - @ 2021</p>
            </footer>
        </div>
    </section>
</body>
<script src="_jS/stock_Namaacha.js"></script>
</html>
<?php
    if(isset($_GET['idGarraf'])){
        $idPessoa = addslashes($_GET['idGarraf']);
        $d->apagarPessoa($idPessoa);
        header("Location: stockadm.php");
    }
?>