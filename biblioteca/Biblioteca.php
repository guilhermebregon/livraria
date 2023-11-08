<?php

class Biblioteca {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    

    public function exibirLivros() {
        // Query the database to retrieve all book records from the 'livros' table
        $stmt = $this->db->query("SELECT autor, titulo FROM livros");
        
        // Fetch the result set as an associative array
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Display the retrieved books in an HTML table
        echo "<h2>Livros Cadastrados:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Autor</th><th>Título</th></tr>"; // Table header
    
        foreach ($books as $book) {
            echo "<tr>";
            echo "<td>" . $book['autor'] . "</td>";
            echo "<td>" . $book['titulo'] . "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    }
}

?>