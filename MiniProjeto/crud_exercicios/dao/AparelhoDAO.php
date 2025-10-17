<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Aparelho.php");

class AparelhoDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }

    public function listar(): array {
        $sql = "SELECT * FROM aparelhos ORDER BY nome"; // Nome da tabela: aparelhos
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->map($resultado);
    }

    private function map(array $resultado): array {
        $aparelhos = [];
        foreach($resultado as $r) {
            $aparelho = new Aparelho();
            $aparelho->setId($r['id']);
            $aparelho->setNome($r['nome']);
            $aparelhos[] = $aparelho;
        }
        return $aparelhos;
    }
}
