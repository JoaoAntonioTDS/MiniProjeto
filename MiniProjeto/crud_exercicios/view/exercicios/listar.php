<?php
require_once(__DIR__ . "/../../controller/ExercicioController.php");

$exercicioCont = new ExercicioController();
$lista = $exercicioCont->listar();

include_once(__DIR__ . "/../include/header.php");
?>

<h3>Listagem de Exercícios</h3>
<div>
    <a href="inserir.php" class="btn btn-primary mb-2">Inserir</a>
</div>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Qtd. Vezes</th>
        <th>Aparelho</th>
  
    </tr>

    <?php foreach($lista as $exercicio): ?>
        <tr>
            <td><?= $exercicio->getId() ?></td>
            <td><?= $exercicio->getNome() ?></td>
            <td><?= $exercicio->getDescricao() ?></td>
            <td><?= $exercicio->getQtdVezes() ?></td>
            <td><?= $exercicio->getAparelho() ? $exercicio->getAparelho()->getNome() : '' ?></td>
            <td>
                <a href="alterar.php?id=<?= $exercicio->getId() ?>">
                    <img src="../../img/btn_editar.png">
                </a>
            </td>
            <td>
                <a href="excluir.php?id=<?= $exercicio->getId() ?>"
                   onclick="return confirm('Confirma a exclusão?');">
                    <img src="../../img/btn_excluir.png">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once(__DIR__ . "/../include/footer.php"); ?>

    
