<?php

namespace fonte\repositorios;

use Fonte\modelos\Familia;
use Fonte\modelos\Usuario;
use Fonte\base_dados\BaseDadosInterface;
use Fonte\base_dados\BaseDadosPostgres;


class FamiliaRepositorio
{
    private BaseDadosInterface $baseDados;

    public function __construct(?BaseDadosInterface $baseDados = null)
    {
        $this->baseDados = $baseDados ?? new BaseDadosPostgres();
    }


    public function registrarFamilia(Familia $familia): Familia
    {
        $sql = 'INSERT INTO familias(descricao) VALUES(:descricao);';

        $parametros = array(
            ':descricao' => $familia->getDescricao()
        );

        $this->baseDados->executar($sql, $parametros);

        $familia->setId($this->baseDados->obterIdUltimoInsert());

        if ($familia->getMembros())
        {
            foreach ($familia->getMembros() as $membro)
            {
                $this->adicionarMembro($familia, $membro);
            }
        }

        return $familia;
    }


    public function alterarFamilia(Familia $familia): Familia
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
        $sql .= ' FROM familias AS f';
        $sql .= ' INNER JOIN familia_membros AS fm ON fm.id_familia = f.id';
        $sql .= ' WHERE fm.id_familia = :id_membro;';

        $parametros = array(
            ':id_membro' => $usuario->getId()
        );

        $familiasBD = $this->baseDados->consultar($sql, $parametros);

         return array_map(
            function ($familiaBD)
            {
                $familia = new Familia($familiaBD['id'],  $familiaBD['descricao'], null);

                $membros = $this->consultarMembros($familia);

                $familia->setMembros($membros);

                return $familia;
            },
            $familiasBD
        );
    }


    public function consultarMembros(Familia $familia): array
    {
        $sql = 'SELECT id, nome';
        $sql .= ' FROM usuarios AS u';
        $sql .= ' INNER JOIN familia_membros AS fm ON fm.id_membro = u.id_usuario';
        $sql .= ' WHERE fm.id_familia = :id_familia;';

        $parametros = array(
            ':id_familia' => $familia->getId()
        );

        $membrosBD = $this->baseDados->consultar($sql, $parametros);

        return array_map(
            function ($membro)
            {
                return new Usuario($membro['id'], $membro['nome']);
            },
            $membrosBD
        );
    }


    function deletarFamilia(Familia $familia): bool
    {
        $sql = 'DELETE FROM familias WHERE id = :id;';

        $parametros = array(
            ':id' => $familia->getId()
        );

        $this->baseDados->executar($sql, $parametros);

        unset($familia);

        return true;
    }


    function adicionarMembro(Familia $familia, Usuario $membro): Familia
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

        $membros = array_filter(
            $familia->getMembros(),
            function ($membroFilter) use ($membro)
            {
                return $membroFilter->getId() != $membro->getId();
            }
        );

        $familia->setMembros($membros);

        return $familia;
    }
}