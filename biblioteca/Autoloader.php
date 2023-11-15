<? //função que procura o nome da classe no mapeamento
    //de classes para arquivos e carrega o arquivo
    //correspondente ao instanciar uma classe
function myAutoloader($className) {
    // array associativo para mapear nomes das classes para seus respectivos arquivos
    $classMap = [
        'CamadaModel' => 'models/CamadaModel.php',
        'CamadaView' => 'view/CamadaView.php',
        'CamadaController' => 'controller/CamadaController.php',
        // Adicionar mais classes e diretórios conforme necessário
    ];

    if (array_key_exists($className, $classMap)) {
        require_once $classMap[$className];
    }
}
//registro do autoloader
spl_autoload_register('myAutoloader');

?>