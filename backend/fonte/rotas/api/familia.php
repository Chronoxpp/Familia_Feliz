<?php

header('Access-Control-Allow-Origin: *');
header('content-type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');


use Fonte\servicos\FamiliaServicos;

require_once __DIR__ . '/../../servicos/FamiliaServicos.php';
require_once __DIR__ . '/../../modelos/Familia.php';
require_once __DIR__ . '/../../DTO/FamiliaDTO.php';


$metodoRequisicao = $_SERVER['REQUEST_METHOD'];

$dadosHTTP = json_decode(file_get_contents('php://input'), true);
//Caso um metodo POST, PUT ou DELETE tenha sido requisitado eh necessario informar um corpo compativel com JSON na requisicao
if (!isset($dadosHTTP) && ($metodoRequisicao == 'POST' || $metodoRequisicao == 'PUT' || $metodoRequisicao == 'DELETE'))
{
    http_response_code(400);
    echo json_encode(array('mensagem' => 'JSON ausente ou inválido!'));
    exit();
}


$familiaServicos = new FamiliaServicos();

try
{
    if ($metodoRequisicao == 'GET')
    {
        if (!isset($_GET['idUsuario']))
        {
            throw new Exception('Identificador do usuário não informado!');
        }

        $familias = $familiaServicos->consultarFamilias($_GET['idUsuario']);
        echo json_encode(
            array(
                'mensagem' => 'Famílias encontradas com sucesso!',
                'familias' => $familias
            )
        );
    }

    elseif ($metodoRequisicao == 'POST')
    {
        $familia = FamiliaDTO::toObject($dadosHTTP);

        $familiaServicos->registrarFamilia($familia);

        http_response_code(200);
        echo json_encode(
            array(
                'mensagem' => 'Família registrada com sucesso!',
                'familia' => $familia
                )
        );
    }

    elseif ($metodoRequisicao == 'PUT')
    {
        $familia = FamiliaDTO::toObject($dadosHTTP);

        $familiaServicos->alterarFamilia($familia);

        http_response_code(200);
        echo json_encode(
            array(
                'mensagem' => 'Família alterada com sucesso!',
                'familia' => $familia
            )
        );
    }

    elseif ($metodoRequisicao == 'DELETE')
    {
        $familia = FamiliaDTO::toObject($dadosHTTP);

        $familiaServicos->deletarFamilia($familia);

        http_response_code(200);
        echo json_encode(
            array(
                'mensagem' => 'Família deletada com sucesso!',
                'familia' => $familia
            )
        );
    }

    else
    {
        throw new Exception('Informado método HTTP não reconhecido!');
    }
}
catch (Exception $erro)
{
    http_response_code(200);
    echo json_encode('Erro: ' . $erro->getMessage());
}
?>