<?php

require_once(__DIR__ . "/../../controller/AparelhoController.php");

$aparelhoCont = new AparelhoController();
$aparelhos = $aparelhoCont->listar();

include_once(__DIR__ . "/../include/header.php");
?>

<h3><?= isset($exercicio) && $exercicio->getId() > 0 ? 'Alterar' : 'Inserir' ?> exercício</h3>

<div class="row">
    <div class="col-6">
        <form method="POST" action="">

            <div>
                <label for="txtNome" class="form-label">Nome:</label>
                <input type="text" id="txtNome" name="nome" class="form-control"
                       value="<?= isset($exercicio) ? $exercicio->getNome() : '' ?>">
            </div>

            <div>
                <label for="txtDescricao" class="form-label">Descrição:</label>
                <input type="text" id="txtDescricao" name="descricao" class="form-control"
                       value="<?= isset($exercicio) ? $exercicio->getDescricao() : '' ?>">
            </div>

            <div>
                <label for="txtQtdVezes" class="form-label">Qtd. Vezes:</label>
                <input type="number" id="txtQtdVezes" name="qtd_vezes" class="form-control"
                       value="<?= isset($exercicio) ? $exercicio->getQtdVezes() : '' ?>">
            </div>

            <div>
                <label for="selAparelho" class="form-label">Aparelho:</label>
                <select name="aparelho" id="selAparelho" class="form-select">
                    <option value="">----Selecione----</option>
                    <?php foreach($aparelhos as $a): ?>
                        <option value="<?= $a->getId() ?>"
                            <?= isset($exercicio) && $exercicio->getAparelho() && $exercicio->getAparelho()->getId() == $a->getId() ? 'selected' : '' ?>>
                            <?= $a->getNome() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="id" value="<?= isset($exercicio) ? $exercicio->getId() : 0 ?>">

            <div class="mt-2">
                <button type="submit" class="btn btn-success">Gravar</button>
            </div>

        </form>
    </div>

    <div class="col-6">
        <?php if(isset($msgErro) && $msgErro): ?>
            <div class="alert alert-danger"><?= $msgErro ?></div>
        <?php endif; ?>
    </div>
</div>

<div class="mt-2">
    <a href="listar.php" class="btn btn-outline-primary">Voltar</a>
</div>

<?php include_once(__DIR__ . "/../include/footer.php"); ?>

