<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Exercicio.php");
require_once(__DIR__ . "/../model/Aparelho.php");

class ExercicioDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }

    public function listar(): array {
        $sql = "SELECT e.*, a.nome AS nome_aparelho
                FROM exercicios e
                JOIN aparelhos a ON e.id_aparelho = a.id
                ORDER BY e.nome";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->map($result);
    }

    public function buscarPorId(int $id): ?Exercicio {
        $sql = "SELECT e.*, a.nome AS nome_aparelho
                FROM exercicios e
                JOIN aparelhos a ON e.id_aparelho = a.id
                WHERE e.id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        $exercicios = $this->map($result);
        return count($exercicios) > 0 ? $exercicios[0] : null;
    }

    public function inserir(Exercicio $exercicio): ?PDOException {
        try {
            $sql = "INSERT INTO exercicios (nome, descricao, qtd_vezes, id_aparelho)
                    VALUES (?, ?, ?, ?)";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([
                $exercicio->getNome(),
                $exercicio->getDescricao(),
                $exercicio->getQtdVezes(),
                $exercicio->getAparelho()->getId()
            ]);
            return null;
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function alterar(Exercicio $exercicio): ?PDOException {
        try {
            $sql = "UPDATE exercicios 
                    SET nome = ?, descricao = ?, qtd_vezes = ?, id_aparelho = ?
                    WHERE id = ?";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([
                $exercicio->getNome(),
                $exercicio->getDescricao(),
                $exercicio->getQtdVezes(),
                $exercicio->getAparelho()->getId(),
                $exercicio->getId()
            ]);
            return null;
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function excluirPorId(int $id): ?PDOException {
        try {
            $sql = "DELETE FROM exercicios WHERE id = :id";
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();
            return null;
        } catch(PDOException $e) {
            return $e;
        }
    }

    private function map(array $result): array {
        $exercicios = [];
        foreach($result as $r) {
            $exercicio = new Exercicio();
            $exercicio->setId($r["id"]);
            $exercicio->setNome($r["nome"]);
            $exercicio->setDescricao($r["descricao"]);
            $exercicio->setQtdVezes($r["qtd_vezes"]);

            $aparelho = new Aparelho();
            $aparelho->setId($r["id_aparelho"]);
            $aparelho->setNome($r["nome_aparelho"]);

            $exercicio->setAparelho($aparelho);

            $exercicios[] = $exercicio;
        }
        return $exercicios;
    }
}
