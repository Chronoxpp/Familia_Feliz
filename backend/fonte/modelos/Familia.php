<?php

namespace App\modelos;

require "vendor/autoload.php";


class Familia
{
    private int $id;
    private string $descricao;
    private array $membros;


    public function __construct(int $id, string $descricao, array $membros)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->membros = $membros;
    }


    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }


    public function getMembros(): array
    {
        return $this->membros;
    }
    public function setMembros(array $membros): void
    {
        $this->membros = $membros;
    }
}