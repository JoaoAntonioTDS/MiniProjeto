<?php

require_once(__DIR__ . "/../../model/Exercicio.php");
require_once(__DIR__ . "/../../model/Aparelho.php");
require_once(__DIR__ . "/../../controller/ExercicioController.php");

$msgErro = "";
$exercicio = null;

if(isset($_POST['nome'])) {
    $nome       = trim($_POST['nome']) ?: NULL;
    $descricao  = trim($_POST['descricao']) ?: NULL;
    $qtdVezes   = is_numeric($_POST['qtd_vezes']) ? $_POST['qtd_vezes'] : NULL;
    $idAparelho = is_numeric($_POST['aparelho']) ? $_POST['aparelho'] : NULL;

    $exercicio = new Exercicio();
    $exercicio->setId(0);
    $exercicio->setNome($nome);
    $exercicio->setDescricao($descricao);
    $exercicio->setQtdVezes($qtdVezes);

    if($idAparelho) {
        $aparelho = new Aparelho();
        $aparelho->setId($idAparelho);
        $exercicio->setAparelho($aparelho);
    } else {
        $exercicio->setAparelho(NULL);
    }

    $exercicioCont = new ExercicioController();
    $erros = $exercicioCont->inserir($exercicio);

    if(!$erros) {
        header("Location: listar.php");
        exit;
    } else {
        $msgErro = implode("<br>", $erros);
    }
}

include_once(__DIR__ . "/form.php");

