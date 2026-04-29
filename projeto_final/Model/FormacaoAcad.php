<?php
class FormacaoAcad {

    private $id;
    private $idusuario;
    private $inicio;
    private $fim;
    private $descricao;

    public function setID($id){
        $this->id = $id;
    }

    public function getID(){
        return $this->id;
    }

    public function setIdUsuario($idusuario){
        $this->idusuario = $idusuario;
    }

    public function getIdUsuario(){
        return $this->idusuario;
    }

    public function setInicio($inicio){
        $this->inicio = $inicio;
    }

    public function getInicio(){
        return $this->inicio;
    }

    public function setFim($fim){
        $this->fim = $fim;
    }

    public function getFim(){
        return $this->fim;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    // INSERIR
    public function inserirBD() {

        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "INSERT INTO formacaoAcademica (idusuario, inicio, fim, descricao)
                VALUES ('$this->idusuario','$this->inicio','$this->fim','$this->descricao')";

        return $conn->query($sql);
    }

    // EXCLUIR
    public function excluirBD($id) {

        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "DELETE FROM formacaoAcademica 
                WHERE idformacaoAcademica='$id'";

        return $conn->query($sql);
    }

    // LISTAR POR USUÁRIO
    public function listaFormacoes($idusuario) {

        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "SELECT * FROM formacaoAcademica 
                WHERE idusuario='$idusuario'";

        return $conn->query($sql);
    }
}
?>