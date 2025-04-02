<?php

namespace Fonte\servicos;

use Error;
use Fonte\modelos\Familia;
use Fonte\repositorios\FamiliaRepositorio;

class FamiliaServicos
{
    private FamiliaRepositorio $repositorio;
    public function __construct()
    {
        $this->repositorio = new FamiliaRepositorio();
    }

    public function registrarFamilia(string $descricao)
    {
        $familia = new Familia(null, $descricao, null);

        $this->refinarFamilia($familia);

        $familia = $this->repositorio->registrarFamilia($familia);

        return $familia;
    }

    public function consultarFamilias(Usuario $usuario)
    {
        $familias = $this->repositorio->consultarFamilias($usuario);

        return $familias;
    }

    public function alterarFamilia(Familia $familia)
    {
        $familia = $this->refinarFamilia($familia);

        $familia = $this->repositorio->alterarFamilia($familia);

        return $familia;
    }

    public function deletarFamilia($familia)
    {
        return $this->repositorio->deletarFamilia($familia) || false;
    }

    public function adicionarMembro(Familia $familia, Usuario $membro)
    {
        $familia = $this->refinarFamilia($familia);
        $membro = $this->refinarMembro($membro);

        $familia = $this->repositorio->adicionarMembro($familia, $membro);

        return $familia;
    }

    public function removerMembro(Familia $familia, Usuario $membro)
    {
        $familia = $this->repositorio->removerMembro($familia, $membro);

        return $familia;
    }

    private function refinarFamilia(Familia $familia)
    {
        if ($familia->getDescricao() == false)
        {
            throw new Error('Deve ser informado um nome para a família!');
        }
        $familia->setDescricao(trim($familia->getDescricao()));

        return $familia;
    }

    private function refinarMembro(Usuario $membro)
    {
        if ($membro->getNome() == false)
        {
            throw new Error('Membro da família sem nome, todo membro deve possuir um nome!');
        }

        return $membro;
    }
}

?>