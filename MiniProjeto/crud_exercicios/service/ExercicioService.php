<?php

require_once(__DIR__ . "/../model/Exercicio.php");

class ExercicioService {

    public function validarExercicio(Exercicio $exercicio): array {
        $erros = [];

        if(! $exercicio->getNome()) {
            $erros[] = "Informe o nome do exercício!";
        }

        if(! $exercicio->getDescricao()) {
            $erros[] = "Informe a descrição do exercício!";
        }

        if(! $exercicio->getQtdVezes() || $exercicio->getQtdVezes() <= 0) {
            $erros[] = "Informe a quantidade de vezes correta!";
        }

        if(! $exercicio->getAparelho() || ! $exercicio->getAparelho()->getId()) {
            $erros[] = "Informe o aparelho do exercício!";
        }

        return $erros;
    }
}
