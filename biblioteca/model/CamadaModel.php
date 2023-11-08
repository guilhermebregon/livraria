<?php
// O componente Modelo é responsável por manipular os dados e a lógica da aplicação.
//Ele interage com a base de dados, manipula os dados e provê a funcionalidade central da aplicação
class CamadaModel {
    //estabelecer a conexão com o banco dentro do componente
    private $db;
    private $num1;
    private $num2;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=livraria', 'root', 'Jesus100%');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->num1 = 0;
        $this->num2 = 0;
    }

        public function getNum1() {
        return $this->num1;
    }

    public function setNum1($num1) {
        $this->num1 = $num1;
    }

    public function getNum2() {
        return $this->num2;
    }

    public function setNum2($num2) {
        $this->num2 = $num2;
    }

    public function soma() {
        return $this->num1 + $this->num2;
    }

    public function cadastrarLivro($autor, $titulo) {
        $stmt = $this->db->prepare("INSERT INTO livros (autor, titulo) VALUES (:autor, :titulo)");
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->execute();
    }
    
}
?>