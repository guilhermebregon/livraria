<?php

include_once 'CamadaView.php';
include_once 'CamadaModel.php';

class CamadaController {
    private $visao;
    private $modelo;

    public function __construct($visao, $modelo) {
        $this->visao = $visao;
        $this->modelo = $modelo;

        include 'formulario.php';
    }

    private function processarFormulario() {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

           $this->modelo->setNum1($_POST["numero1"]);  
	   $this->modelo->setNum2($_POST["numero2"]);

           $this->visao->show($this->modelo->soma());

	} else {
	   $this->visao->show("Erro");
        }
    }
}
?>