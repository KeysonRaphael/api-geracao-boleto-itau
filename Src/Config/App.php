<?php

namespace Itau\Config;

class App
{

    public const DIR_TEMPLATE = 'itau/Src/Template/boleto.html';

    public const PARAMetro_CONFIG = [
        'tipo_ambiente' => 1, //tipo de ambiente: 1- TESTES | 2 - PRODUÇÃO
        'identificador' => '34858827000152', //CNPJ DA EMPRESA
        'itau_chave' => '9a6a013b-54df-49a5-bf99-f674761f5775',
        'client_id' => 'qOJjraGw4_x40',
        'client_secret' => 'vprsOPQTAX2SbTpzReoM6qHfah3xM8xdb6mRHIaw8ipcauEqJvxvPJNUKZ8pf5S2xF4Z9qSOce_20Qx2NW6pbA2',
    ];

}