<?php
class ExperienciaProfissional {

    private $id;
    private $idusuario;
    private $inicio;
    private $fim;
    private $empresa;
    private $descricao;

    public function setID($id){ $this->id = $id; }
    public function getID(){ return $this->id; }

    public function setIdUsuario($idusuario){ $this->idusuario = $idusuario; }
    public function getIdUsuario(){ return $this->idusuario; }

    public function setInicio($inicio){ $this->inicio = $inicio; }
    public function getInicio(){ return $this->inicio; }

    public function setFim($fim){ $this->fim = $fim; }
    public function getFim(){ return $this->fim; }

    public function setEmpresa($empresa){ $this->empresa = $empresa; }
    public function getEmpresa(){ return $this->empresa; }

    public function setDescricao($descricao){ $this->descricao = $descricao; }
    public function getDescricao(){ return $this->descricao; }

    // INSERIR
    public function inserirBD() {

        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "INSERT INTO experienciaprofissional 
        (idusuario, inicio, fim, empresa, descricao)
        VALUES 
        ('$this->idusuario','$this->inicio','$this->fim','$this->empresa','$this->descricao')";

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

        $sql = "DELETE FROM experienciaprofissional 
        WHERE idexperienciaprofissional='$id'";

        return $conn->query($sql);
    }

    // LISTAR
    public function listaExperiencias($idusuario) {

        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "SELECT * FROM experienciaprofissional 
        WHERE idusuario='$idusuario'";

        return $conn->query($sql);
    }
}
?>