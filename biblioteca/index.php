<?php

require_once 'autoloader.php'; //registro do autoloader para carregar classes em todo o código

try {
    $db = new PDO('mysql:host=localhost;dbname=livraria', 'root', 'Jesus100%');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

$biblioteca = new Biblioteca($db); //instanciando o objeto Biblioteca

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];

    if (!empty($autor) && !empty($titulo)) {
        $biblioteca->cadastrarLivro($autor, $titulo);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livrecas</title>
</head>
<body>
    <!-- Your HTML content here -->
    <div style="width: 400px;">
    <form action="index.php" method="POST">
        <fieldset>
            <legend>Cadastre seu livro aqui</legend>
            <div>
                <label for="autor">Autor:</label><br>
                <input type="text" name="autor" id="autor"><br>
            </div>
            <div>
                <label for="titulo">Título:</label><br>
                <input type="text" name="titulo" id="titulo"><br>
            </div><br>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
</div>
<?php

// $biblioteca->cadastrarLivro("Autor 1", "Título 1");
// $biblioteca->cadastrarLivro("Autor 2", "Título 2");
// $biblioteca->cadastrarLivro("Autor 3", "Título 3");

$biblioteca->exibirLivros();

?>
</body>
</html>


