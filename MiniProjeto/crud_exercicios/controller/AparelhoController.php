<?php

require_once(__DIR__ . "/../dao/AparelhoDAO.php");
require_once(__DIR__ . "/../model/Aparelho.php");

class AparelhoController {

    private AparelhoDAO $aparelhoDAO;

    public function __construct() {
        $this->aparelhoDAO = new AparelhoDAO();
    }

    public function listar(): array {
        return $this->aparelhoDAO->listar();
    }

    public function buscarPorId(int $id): ?Aparelho {
        return $this->aparelhoDAO->buscarPorId($id);
    }

    // Futuramente, você pode implementar inserir, alterar, excluir aqui
}
