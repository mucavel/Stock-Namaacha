<?php
Class Funcionario{
    private $conexao;

    //CONEXAO A BASE DE DADOS
    public function __construct($dbname, $host, $DBuser, $DBpassword){
        try {
            $this->conexao = new PDO("mysql:dbname=".$dbname.";host=".$host, $DBuser, $DBpassword);
            //echo "Conectado a DB";
        } catch (PDOException $p) {
            echo "ERRO: Não foi possível conectar com a Base de Dados! -> ".$p->getMessage();
        }
        catch(Exception $e){
            echo "ERRO: ".$e->getMessage();
        }
    }

    //FAZER LOGIN FUNCIONARIOS
    public function fazerLoginFunc($user, $password){
        $query = $this->conexao->prepare("SELECT idFunc, nome FROM funcionarios WHERE nome = :nome and passe = md5(:passe)");
        $query->bindValue(":nome", $user);
        $query->bindValue(":passe", $password);
        $query->execute();

        $result = $query->rowCount();
        return $result;
    }

     //FAZER LOGIN ADMINISTRADOR
    public function fazerLoginAdm($adm, $admpassword){
        $query = $this->conexao->prepare("SELECT idAdm, nome FROM administrador WHERE nome = :nome and passe = md5(:passe)");
        $query->bindValue(":nome", $adm);
        $query->bindValue(":passe", $admpassword);
        $query->execute();

        $result = $query->rowCount();
        return $result;
    }

    //CADASTRAR NOVO FUNCIONARIO
    public function cadastrarFunc($nome, $funcPasse){
        $query = $this->conexao->prepare("SELECT idFunc, nome FROM funcionarios WHERE nome = :nome");
        $query->bindValue(":nome", $nome);
        $query->execute();

        $result = $query->rowCount();

        if($result > 0 ){
            return false;
        }else{
            $query = $this->conexao->prepare("INSERT INTO funcionarios(nome, passe) VALUES(:nome, md5(:passe))");
            $query->bindValue(":nome", $nome);
            $query->bindValue(":passe", $funcPasse);
            $query->execute();

            return true;
        }

    }

    //REDEFINIR PALAVRA-PASSE
    public function redefinirPasse($nome,$novaPasse){
        $query = $this->conexao->prepare("SELECT idFunc, nome FROM funcionarios WHERE nome = :nome");
        $query->bindValue(":nome", $nome);
        $query->execute();

        $row = $query->rowCount();
        
        if($row > 0 ){
            $query = $this->conexao->prepare("UPDATE funcionarios SET passe = md5(:passe) WHERE nome = :nome");
            $query->bindValue(":passe", $novaPasse);
            $query->bindValue(":nome", $nome);
            $query->execute();

            return true;
        }else{
            return false;
        }
    }

    //VALIDAR SE É UM ADMINISTRADOR
    public function validar($validPass){
        $query = $this->conexao->prepare("SELECT * FROM verification WHERE  passeVerif = md5(:passe)");
        $query->bindValue(":passe", $validPass);
        $query->execute();
    
        $result = $query->rowCount();
        return $result;
    }

        //BUSCAR DADOS
    public function buscarDados(){
        $res = array();
        $cmd = $this->conexao->query("SELECT * FROM registros");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

        //APAGAR PESSOA
        public function apagarPessoa($id){
            $cmd = $this->conexao->prepare("DELETE FROM `registros` WHERE `registros`.`idGarraf` = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }

        public function addRegistro($qtd, $tamanho, $estado){
            $query = $this->conexao->prepare("INSERT INTO `registros`( `quantidade`, `tamanho`, `estado`) VALUES (:qtd, :t, :e)");
            $query->bindValue(":qtd", $qtd);
            $query->bindValue(":t", $tamanho);
            $query->bindValue(":e", $estado);
            $query->execute();
        }
}

?>