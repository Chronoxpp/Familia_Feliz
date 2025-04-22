<?php

namespace App\DTO;

require "vendor/autoload.php";

use App\modelos\Familia;
use App\modelos\Usuario;


class FamiliaDTO
{
    public static function toObject(array $dadosFamilia)
    {
        if (! isset($dadosFamilia['id']) || ! isset($dadosFamilia['descricao']))
        {
            throw new \ErrorException('Identificador ou descrição da família na informado!');
        }

        $membros = isset($dadosFamilia['membros']) ?
             array_map(
                function ($membro)
                {
                    return new Usuario($membro['id'], $membro['descricao']);
                },
                $dadosFamilia['membros']
            )
            : array();

        return new Familia($dadosFamilia['id'], $dadosFamilia['descricao'], $membros);
    }


    public static function toArray(Familia $familia)
    {
        $membros = $familia->getMembros() ?
            array_map(
                function ($membro)
                {
                    return array('id' => $membro->getId(),'descricao' => $membro->getDescricao());
                },
                $familia->getMembros()
            )
            : array();

        return array(
            'id' => $familia->getId(),
            'descricao' => $familia->getDescricao(),
            'membros' => $membros
        );
    }
}