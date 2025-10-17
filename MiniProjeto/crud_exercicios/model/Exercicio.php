<?php

require_once(__DIR__ . "/Aparelho.php");

class Exercicio {

    private ?int $id;
    private ?string $nome;
    private ?string $descricao;
    private ?int $qtdVezes;
    private ?Aparelho $aparelho;

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(?string $nome): self {
        $this->nome = $nome;
        return $this;
    }

    public function getDescricao(): ?string {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self {
        $this->descricao = $descricao;
        return $this;
    }

    public function getQtdVezes(): ?int {
        return $this->qtdVezes;
    }

    public function setQtdVezes(?int $qtdVezes): self {
        $this->qtdVezes = $qtdVezes;
        return $this;
    }

    public function getAparelho(): ?Aparelho {
        return $this->aparelho;
    }

    public function setAparelho(?Aparelho $aparelho): self {
        $this->aparelho = $aparelho;
        return $this;
    }
}
