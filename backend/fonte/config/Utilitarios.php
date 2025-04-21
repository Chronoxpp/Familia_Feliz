<?php

namespace fonte\config;

class Utilitarios
{
    static function carregarEnv($caminho = "")
    {
        if(!$caminho)
        {
            $caminho = __DIR__ . '\.env';
        }

        if (!file_exists($caminho))
        {
            throw new Exception(".env não encontrado em: $caminho");
        }

        $linhas = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($linhas as $linha) {
            if (strpos(trim($linha), '#') === 0) continue;

            list($chave, $valor) = explode('=', $linha, 2);
            $chave = trim($chave);
            $valor = trim($valor);

            // Remove aspas se existirem
            $valor = trim($valor, "\"'");

            putenv("$chave=$valor");
            $_ENV[$chave] = $valor;
        }
    }
}