<?php
// O componente Modelo é responsável por manipular os dados e a lógica da aplicação.
//Ele interage com a base de dados, manipula os dados e provê a funcionalidade central da aplicação
class CamadaModel {
    //estabelecer a conexão com o banco dentro do componente
    private $db;
    
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=livraria', 'root', 'Jesus100%');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function cadastrarLivro($autor, $titulo) {
        $stmt = $this->db->prepare("INSERT INTO livros (autor, titulo) VALUES (:autor, :titulo)");
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->execute();
    }
    
}
?>