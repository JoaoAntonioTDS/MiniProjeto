<?php

class Aparelho {

    private ?int $id;
    private ?string $nome;

    // Retorna o nome como string
    public function __toString(): string {
        return $this->nome ?? '';
    }

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
}
