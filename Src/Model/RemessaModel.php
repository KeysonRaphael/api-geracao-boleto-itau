<?php

namespace Itau\Model;

class RemessaModel
{

    //objetos complementares
    public $sacador;
    public $beneficiario;
    public $pagador;

    //boleto
    public $tipoAmbiente;
    public $tipoRegistro;
    public $tipoCobranca;
    public $tipoProduto;
    public $subproduto;
    public $tipoPagamento;
    public $tipoCarteiraTitulo;
    public $tituloAceite;
    public $nossoNumero;
    public $digitoVerificadorNossoNumero;
    public $dataVencimento;
    public $seuNumero;
    public $especie;
    public $valorCobrado;
    public $dataEmissao;
    public $dataLimitePagamento;
    public $indicadorPagamentoParcial;
    public $valorAbatimento;
    public $usoDaEmpresa;

    //moeda
    public $codigoMoedaCnab;

    //juros
    public $tipoJuros;
    public $dataJuros;
    public $percentualJuros;

    //multa
    public $tipoMulta;
    public $dataMulta;
    public $valorMulta;

    //grupo de desconto
    public $tipoDesconto;
    public $dataDesconto;
    public $valorDesconto;
    public $percentualDesconto;

    //recebimentos divergente
    public $tipoAutorizacaoRecebimento;
    public $tipoValorPercentualRecebimento;
    public $valorMinimoRecebimento;
    public $percentualMinimoRecebimento;
    public $valorMaximoRecebimento;
    public $percentualMaximoRecebimento;
}