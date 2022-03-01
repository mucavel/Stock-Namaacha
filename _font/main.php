<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="_imagens/Namaacha-icon.png">
    <link rel="stylesheet" href="_css/main.css">
    <title>Home</title>
</head>
<body>
    <header id="cabecalho">
        <nav id="navegacao">
            <div id="h1-nav">
                <h1 id="nav-title">Água de Namaacha</h1>
            </div>
           <div id="logout-div">
               <div id="usuario">
                    <p id="cumprimentos">Olá, <?php echo $_SESSION['usuario']?></p>
               </div>
                <div id="log-out">
                    <li><a id="sair" href="logout.php">Terminar sessão</a></li>
                    <img src="_imagens/logout.png" alt="Sair">
                </div>   
           </div> 
        </nav>
    </header>
    <aside id="aside">
        <div id="Avatar">
            <img src="_imagens/avatar.png" alt="Avatar"><br>
            <label for="nome">Usuário: <?php echo $_SESSION['usuario'] ?></label>  
        </div>
        <div id="usuario">

        </div>
    </aside>
    <div id="container">
        <h2 class="subTitle">Sistema de Gestão Stock</h2>
        <section id="cadastro">
            
            <div id="botao-cadastrar">
                <button id="btn" ><a href="Javascript:;" onclick="formCadastro()">Cadastrar</a></button>
                <img id="seta" src="_imagens/seta.png" alt="seta">
            </div>
            <div id="formulario">
                <form action="#" method="post" id="form">
                    <label id="Qtd">Quantidade de Garrafas</label><br>
                    <input type="number" name="QtdGarraf" id="QtdGarraf"><br>
                    <label for="tamanho">Tamanho da Garrafa (L)</label><br>
                    <select name="tamanhoGarraf" id="tamanhoGarraf">
                        <option value="0,5l">0,5 Litros</option>
                        <option value="1,5l">1,5 Litros</option>
                        <option value="5l">5 Litros</option>
                        <option value="20l">20 Litros</option>
                    </select><br><br>
                    <label for="estadoGarraf">Estado</label><br>
                    <select name="estado" id="estado">
                        <option value="cheia">Cheia</option>
                        <option value="vazio">Vazia</option>
                    </select><br>
                    <br><input type="submit" value="Adicionar">
                </form>
            </div>
        </section>
        <h2 class="subTitle">Produtos Cadastrados</h2>
        <section id="cadastrados">
            <p>No momento não há produtos cadastrados!</p>
        </section>
    </div>
    <footer id="rodape">
        <div id="dev">
            <p id="dev-text">Desenvolvedor - Salvador Carlos - PAW3A @ 2021</p>
        </div>
    </footer>
</body>
<script src="_Js/stock-Namaacha.js" type="text/javascript"></script>
</html>