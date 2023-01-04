<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class MascarasEncerramento{
    public $ba;
    public $enpe_e_emf_repasse;
    public $localidade;
    public $estacao_central;
    public $ramificacao;
    public $trecho;
    public $quantidade_de_emendas;
    public $tipo_de_emenda;
    public $codigo_numero_cabo;
    public $modelo_emenda;
    public $fabricante;
    public $quantidade_fibra_cabo;
    public $quantidade_fusao_realizada;
    public $sistema_afetado;
    public $acaoCorretiva;
    public $codigo_caixa_emenda01;
    public $numero_emenda01;
    public $endereço_emenda01;
    public $referencia_emenda01;
    public $distancia_emenda01;
    public $coordenada_emenda01;
    public $aplicou_segunda_emenda;
    public $codigo_caixa_emenda02;
    public $numero_emenda02;
    public $endereço_emenda02;
    public $referencia_emenda02;
    public $distancia_emenda02;
    public $coordenada_emenda02;
    public $nome_completo;
    public $re;
    public $observacoes ;
    public $problema_encontrado ;
    public $causa_raiz;
    public $ro_cis	;
    public $causador_dano;
    public $miscelaneas ;
    public $foto_antes;
    public $foto_depois;

    public function insert(){
        $this-> ba = (new Database('MascarasEncerramento'))-> insert([
            'ba'                        => $this->ba,
            'enpe_e_emf_repasse'        => $this->enpe_e_emf_repasse,
            'localidade'                => $this->localidade,
            'estacao_central'           => $this->estacao_central,
            'ramificacao'               => $this->ramificacao,
            'trecho'                    => $this->trecho,
            'quantidade_de_emendas'     => $this->quantidade_de_emendas,
            'tipo_de_emenda'            => $this->tipo_de_emenda,
            'codigo_numero_cabo'        => $this->codigo_numero_cabo,
            'modelo_emenda'             => $this->modelo_emenda,
            'fabricante'                => $this->fabricante,
            'quantidade_fibra_cabo'     => $this->quantidade_fibra_cabo,
            'quantidade_fusao_realizada'=> $this->quantidade_fusao_realizada,
            'sistema_afetado'           => $this->sistema_afetado,
            'acaoCorretiva'             => $this->acaoCorretiva,
            'codigo_caixa_emenda01'     => $this->codigo_caixa_emenda01,
            'numero_emenda01'           => $this->numero_emenda01,
            'endereço_emenda01'         => $this->endereço_emenda01,
            'referencia_emenda01'       => $this->referencia_emenda01,
            'distancia_emenda01'        => $this->distancia_emenda01,
            'coordenada_emenda01'       => $this->coordenada_emenda01,
            'aplicou_segunda_emenda'    => $this->aplicou_segunda_emenda,
            'codigo_caixa_emenda02'     => $this->codigo_caixa_emenda02,
            'numero_emenda02'           => $this->numero_emenda02,
            'endereço_emenda02'         => $this->endereço_emenda02,
            'referencia_emenda02'       => $this->referencia_emenda02,
            'distancia_emenda02'        => $this->distancia_emenda02,
            'coordenada_emenda02'       => $this->coordenada_emenda02,
            'nome_completo'             => $this->nome_completo,
            're'                        => $this->re,
            'observacoes'               => $this->observacoes,
            'problema_encontrado'       => $this->problema_encontrado,
            'causa_raiz'                => $this->causa_raiz,
            'ro_cis'                    => $this->ro_cis,
            'causador_dano'             => $this->causador_dano,
            'miscelaneas'               => $this->miscelaneas,
            'foto_antes'                => $this->foto_antes,
            'foto_depois'               => $this->foto_depois,

        ]);
        
        return true;
    }

    public function update(){
        return (new Database('MascarasEncerramento'))-> update('ba = ' .$this->ba,[
            'ba'                        => $this->ba,
            'enpe_e_emf_repasse'        => $this->enpe_e_emf_repasse,
            'localidade'                => $this->localidade,
            'estacao_central'           => $this->estacao_central,
            'ramificacao'               => $this->ramificacao,
            'trecho'                    => $this->trecho,
            'quantidade_de_emendas'     => $this->quantidade_de_emendas,
            'tipo_de_emenda'            => $this->tipo_de_emenda,
            'codigo_numero_cabo'        => $this->codigo_numero_cabo,
            'modelo_emenda'             => $this->modelo_emenda,
            'fabricante'                => $this->fabricante,
            'quantidade_fibra_cabo'     => $this->quantidade_fibra_cabo,
            'quantidade_fusao_realizada'=> $this->quantidade_fusao_realizada,
            'sistema_afetado'           => $this->sistema_afetado,
            'acaoCorretiva'             => $this->acaoCorretiva,
            'codigo_caixa_emenda01'     => $this->codigo_caixa_emenda01,
            'numero_emenda01'           => $this->numero_emenda01,
            'endereço_emenda01'         => $this->endereço_emenda01,
            'referencia_emenda01'       => $this->referencia_emenda01,
            'distancia_emenda01'        => $this->distancia_emenda01,
            'coordenada_emenda01'       => $this->coordenada_emenda01,
            'aplicou_segunda_emenda'    => $this->aplicou_segunda_emenda,
            'codigo_caixa_emenda02'     => $this->codigo_caixa_emenda02,
            'numero_emenda02'           => $this->numero_emenda02,
            'endereço_emenda02'         => $this->endereço_emenda02,
            'referencia_emenda02'       => $this->referencia_emenda02,
            'distancia_emenda02'        => $this->distancia_emenda02,
            'coordenada_emenda02'       => $this->coordenada_emenda02,
            'nome_completo'             => $this->nome_completo,
            're'                        => $this->re,
            'problema_encontrado'       => $this->problema_encontrado,
            'causa_raiz'                => $this->causa_raiz,
            'ro_cis'                    => $this->ro_cis,
            'causador_dano'             => $this->causador_dano,
            'miscelaneas'               => $this->miscelaneas,
            'foto_antes'                => $this->foto_antes,
            'foto_depois'               => $this->foto_depois,
        ]);
    }

    public function delete(){
        return (new Database('MascarasEncerramento'))-> delete('ba = ' .$this->ba,);
    }

    public static function getMaskById($ba){
        return self::getMasks('ba = '.$ba)->fetchObject(self::class);
    }

    public static function getMasks($where = null, $order = null, $limit = null, $field = '*'){
        return (new Database('MascarasEncerramento'))->select($where,$order,$limit,$field);
    }
}