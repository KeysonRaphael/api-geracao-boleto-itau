<?php

require_once 'vendor/autoload.php';

use Itau\Controller\RemessaController;

try {

    $dadosBoleto = [
        //dados boleto
        'titulo_aceite' => 'N',
        'tipo_carteira_titulo' => '109',
        'nosso_numero' => '00000001',
        'digito_verificador_nosso_numero' => 1,
        'data_vencimento' => '2019-10-05',
        'valor_cobrado' => '00000000000001600',
        'seu_numero' => '000001',
        'especie' => '01',
        'data_emissao' => '2019-09-30',
        'data_limite_pagamento' => '2019-10-08',
        'valor_abatimento' => '00000000000000000',

        //instruções
        'instrucao_boleto_1' => '- Sr. Caixa, cobrar multa de 2% após o vencimento',
        'instrucao_boleto_2' => '- Receber até 15 dias após o vencimento',
        'instrucao_boleto_3' => '- Juros/Mora por dia: 0,11% s/ o valor do titulo',
        'instrucao_boleto_4' => '- Em caso de dúvidas entre em contato conosco pelo telefone (31) 3327-6670',

        //pagador
        'cpf_cnpj_pagador' => '12149025612',
        'nome_pagador' => 'WANDER ALVES DA SILVA', //precisa reduzir o tamanho
        'logradouro_pagador' => 'AV DAS BANDEIRAS 370',
        'bairro_pagador' => 'JARDIM LAGUNA', //precisa reduzir o tamanho
        'cidade_pagador' => 'CONTAGEM',
        'uf_pagador' => 'MG',
        'cep_pagador' => '32140300',

        //sacador
        'cpf_cnpj_sacador_avalista' => '42784421000109',
        'nome_sacador_avalista' => 'KRYPTON SERVICOS CONTABEIS S/S', //precisa reduzir o tamanho
        'logradouro_sacador_avalista' => 'RUA VISCONDE DE TAUNAY - 173',
        'bairro_sacador_avalista' => 'SÃO LUCAS', //precisa reduzir o tamanho
        'cidade_sacador_avalista' => 'BELO HORIZONTE',
        'uf_sacador_avalista' => 'MG',
        'cep_sacador_avalista' => '30240300',

        //beneficiario
        'cpf_cnpj_beneficiario' => '34858827000152',
        'agencia_beneficiario' => '1403',
        'conta_beneficiario' => '0062159',
        'digito_verificador_conta_beneficiario' => '0',

        //juros
        'tipo_juros' => 5,
        'data_juros' => '',
        'percentual_juros' => '000000000000',

        //multa
        'tipo_multa' => 3,
        'data_multa' => '',
        'valor_multa' => '00000000000000000',

        //grupo desconto
        'tipo_desconto' => '0',
        'data_desconto' => '',
        'valor_desconto' => '00000000000000000',
        'percentual_desconto' => '000000000000',

        //recebimento divergente
        'tipo_autorizacao_recebimento' => '3',
        'tipo_valor_percentual_recebimento' => 'V',
        'valor_minimo_recebimento' => '00000000000001600',
        'percentual_minimo_recebimento' => '000000000000',
        'valor_maximo_recebimento' => '00000000000001600',
        'percentual_maximo_recebimento' => '000000000000',
    ];

    $remessaController = new RemessaController();
    echo ($remessaController->gerarBoleto($dadosBoleto));

} catch (Exception $e) {
    echo 'Falha ao iniciar o serviço.';
}
