<?php

namespace fonte\base_dados;

use PDO;
use PDOException;

class BDPostgres implements BaseDadosInterface
{
    private $conexao;
    function conectar()
    {
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

    function desconectar()
    {
        $this->conexao = null;
    }

    function executar(array $sql, array $parametros)
    {
        $stmt = $this->conexao->prepare($sql);

        try
        {
            return $stmt->execute($parametros);
        }
        catch (PDOException $erro)
        {
            throw new PDOException('Operação não realizada na base de dados Postgres. Erro: ' . $erro->getMessage());
        }
    }

    public function consultar(array $sql, array $parametros)
    {
        $stmt = $this->conexao->prepare($sql);

        return $stmt->conexao->execute($parametros, );
    }
}