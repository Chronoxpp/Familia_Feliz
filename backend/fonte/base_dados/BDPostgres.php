<?php

namespace App\base_dados;

require "vendor/autoload.php";

use PDO;
use PDOException;
use App\config\utilitarios;


class BDPostgres implements BaseDadosInterface
{
    private PDO $conexao;

    function conectar(): void
    {
        Utilitarios::carregarEnv();

        $dsn = 'pgsql:';
        $dsn .= 'host=' . getenv('BD_POSTGRES_HOST;');
        $dsn .= 'port=' . getenv('BD_POSTGRES_PORT;');
        $dsn .= 'dbname=' . getenv('BD_POSTGRES_NAME;');

        try
        {
            $conexao = new PDO(
                $dsn,
                getenv('BD_POSTGRES_USER'),
                getenv('BD_POSTGRES_PASSWORD'),
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        catch (PDOException $erro)
        {
            throw new PDOException('Não foi possível se conectar a base de dados Postgres. Erro: ' . $erro->getMessage());
        }
    }


    function desconectar(): void
    {
        unset($this->conexao);
    }


    function executar(string $sql, array $parametros): bool
    {
        try
        {
            $stmt = $this->conexao->prepare($sql);

            return $stmt->execute($parametros);
        }
        catch (PDOException $erro)
        {
            throw new PDOException('Operação não realizada na base de dados Postgres. Erro: ' . $erro->getMessage());
        }
    }


    public function consultar(string $sql, array $parametros): array
    {
        try
        {
            $stmt = $this->conexao->prepare($sql);

            $stmt->execute($parametros);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $erro)
        {
            throw new PDOException('Não foi possível consultar a base de dados Postgres. Erro: ' . $erro->getMessage());
        }
    }


    function abrirTransacao(): bool
    {
        return $this->conexao->beginTransaction();
    }


    function fecharTransacao(): bool
    {
        return $this->conexao->commit();
    }


    function cancelarTransacao(): bool
    {
        return $this->conexao->rollBack();
    }


    function obterIdUltimoInsert(): string
    {
        return $this->conexao->lastInsertId();
    }
}