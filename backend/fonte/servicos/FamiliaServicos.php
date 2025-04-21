<?php

namespace Fonte\servicos;

use Error;
use Fonte\modelos\Familia;
use Fonte\modelos\Usuario;
use Fonte\repositorios\FamiliaRepositorio;
use mysql_xdevapi\Exception;

require_once __DIR__ . '/../../modelos/Familia.php';
require_once __DIR__ . '/../../modelos/Usuario.php';
require_once __DIR__ . '/../../repositorios/FamiliaRepositorio.php';


class FamiliaServicos
{
    private FamiliaRepositorio $repositorio;
    public function __construct()
    {
        $this->repositorio = new FamiliaRepositorio();
    }


    public function registrarFamilia(Familia $familia): Familia
    {
        $this->refinarFamilia($familia);

        $this->repositorio->registrarFamilia($familia);

        return $familia;
    }


    public function consultarFamilias(int $idUsuario): array
    {
        return $this->repositorio->consultarFamilias($idUsuario);
    }


    public function alterarFamilia(Familia $familia): Familia
    {
        $this->refinarFamilia($familia);

        $this->repositorio->alterarFamilia($familia);

        return $familia;
    }


    public function deletarFamilia(Familia $familia): Familia
    {
        return $this->repositorio->deletarFamilia($familia);
    }


    public function adicionarMembro(Familia $familia, Usuario $membro): Familia
    {
        $this->refinarFamilia($familia);
        $this->refinarMembro($membro);

        $this->repositorio->adicionarMembro($familia, $membro);

        return $familia;
    }


    public function removerMembro(Familia $familia, Usuario $membro): Familia
    {
        $this->repositorio->removerMembro($familia, $membro);

        return $familia;
    }


    private function refinarFamilia(Familia $familia): Familia
    {
        $familia->setDescricao(trim($familia->getDescricao()));
        if (! $familia->getDescricao())
        {
            throw new Exception('A familia deve possuir um nome/descrição!');
        }

        return $familia;
    }


    private function refinarMembro(Usuario $membro): Usuario
    {
        if (! $membro->getNome())
        {
            throw new Exception('Membro da família sem nome, todo membro deve possuir um nome!');
        }

        return $membro;
    }
}

?>