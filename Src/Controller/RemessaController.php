<?php namespace Itau\Controller;

use Itau\Validator\Parametros;

class RemessaController
{
    public function gerarBoleto(array $dadosBoleto)
    {
        $req = new Parametros();
        $remessar = $req->validar($dadosBoleto);
    }
}
