<?php

namespace fonte\base_dados;

use Fonte\modelos\Familia;

interface BaseDadosInterface
{
    public function conectar();
    public function desconectar();

    public function consultar(string $sql, array $parametros);
    public function executar(string $sql, array $parametros);

    public function abrirTransacao();
    public function fecharTransacao();
    public function cancelarTransacao();
}