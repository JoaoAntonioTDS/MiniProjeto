<?php

require_once(__DIR__ . "/../../controller/ExercicioController.php");

$id = $_GET['id'] ?? 0;

$exercicioCont = new ExercicioController();
$exercicio = $exercicioCont->buscarPorId($id);

if($exercicio) {
    $erros = $exercicioCont->excluirPorId($exercicio->getId());
    if($erros) {
        echo implode("<br>", $erros);
    } else {
        header("Location: listar.php");
        exit;
    }
} else {
    echo "Exercício não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
}




