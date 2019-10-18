<?php namespace Itau\Validator;

use Itau\Model\BeneficiarioModel;
use Itau\Model\PagadorModel;
use Itau\Model\RemessaModel;
use Itau\Model\SacadorModel;
use Carbon\Carbon;

class Parametros
{
    private $remessa;
    private $sacador;
    private $beneficiario;
    private $pagador;

    public function __construct()
    {
        $this->remessa = new RemessaModel();
        $this->sacador = new SacadorModel();
        $this->beneficiario = new BeneficiarioModel();
        $this->pagador = new PagadorModel();
    }

    public function validar(array $dados)
    {
        $this->tituloAceite($dados['titulo_aceite']);
        $this->tipoCarteiraTitulo($dados['tipo_carteira_titulo']);
        $this->nossoNumero($dados['nosso_numero']);
        $this->digitoVerificadorNossoNumero($dados['digito_verificador_nosso_numero']);
        $this->dataVencimento($dados['data_vencimento']);

        $this->remessa->sacador = $this->sacador;
        $this->remessa->beneficiario = $this->beneficiario;
        $this->remessa->pagador = $this->pagador;

        return $this->remessa;
    }

    private function tituloAceite(string $tituloAceite)
    {
        if (!isset($tituloAceite)) {
            echo \json_encode(["status" => "false", "mensagem" => "Titulo do aceite derá ser informado"], JSON_UNESCAPED_UNICODE);
        }

        if ($tituloAceite != "N" && $tituloAceite != "S") {
            echo \json_encode(["status" => "false", "mensagem" => "Titulo do aceite informado inválido"], JSON_UNESCAPED_UNICODE);
        }

        $this->remessa->tituloAceite = $tituloAceite;
    }

    private function tipoCarteiraTitulo(string $tipoCarteiraTitulo)
    {
        if (!isset($tipoCarteiraTitulo)) {
            echo \json_encode(["status" => "false", "mensagem" => "Tipo de carteira derá ser informado"], JSON_UNESCAPED_UNICODE);
        }

        $carteiras = [
            '109', '110', '111', '124', '125', '133', '142', '143', '145', '146', '148', '149', '153', '160', '167', '175', '179', '186',
            '187', '189', '196', '198', '202', '203', '210',
        ];

        $next = false;
        foreach ($carteiras as $carteira) {
            if ($tipoCarteiraTitulo == $carteira) {
                $next = true;
            }
        }
        if (!$next) {
            echo \json_encode(["status" => "false", "mensagem" => "Carteira informado inválido"], JSON_UNESCAPED_UNICODE);
        }
        $this->remessa->tipoCarteiraTitulo = $tipoCarteiraTitulo;
    }

    private function nossoNumero(string $nossoNumero)
    {
        if (!isset($nossoNumero)) {
            echo \json_encode(["status" => "false", "mensagem" => "Nosso número derá ser informado"], JSON_UNESCAPED_UNICODE);
        }

        //Enviar os 8 primeiros dígitos no campo nosso
        //número e os dígitos restantes no campo seu
        //número.
        if ($this->remessa->tipoCarteiraTitulo == 189 ||
            $this->remessa->tipoCarteiraTitulo == 196 ||
            $this->remessa->tipoCarteiraTitulo == 198
        ) {
            $tamanho = strlen($nossoNumero);
            $this->remessa->nossoNumero = substr($nossoNumero, 0, 8);
            $exedente = substr($nossoNumero, 8, $tamanho);
            $this->remessa->seuNumero = $exedente . $this->remessa->seuNumero;
 
            //gerar codigo de barras
            //Para carteiras com nosso número adicional sempre enviar o código de barras. 
            $this->remessa->codigoBarras = true;
        }

        //Enviar valor do nosso número no campo uso da empresa.
        $this->remessa->usoDaEmpresa = null;
        if ($this->remessa->tipoCarteiraTitulo == 133) {
            $this->remessa->usoDaEmpresa = $nossoNumero;

            //gerar codigo de barras//gerar codigo de barras
            //Para carteiras com nosso número adicional sempre enviar o código de barras. 
            $this->remessa->codigoBarras = true;
        }

        $this->remessa->nossoNumero = $nossoNumero;
    }

    private function digitoVerificadorNossoNumero(string $digitoVerificadorNossoNumero)
    {
        if (!isset($digitoVerificadorNossoNumero)) {
            echo \json_encode(["status" => "false", "mensagem" => "Digito verificador do nosso número derá ser informado"], JSON_UNESCAPED_UNICODE);
        }

        $this->remessa->digitoVerificadorNossoNumero = $digitoVerificadorNossoNumero;
    }

    private function dataVencimento(string $dataVencimento)
    {
        
        if (!empty($dataVencimento)) {
        
            $this->remessa->dataVencimento =  $dataVencimento;

        }
    }

}
