<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class BoletimAnalises{
    public $ba;
    public $backbone;
    public $mes;
    public $estacao;
    public $mnemonico;
    public $indicador_fibra;
    public $abertura;
    public $promessa;
    public $proximo_acionamento;
    public $baixa;
    public $sla;
    public $cod_atividade;
    public $obsoi;
    public $ga;
    public $nomecabo;
    public $entre_local;
    public $numero_cis;
    public $descricao_trecho;
    public $tipo_utilizacao;
    public $rede_metalica;
    public $causa_rompimento;
    public $sub_causa;
    public $desdobramento;
    public $ba_comum;
    public $ha_pendencia35d;
    public $necessario_jm;
    public $numero_jm;
    public $data_abertura;
    public $prev_regularizacao;
    public $informe_pendencia;
    public $material_pendencia;
    public $resp_pendencia;
    public $prazo;
    public $justificar_prazo;
    public $cirq_cli_envol;
    public $descricao_ocorrido;
    public $tempo_cgr;
    public $numero_bo;
    public $nao_abertura_bo;
    public $remanejo_fibra;
    public $usou_cabo;
    public $lote_cabo;
    public $metro_cabo;
    public $cod_sap_cabo;
    public $coordenadas_cabo;
    public $quantidade_cx;
    public $numero_emenda;
    public $coordenadas_enpe;
    public $endereco_enpe;
    public $add_croqui;
    public $supervisor;


    public function insert(){
        $this-> ba = (new Database('Boletim_analise'))-> insert([
            'ba'                    => $this->ba,
            'backbone'              => $this->backbone,
            'mes'                   => $this->mes,
            'estacao'               => $this->estacao,
            'mnemonico'             => $this->mnemonico,
            'indicador_fibra'       => $this->indicador_fibra,
            'abertura'              => $this->abertura,
            'promessa'              => $this->promessa,
            'proximo_acionamento'   => $this->proximo_acionamento,
            'baixa'                 => $this->baixa,
            'sla'                   => $this->sla,
            'cod_atividade'         => $this->cod_atividade,
            'obsoi'                 => $this->obsoi,
            'ga'                    => $this->ga,
            'nomecabo'              => $this->nomecabo,
            'entre_local'           => $this->entre_local,
            'numero_cis'            => $this->numero_cis,
            'descricao_trecho'      => $this->descricao_trecho,
            'tipo_utilizacao'       => $this->tipo_utilizacao,
            'rede_metalica'         => $this->rede_metalica,
            'causa_rompimento'      => $this->causa_rompimento,
            'sub_causa'             => $this->sub_causa,
            'desdobramento'         => $this->desdobramento,
            'ba_comum'              => $this->ba_comum,
            'ha_pendencia35d'       => $this->ha_pendencia35d,
            'necessario_jm'         => $this->necessario_jm,
            'numero_jm'             => $this->numero_jm,
            'data_abertura'         => $this->data_abertura,
            'prev_regularizacao'    => $this->prev_regularizacao,
            'informe_pendencia'     => $this->informe_pendencia,
            'material_pendencia'    => $this->material_pendencia,
            'resp_pendencia'        => $this->resp_pendencia,
            'prazo'                 => $this->prazo,
            'justificar_prazo'      => $this->justificar_prazo,
            'cirq_cli_envol'        => $this->cirq_cli_envol,
            'descricao_ocorrido'    => $this->descricao_ocorrido,
            'tempo_cgr'             => $this->tempo_cgr,
            'numero_bo'             => $this->numero_bo,
            'nao_abertura_bo'       => $this->nao_abertura_bo,
            'remanejo_fibra'        => $this->remanejo_fibra,
            'usou_cabo'             => $this->usou_cabo,
            'lote_cabo'             => $this->lote_cabo,
            'metro_cabo'            => $this->metro_cabo,
            'cod_sap_cabo'          => $this->cod_sap_cabo,
            'coordenadas_cabo'      => $this->coordenadas_cabo,
            'quantidade_cx'         => $this->quantidade_cx,
            'numero_emenda'         => $this->numero_emenda,
            'coordenadas_enpe'      => $this->coordenadas_enpe,
            'endereco_enpe'         => $this->endereco_enpe,
            'add_croqui'            => $this->add_croqui,
            'supervisor'            => $this->supervisor,
            

        ]);
        
        return true;
    }

    public function update(){
        return (new Database('Boletim_analise'))-> update('ba = ' .$this->ba,[
            'ba'                    => $this->ba,
            'backbone'              => $this->backbone,
            'mes'                   => $this->mes,
            'estacao'               => $this->estacao,
            'mnemonico'             => $this->mnemonico,
            'indicador_fibra'       => $this->indicador_fibra,
            'abertura'              => $this->abertura,
            'promessa'              => $this->promessa,
            'proximo_acionamento'   => $this->proximo_acionamento,
            'baixa'                 => $this->baixa,
            'sla'                   => $this->sla,
            'cod_atividade'         => $this->cod_atividade,
            'obsoi'                 => $this->obsoi,
            'ga'                    => $this->ga,
            'nomecabo'              => $this->nomecabo,
            'entre_local'           => $this->entre_local,
            'numero_cis'            => $this->numero_cis,
            'descricao_trecho'      => $this->descricao_trecho,
            'tipo_utilizacao'       => $this->tipo_utilizacao,
            'rede_metalica'         => $this->rede_metalica,
            'causa_rompimento'      => $this->causa_rompimento,
            'sub_causa'             => $this->sub_causa,
            'desdobramento'         => $this->desdobramento,
            'ba_comum'              => $this->ba_comum,
            'ha_pendencia35d'       => $this->ha_pendencia35d,
            'necessario_jm'         => $this->necessario_jm,
            'numero_jm'             => $this->numero_jm,
            'data_abertura'         => $this->data_abertura,
            'prev_regularizacao'    => $this->prev_regularizacao,
            'informe_pendencia'     => $this->informe_pendencia,
            'material_pendencia'    => $this->material_pendencia,
            'resp_pendencia'        => $this->resp_pendencia,
            'prazo'                 => $this->prazo,
            'justificar_prazo'      => $this->justificar_prazo,
            'cirq_cli_envol'        => $this->cirq_cli_envol,
            'descricao_ocorrido'    => $this->descricao_ocorrido,
            'tempo_cgr'             => $this->tempo_cgr,
            'numero_bo'             => $this->numero_bo,
            'nao_abertura_bo'       => $this->nao_abertura_bo,
            'remanejo_fibra'        => $this->remanejo_fibra,
            'usou_cabo'             => $this->usou_cabo,
            'lote_cabo'             => $this->lote_cabo,
            'metro_cabo'            => $this->metro_cabo,
            'cod_sap_cabo'          => $this->cod_sap_cabo,
            'coordenadas_cabo'      => $this->coordenadas_cabo,
            'quantidade_cx'         => $this->quantidade_cx,
            'numero_emenda'         => $this->numero_emenda,
            'coordenadas_enpe'      => $this->coordenadas_enpe,
            'endereco_enpe'         => $this->endereco_enpe,
            'add_croqui'            => $this->add_croqui,
            'supervisor'            => $this->supervisor,

        ]);
    }

    

    public static function findById($ba){
        return self::getBAs('ba = '.$ba)->fetchObject(self::class);
    }

    public static function getBAs($where = null, $order = null, $limit = null, $field = '*'){
        return (new Database('Boletim_analise'))->select($where,$order,$limit,$field);
    }

}