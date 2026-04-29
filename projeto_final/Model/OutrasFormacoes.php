<?php
class OutrasFormacoes {

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

        $sql = "INSERT INTO outrasformacoes 
        (idusuario, inicio, fim, descricao)
        VALUES 
        ('$this->idusuario','$this->inicio','$this->fim','$this->descricao')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true;
        }

        $conn->close();
        return false;
    }

    // EXCLUIR
    public function excluirBD($id) {

        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "DELETE FROM outrasformacoes 
        WHERE idoutrasformacoes='$id'";

        return $conn->query($sql);
    }

    // LISTAR POR USUÁRIO
    public function listaOutrasFormacoes($idusuario) {

        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "SELECT * FROM outrasformacoes 
        WHERE idusuario='$idusuario'";

        return $conn->query($sql);
    }
}
?>