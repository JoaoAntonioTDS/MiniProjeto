<?php

require_once(__DIR__ . "/../../model/Exercicio.php");
require_once(__DIR__ . "/../../model/Aparelho.php");
require_once(__DIR__ . "/../../controller/ExercicioController.php");

$msgErro = "";
$exercicio = null;

//Usuário já clicou no gravar
if(isset($_POST['nome'])) {
    $id          = $_POST["id"];
    $nome        = trim($_POST['nome']) ?: NULL;
    $descricao   = trim($_POST['descricao']) ?: NULL;
    $qtdVezes    = is_numeric($_POST['qtd_vezes']) ? $_POST['qtd_vezes'] : NULL;
    $idAparelho  = is_numeric($_POST['aparelho']) ? $_POST['aparelho'] : NULL;

    $exercicio = new Exercicio();
    $exercicio->setId($id);
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
    $erros = $exercicioCont->alterar($exercicio);

    if(!$erros) {
        header("Location: listar.php");
        exit;
    } else {
        $msgErro = implode("<br>", $erros);
    }

} else {
    //Usuário abriu a página para ver o formulário
    $id = $_GET['id'] ?? 0;

    $exercicioCont = new ExercicioController();
    $exercicio = $exercicioCont->buscarPorId($id);

    if(!$exercicio) {
        echo "ID do exercício inválido!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");
