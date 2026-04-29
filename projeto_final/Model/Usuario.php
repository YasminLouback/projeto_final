<?php
require_once __DIR__ . '/ConexaoBD.php';

class Usuario {

    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $dataNascimento;
    private $senha;

    public function setID($id){
        $this->id = $id;
    }

    public function getID(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setCPF($cpf){
        $this->cpf = $cpf;
    }

    public function getCPF(){
        return $this->cpf;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    // INSERIR NO BANCO
    public function inserirBD() {

        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Erro conexão: " . $conn->connect_error);
        }

        $sql = "INSERT INTO usuario (nome, cpf, email, senha)
                VALUES (
                '$this->nome',
                '$this->cpf',
                '$this->email',
                '$this->senha'
        )";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true;
        }

        $conn->close();
        return false;
    }

    // CARREGAR USUÁRIO
    public function carregarUsuario($cpf) {

        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Erro conexão: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM usuario WHERE cpf = '$cpf'";
        $result = $conn->query($sql);

        $r = $result->fetch_object();

        if ($r) {
            $this->id = $r->idusuario;
            $this->nome = $r->nome;
            $this->cpf = $r->cpf;
            $this->email = $r->email;
            $this->dataNascimento = $r->dataNascimento;
            $this->senha = $r->senha;

            $conn->close();
            return true;
        }

        $conn->close();
        return false;
    }

    // ATUALIZAR NO BANCO
    public function atualizarBD() {

        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Erro conexão: " . $conn->connect_error);
        }

        $sql = "UPDATE usuario SET
                nome = '$this->nome',
                cpf = '$this->cpf',
                email = '$this->email',
                dataNascimento = '$this->dataNascimento'
                WHERE idusuario = '$this->id'";

        $resultado = $conn->query($sql);

        $conn->close();

        return $resultado;
    }
}
?>