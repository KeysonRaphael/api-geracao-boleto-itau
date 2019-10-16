<?php namespace Itau\Validator;

use Itau\Model\BeneficiarioModel;
use Itau\Model\PagadorModel;
use Itau\Model\RemessaModel;
use Itau\Model\SacadorModel;

class Parametros
{
    private $remessa;
    private $sacador;
    private $beneficiario;
    private $pagador;

    private $dadosBoleto = [];

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
    }

    private function tituloAceite(string $tituloAceite)
    {
        if (!isset($tituloAceite)) {
            echo \json_encode(["status" => "false", "mensagem" => "Titulo do aceite derá ser informado"] , JSON_UNESCAPED_UNICODE );
        }
        if ($tituloAceite  !==  "N" ||  $tituloAceite !== "S") {
            echo \json_encode(["status" => "false", "mensagem" => "Titulo do aceite informado está inválido"] , JSON_UNESCAPED_UNICODE );
        }

    }
}
