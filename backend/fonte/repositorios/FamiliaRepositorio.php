<?php

namespace fonte\repositorios;

use Fonte\modelos\Familia;
use Fonte\base_dados\BaseDadosInterface;

class FamiliaRepositorio
{
    private BaseDadosInterface $baseDados;

    function __construct(BaseDadosInterface $baseDados)
    {
        if($baseDados)
        {
            $this->baseDados = $baseDados;
            return;
        }

        $this->baseDados = new BaseDadosPostgres();
    }
    function registrarFamilia(Familia $familia): Familia
    {
        $sql = 'INSERT INTO familias(descricao) VALUES(:descricao);';
        $parametros = array(
            ':descricao' => $familia->getDescricao()
        );

        $id_familia = $this->baseDados->executar($sql, $parametros);

        $familia->setId($id_familia);

        return $familia;
    }

    function alterarFamilia(Familia $familia): Familia
    {
        $sql = 'UPDATE familias SET descricao = :descricao WHERE id = :id;';
        $parametros = array(
            ':descricao' => $familia->getDescricao(),
            ':id' => $familia->getId()
        );

        $this->baseDados->executar($sql, $parametros);

        return $familia;
    }

    function consultarFamilias(Usuario $usuario): array
    {
        $sql = 'SELECT id, descricao';
        $sql .= ' FROM familias as f';
        $sql .= ' INNER JOIN familia_membros AS fm ON fm.id_familia = f.id';
        $sql .= ' WHERE fm.id_familia = :id_membro;';
        $parametros = array(
            ':id_membro' => $usuario->getId()
        );

        $familiasBD = $this->baseDados->consultar($sql, $parametros);

        $familias = array_map(
            function ($familiaBD)
            {
                $familia = new Familia($familiaBD['id'], $familiaBD['descricao'], NULL);

                $sql = 'SELECT id, nome';
                $sql .= ' FROM usuarios AS u';
                $sql .= ' INNER JOIN familia_membros AS fm ON fm.id_membro = u.id_usuario';
                $sql .= ' WHERE fm.id_familia = :id_familia;';
                $parametros = array(
                    ':id_familia' => $familia->getId()
                );

                $membrosBD = $this->baseDados->consultar($sql, $parametros);
                $membros = array_map(
                    function ($membro)
                    {
                        return new MembroFamilia($membro['id'], $membro['nome']);
                    },
                    $membrosBD
                );

                $familia->setMembros($membros);
                return $familia;
            },
            $familiasBD
        );

        return $familias;
    }

    function deletarFamilia(Familia $familia): bool
    {
        $sql = 'DELETE FROM familias WHERE id = :id;';
        $parametros = array(
            ':id' => $familia->getId()
        );

        $this->baseDados->executar($sql, $parametros);

        return true;
    }

    function adicionarMembro(Usuario $membro, Familia $familia): Familia
    {
        $sql = 'INSERT INTO familia_membros(id_familia, id_membro)VALUES(:id_familia, :id_membro);';
        $parametros = array(
            ':id_familia' => $familia->getId(),
            ':id_membro' => $membro->getId()
        );

        $this->baseDados->executar($sql, $parametros);

        $membros = $familia->getMembros();
        $membros[] = $membro;
        $familia->setMembros($membros);

        return $familia;
    }

    function removerMembro(Familia $familia, Usuario $membro): Familia
    {
        $sql = 'DELETE FROM familia_membros WHERE id_familia = :id_familia AND id_membro = :id_membro;';
        $parametros = array(
            'id_familia' => $familia->getId(),
            'id_membro' => $membro->getId()
        );

        $this->baseDados->executar($sql, $parametros);

        $membros = $familia->getMembros();
        foreach ($membros as $indice => $membroForeach)
        {
            if($membroForeach->getId() != $membro->getId())
            {
                unset($membros[$indice]);
                break;
            }
        }
        $familia->setMembros($membros);

        return $familia;
    }
}