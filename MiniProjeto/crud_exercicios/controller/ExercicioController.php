<?php

require_once(__DIR__ . "/../dao/ExercicioDAO.php");
require_once(__DIR__ . "/../service/ExercicioService.php");
require_once(__DIR__ . "/../model/Exercicio.php");

class ExercicioController {

    private ExercicioDAO $exercicioDAO;
    private ExercicioService $exercicioService;

    public function __construct() {
        $this->exercicioDAO = new ExercicioDAO();
        $this->exercicioService = new ExercicioService();
    }

    public function listar(): array {
        return $this->exercicioDAO->listar();
    }

    public function buscarPorId(int $id): ?Exercicio {
        return $this->exercicioDAO->buscarPorId($id);
    }

    public function inserir(Exercicio $exercicio): array {
        $erros = $this->exercicioService->validarExercicio($exercicio);
        if(count($erros) > 0) return $erros;

        $erro = $this->exercicioDAO->inserir($exercicio);
        if($erro) {
            $erros[] = "Erro ao salvar o exercício!";
            if(defined('AMB_DEV') && AMB_DEV) {
                $erros[] = $erro->getMessage();
            }
        }
        return $erros;
    }

    public function alterar(Exercicio $exercicio): array {
        $erros = $this->exercicioService->validarExercicio($exercicio);
        if(count($erros) > 0) return $erros;

        $erro = $this->exercicioDAO->alterar($exercicio);
        if($erro) {
            $erros[] = "Erro ao atualizar o exercício!";
            if(defined('AMB_DEV') && AMB_DEV) {
                $erros[] = $erro->getMessage();
            }
        }
        return $erros;
    }

    public function excluirPorId(int $id): array {
        $erros = [];
        $erro = $this->exercicioDAO->excluirPorId($id);
        if($erro) {
            $erros[] = "Erro ao excluir o exercício!";
            if(defined('AMB_DEV') && AMB_DEV) {
                $erros[] = $erro->getMessage();
            }
        }
        return $erros;
    }
}

