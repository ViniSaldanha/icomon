<?php

namespace App\Controller\Cadastros;

use \App\Controller\Components\Alert;
use \App\Model\Entity\BoletimAnalises;
use \App\Model\Entity\MascarasEncerramento;
use \App\Controller\Page;
use \App\Utils\View;
use \App\Utils\CSV;
use stdClass;
use \WilliamCosta\DatabaseManager\Pagination;
use \App\Controller\Components\Options;

class BoletimAnalise extends Page{
    const SCRIPT_SRC = "/resources/views/cadastros/boletimAnalise/dados-csv.js";
    
    public static function getBAs($request){
        $content = View::render('cadastros/boletimAnalise/index',[
            'itens' => self::getBaItems($request,$obPagination),
            'pagination' => parent::getPagination($request,$obPagination),
            'status'   => self::getStatus($request) 
        ]);
        
        return parent::getPage('Ba > Icomon', $content, 'BoletimAnalise');
    }

    public static function getBA($request){
        $content = View::render('cadastros/boletimAnalise/new', [
            'opt-tipo-utilizacao' => Options::loadOptions('TP_UTILIZACAO')
        ]);
        
        return parent::getPage('Preencher BA', $content, 'cadastro-ba', BoletimAnalise::SCRIPT_SRC);
    }

    public static function setBA($request){
        $postVars            = $request->getPostvars();
        $ba                  = $postVars['ba'] ?? '';
        $backbone            = $postVars['backbone'] ?? '';
        $mes                 = $postVars['mes'] ?? '';
        $estacao             = $postVars['estacao'] ?? '';
        $mnemonico           = $postVars['mnemonico'] ?? '';
        $indicador_fibra     = $postVars['indicador_fibra'] ?? '';
        $abertura            = $postVars['abertura'] ?? '';
        $promessa            = $postVars['promessa'] ?? '';
        $proximo_acionamento = $postVars['proximo_acionamento'] ?? '';
        $baixa               = $postVars['baixa'] ?? '';
        $sla                 = $postVars['sla'] ?? '';
        $cod_atividade       = $postVars['cod_atividade'] ?? '';
        $obsoi               = $postVars['obsoi'] ?? '';
        $ga                  = $postVars['ga'] ?? '';
        $nomecabo            = $postVars['nomecabo'] ?? '';
        $entre_local         = $postVars['entre_local'] ?? '';
        $numero_cis          = $postVars['numero_cis'] ?? '';
        $descricao_trecho    = $postVars['descricao_trecho'] ?? '';
        $tipo_utilizacao     = $postVars['tipo_utilizacao'] ?? '';
        $rede_metalica       = $postVars['rede_metalica'] ?? '';
        $causa_rompimento    = $postVars['causa_rompimento'] ?? '';
        $sub_causa           = $postVars['sub_causa'] ?? '';
        $desdobramento       = $postVars['desdobramento'] ?? '';
        $ba_comum            = $postVars['ba_comum'] ?? '';
        $ha_pendencia35d     = $postVars['ha_pendencia35d'] ?? '';
        $necessario_jm       = $postVars['necessario_jm'] ?? '';
        $numero_jm           = $postVars['numero_jm'] ?? '';
        $data_abertura       = $postVars['data_abertura'] ?? '';
        $prev_regularizacao  = $postVars['prev_regularizacao'] ?? '';
        $informe_pendencia   = $postVars['informe_pendencia'] ?? '';
        $material_pendencia  = $postVars['material_pendencia'] ?? '';
        $resp_pendencia      = $postVars['resp_pendencia'] ?? '';
        $prazo               = $postVars['prazo'] ?? '';
        $justificar_prazo    = $postVars['justificar_prazo'] ?? '';
        $cirq_cli_envol      = $postVars['cirq_cli_envol'] ?? '';      
        $descricao_ocorrido  = $postVars['descricao_ocorrido'] ?? '';
        $tempo_cgr           = $postVars['tempo_cgr'] ?? '';
        $numero_bo           = $postVars['numero_bo'] ?? '';
        $nao_abertura_bo     = $postVars['nao_abertura_bo'] ?? '';
        $remanejo_fibra      = $postVars['remanejo_fibra'] ?? '';
        $usou_cabo           = $postVars['usou_cabo'] ?? '';
        $lote_cabo           = $postVars['lote_cabo'] ?? '';
        $metro_cabo          = $postVars['metro_cabo'] ?? '';
        $cod_sap_cabo        = $postVars['cod_sap_cabo'] ?? '';
        $coordenadas_cabo    = $postVars['coordenadas_cabo'] ?? '';
        $quantidade_cx       = $postVars['quantidade_cx'] ?? '';
        $numero_emenda       = $postVars['numero_emenda'] ?? '';
        $coordenadas_enpe    = $postVars['coordenadas_enpe'] ?? '';
        $endereco_enpe       = $postVars['endereco_enpe'] ?? '';
        $add_croqui          = $postVars['add_croqui'] ?? '';
        $supervisor          = $postVars['supervisor'] ?? '';
        
        $obItens                     = new BoletimAnalises; 
        $obItens->ba                  = $ba;
        $obItens->backbone            = $backbone;
        $obItens->mes                 = $mes;
        $obItens->estacao             = $estacao;
        $obItens->mnemonico           = $mnemonico;
        $obItens->indicador_fibra     = $indicador_fibra;
        $obItens->abertura            = $abertura;
        $obItens->promessa            = $promessa;
        $obItens->proximo_acionamento = $proximo_acionamento;
        $obItens->baixa               = $baixa;
        $obItens->sla                 = $sla;
        $obItens->cod_atividade       = $cod_atividade;
        $obItens->obsoi               = $obsoi;
        $obItens->ga                  = $ga;
        $obItens->nomecabo            = $nomecabo;
        $obItens->entre_local         = $entre_local;
        $obItens->numero_cis          = $numero_cis;
        $obItens->descricao_trecho    = $descricao_trecho;
        $obItens->tipo_utilizacao     = $tipo_utilizacao;
        $obItens->rede_metalica       = $rede_metalica;
        $obItens->causa_rompimento    = $causa_rompimento;
        $obItens->sub_causa           = $sub_causa;
        $obItens->desdobramento       = $desdobramento;
        $obItens->ba_comum            = $ba_comum;
        $obItens->ha_pendencia35d     = $ha_pendencia35d;
        $obItens->necessario_jm       = $necessario_jm;
        $obItens->numero_jm           = $numero_jm;
        $obItens->data_abertura       = $data_abertura;
        $obItens->prev_regularizacao  = $prev_regularizacao;
        $obItens->informe_pendencia   = $informe_pendencia;
        $obItens->material_pendencia  = $material_pendencia;
        $obItens->resp_pendencia      = $resp_pendencia;
        $obItens->prazo               = $prazo;
        $obItens->justificar_prazo    = $justificar_prazo;
        $obItens->cirq_cli_envol      = $cirq_cli_envol;
        $obItens->descricao_ocorrido  = $descricao_ocorrido;
        $obItens->tempo_cgr           = $tempo_cgr;
        $obItens->numero_bo           = $numero_bo;
        $obItens->nao_abertura_bo     = $nao_abertura_bo;
        $obItens->remanejo_fibra      = $remanejo_fibra;
        $obItens->usou_cabo           = $usou_cabo;
        $obItens->lote_cabo           = $lote_cabo;
        $obItens->metro_cabo          = $metro_cabo;
        $obItens->cod_sap_cabo        = $cod_sap_cabo;
        $obItens->coordenadas_cabo    = $coordenadas_cabo;
        $obItens->quantidade_cx       = $quantidade_cx;
        $obItens->numero_emenda       = $numero_emenda;
        $obItens->coordenadas_enpe    = $coordenadas_enpe;
        $obItens->endereco_enpe       = $endereco_enpe;
        $obItens->add_croqui          = $add_croqui;
        $obItens->supervisor          = $supervisor;
        $obItens->insert();
        $request->getRouter()->redirect('/cadastros/boletimAnalise?status=created');
    }

    public static function renderTableFromFile(){
        if(!isset($_FILES['arquivo-csv'])){
            die("Ocorreu um erro ao carregar o arquivo\n");
        }

        $filePath = $_FILES['arquivo-csv']['tmp_name'];
        $datalist = CSV::lerArquivo($filePath, true, ';');
        $itens = '';
        $_SESSION['ba']['dados-csv'] = $datalist;
        
        foreach($datalist as $row){
            $itens .= View::render('cadastros/boletimAnalise/dados-csv-item', [
                'ba'            => $row['BA'],
                'backbone'      => $row['BACKBONE'],
                'estacao'       => $row['ESTACAO'],
                'central'       => $row['CENTRAL'],
                'ga'            => $row['GA'] 
            ]);
        }

        $content = View::render('cadastros/boletimAnalise/dados-csv', [
            'itens' => $itens
        ]);
        
        return $content;
    }

    public static function getItemFromCsv($id){
        $dadosFromSession = $_SESSION['ba']['dados-csv'];
        $result = $dadosFromSession[$id];
        $mascaraEncerramento = MascarasEncerramento::getMaskById($result['BA']);
        $r = new stdClass;
        $r->data = $result;
        $r->mascaraEncerramento = $mascaraEncerramento;
        
        $resultAsJson = json_encode($r);
        
        return $resultAsJson;
    }

    public static function getEditBa($request,$ba){
        $obItens = BoletimAnalises::findById($ba);
        
        if(!$obItens instanceof BoletimAnalises){
            $request->getRouter()->redirect('/cadastros/boletimAnalise');
        }
        
        $content = View::render('cadastros/boletimAnalise/form',[
            'title'                 => 'Editar BA',
            'ba'                    => $obItens->ba,
            'backbone'              => $obItens->backbone,
            'mes'                   => $obItens->mes,
            'estacao'               => $obItens->estacao,
            'mnemonico'             => $obItens->mnemonico,
            'indicador_fibra'       => $obItens->indicador_fibra,
            'abertura'              => $obItens->abertura,
            'promessa'              => $obItens->promessa,
            'proximo_acionamento'   => $obItens->proximo_acionamento,
            'baixa'                 => $obItens->baixa,
            'sla'                   => $obItens->sla,
            'cod_atividade'         => $obItens->cod_atividade,
            'obsoi'                 => $obItens->obsoi,
            'ga'                    => $obItens->ga,
            'nomecabo'              => $obItens->nomecabo,
            'entre_local'           => $obItens->entre_local,
            'numero_cis'            => $obItens->numero_cis,
            'descricao_trecho'      => $obItens->descricao_trecho,
            'tipo_utilizacao'       => $obItens->tipo_utilizacao,
            'opt-tipo-utilizacao'   => Options::loadOptions('TP_UTILIZACAO', $obItens->tipo_utilizacao),
            'rede_metalica'         => $obItens->rede_metalica,
            'causa_rompimento'      => $obItens->causa_rompimento,
            'sub_causa'             => $obItens->sub_causa,
            'desdobramento'         => $obItens->desdobramento,
            'ba_comum'              => $obItens->ba_comum,
            'ha_pendencia35d'       => $obItens->ha_pendencia35d,
            'necessario_jm'         => $obItens->necessario_jm,
            'numero_jm'             => $obItens->numero_jm,
            'data_abertura'         => $obItens->data_abertura,
            'prev_regularizacao'    => $obItens->prev_regularizacao,
            'informe_pendencia'     => $obItens->informe_pendencia,
            'material_pendencia'    => $obItens->material_pendencia,
            'resp_pendencia'        => $obItens->resp_pendencia,
            'prazo'                 => $obItens->prazo,
            'justificar_prazo'      => $obItens->justificar_prazo,
            'cirq_cli_envol'        => $obItens->cirq_cli_envol,
            'descricao_ocorrido'    => $obItens->descricao_ocorrido,
            'tempo_cgr'             => $obItens->tempo_cgr,
            'numero_bo'             => $obItens->numero_bo,
            'nao_abertura_bo'       => $obItens->nao_abertura_bo,
            'remanejo_fibra'        => $obItens->remanejo_fibra,
            'usou_cabo'             => $obItens->usou_cabo,
            'lote_cabo'             => $obItens->lote_cabo,
            'metro_cabo'            => $obItens->metro_cabo,
            'cod_sap_cabo'          => $obItens->cod_sap_cabo,
            'coordenadas_cabo'      => $obItens->coordenadas_cabo,
            'quantidade_cx'         => $obItens->quantidade_cx,
            'numero_emenda'         => $obItens->numero_emenda,
            'coordenadas_enpe'      => $obItens->coordenadas_enpe,
            'endereco_enpe'         => $obItens->endereco_enpe,
            'add_croqui'            => $obItens->add_croqui,
            'supervisor'            => $obItens->supervisor,
            'status'                => self::getStatus($request)
        ]);

        return parent::getPage('Editar BA > Icomon', $content, 'ba');
    }

    public static function setEditBa($request,$ba){
        $obItens = BoletimAnalises::findById($ba);
        
        if(!$obItens instanceof BoletimAnalises){
            $request->getRouter()->redirect('/cadastros/boletimAnalise');
        }
        
        $postVars            = $request->getPostVars();
        $ba                  = $postVars['ba'] ?? '';
        $backbone            = $postVars['backbone'] ?? '';
        $mes                 = $postVars['mes'] ?? '';
        $estacao             = $postVars['estacao'] ?? '';
        $mnemonico           = $postVars['mnemonico'] ?? '';
        $indicador_fibra     = $postVars['indicador_fibra'] ?? '';
        $abertura            = $postVars['abertura'] ?? '';
        $promessa            = $postVars['promessa'] ?? '';
        $proximo_acionamento = $postVars['proximo_acionamento'] ?? '';
        $baixa               = $postVars['baixa'] ?? '';
        $sla                 = $postVars['sla'] ?? '';
        $cod_atividade       = $postVars['cod_atividade'] ?? '';
        $obsoi               = $postVars['obsoi'] ?? '';
        $ga                  = $postVars['ga'] ?? '';
        $nomecabo            = $postVars['nomecabo'] ?? '';
        $entre_local         = $postVars['entre_local'] ?? '';
        $numero_cis          = $postVars['numero_cis'] ?? '';
        $descricao_trecho    = $postVars['descricao_trecho'] ?? '';
        $tipo_utilizacao     = $postVars['tipo_utilizacao'] ?? '';
        $rede_metalica       = $postVars['rede_metalica'] ?? '';
        $causa_rompimento    = $postVars['causa_rompimento'] ?? '';
        $sub_causa           = $postVars['sub_causa'] ?? '';
        $desdobramento       = $postVars['desdobramento'] ?? '';
        $ba_comum            = $postVars['ba_comum'] ?? '';
        $ha_pendencia35d     = $postVars['ha_pendencia35d'] ?? '';
        $necessario_jm       = $postVars['necessario_jm'] ?? '';
        $numero_jm           = $postVars['numero_jm'] ?? '';
        $data_abertura       = $postVars['data_abertura'] ?? '';
        $prev_regularizacao  = $postVars['prev_regularizacao'] ?? '';
        $informe_pendencia   = $postVars['informe_pendencia'] ?? '';
        $material_pendencia  = $postVars['material_pendencia'] ?? '';
        $resp_pendencia      = $postVars['resp_pendencia'] ?? '';
        $prazo               = $postVars['prazo'] ?? '';
        $justificar_prazo    = $postVars['justificar_prazo'] ?? '';
        $cirq_cli_envol      = $postVars['cirq_cli_envol'] ?? '';      
        $descricao_ocorrido  = $postVars['descricao_ocorrido'] ?? '';
        $tempo_cgr           = $postVars['tempo_cgr'] ?? '';
        $numero_bo           = $postVars['numero_bo'] ?? '';
        $nao_abertura_bo     = $postVars['nao_abertura_bo'] ?? '';
        $remanejo_fibra      = $postVars['remanejo_fibra'] ?? '';
        $usou_cabo           = $postVars['usou_cabo'] ?? '';
        $lote_cabo           = $postVars['lote_cabo'] ?? '';
        $metro_cabo          = $postVars['metro_cabo'] ?? '';
        $cod_sap_cabo        = $postVars['cod_sap_cabo'] ?? '';
        $coordenadas_cabo    = $postVars['coordenadas_cabo'] ?? '';
        $quantidade_cx       = $postVars['quantidade_cx'] ?? '';
        $numero_emenda       = $postVars['numero_emenda'] ?? '';
        $coordenadas_enpe    = $postVars['coordenadas_enpe'] ?? '';
        $endereco_enpe       = $postVars['endereco_enpe'] ?? '';
        $add_croqui          = $postVars['add_croqui'] ?? '';
        $supervisor          = $postVars['supervisor'] ?? '';

        $obItens->ba                  = $ba;
        $obItens->backbone            = $backbone;
        $obItens->mes                 = $mes;
        $obItens->estacao             = $estacao;
        $obItens->mnemonico           = $mnemonico;
        $obItens->indicador_fibra     = $indicador_fibra;
        $obItens->abertura            = $abertura;
        $obItens->promessa            = $promessa;
        $obItens->proximo_acionamento = $proximo_acionamento;
        $obItens->baixa               = $baixa;
        $obItens->sla                 = $sla;
        $obItens->cod_atividade       = $cod_atividade;
        $obItens->obsoi               = $obsoi;
        $obItens->ga                  = $ga;
        $obItens->nomecabo            = $nomecabo;
        $obItens->entre_local         = $entre_local;
        $obItens->numero_cis          = $numero_cis;
        $obItens->descricao_trecho    = $descricao_trecho;
        $obItens->tipo_utilizacao     = $tipo_utilizacao;
        $obItens->rede_metalica       = $rede_metalica;
        $obItens->causa_rompimento    = $causa_rompimento;
        $obItens->sub_causa           = $sub_causa;
        $obItens->desdobramento       = $desdobramento;
        $obItens->ba_comum            = $ba_comum;
        $obItens->ha_pendencia35d     = $ha_pendencia35d;
        $obItens->necessario_jm       = $necessario_jm;
        $obItens->numero_jm           = $numero_jm;
        $obItens->data_abertura       = $data_abertura;
        $obItens->prev_regularizacao  = $prev_regularizacao;
        $obItens->informe_pendencia   = $informe_pendencia;
        $obItens->material_pendencia  = $material_pendencia;
        $obItens->resp_pendencia      = $resp_pendencia;
        $obItens->prazo               = $prazo;
        $obItens->justificar_prazo    = $justificar_prazo;
        $obItens->cirq_cli_envol      = $cirq_cli_envol;
        $obItens->descricao_ocorrido  = $descricao_ocorrido;
        $obItens->tempo_cgr           = $tempo_cgr;
        $obItens->numero_bo           = $numero_bo;
        $obItens->nao_abertura_bo     = $nao_abertura_bo;
        $obItens->remanejo_fibra      = $remanejo_fibra;
        $obItens->usou_cabo           = $usou_cabo;
        $obItens->lote_cabo           = $lote_cabo;
        $obItens->metro_cabo          = $metro_cabo;
        $obItens->cod_sap_cabo        = $cod_sap_cabo;
        $obItens->coordenadas_cabo    = $coordenadas_cabo;
        $obItens->quantidade_cx       = $quantidade_cx;
        $obItens->numero_emenda       = $numero_emenda;
        $obItens->coordenadas_enpe    = $coordenadas_enpe;
        $obItens->endereco_enpe       = $endereco_enpe;
        $obItens->add_croqui          = $add_croqui;
        $obItens->supervisor          = $supervisor;
        $obItens->update();
        $request->getRouter()->redirect('/cadastros/boletimAnalise/' .$obItens->ba.'/edit?status=updated');
    }

    public static function getPrintBa($request,$ba){
        $obItens = BoletimAnalises::findById($ba);
        
        if(!$obItens instanceof BoletimAnalises){
            $request->getRouter()->redirect('/cadastros/boletimAnalise');
        }
        
        $content = View::render('cadastros/boletimAnalise/gerar_pdf',[
            'title'                 => 'Boletim de Análise',
            'ba'                    => $obItens->ba,
            'backbone'              => $obItens->backbone,
            'mes'                   => $obItens->mes,
            'estacao'               => $obItens->estacao,
            'mnemonico'             => $obItens->mnemonico,
            'indicador_fibra'       => $obItens->indicador_fibra,
            'abertura'              => $obItens->abertura,
            'promessa'              => $obItens->promessa,
            'proximo_acionamento'   => $obItens->proximo_acionamento,
            'baixa'                 => $obItens->baixa,
            'sla'                   => $obItens->sla,
            'cod_atividade'         => $obItens->cod_atividade,
            'obsoi'                 => $obItens->obsoi,
            'ga'                    => $obItens->ga,
            'nomecabo'              => $obItens->nomecabo,
            'entre_local'           => $obItens->entre_local,
            'numero_cis'            => $obItens->numero_cis,
            'descricao_trecho'      => $obItens->descricao_trecho,
            'tipo_utilizacao'       => $obItens->tipo_utilizacao,
            'rede_metalica'         => $obItens->rede_metalica,
            'causa_rompimento'      => $obItens->causa_rompimento,
            'sub_causa'             => $obItens->sub_causa,
            'desdobramento'         => $obItens->desdobramento,
            'ba_comum'              => $obItens->ba_comum,
            'ha_pendencia35d'       => $obItens->ha_pendencia35d,
            'necessario_jm'         => $obItens->necessario_jm,
            'numero_jm'             => $obItens->numero_jm,
            'data_abertura'         => $obItens->data_abertura,
            'prev_regularizacao'    => $obItens->prev_regularizacao,
            'informe_pendencia'     => $obItens->informe_pendencia,
            'material_pendencia'    => $obItens->material_pendencia,
            'resp_pendencia'        => $obItens->resp_pendencia,
            'prazo'                 => $obItens->prazo,
            'justificar_prazo'      => $obItens->justificar_prazo,
            'cirq_cli_envol'        => $obItens->cirq_cli_envol,
            'descricao_ocorrido'    => $obItens->descricao_ocorrido,
            'tempo_cgr'             => $obItens->tempo_cgr,
            'numero_bo'             => $obItens->numero_bo,
            'nao_abertura_bo'       => $obItens->nao_abertura_bo,
            'remanejo_fibra'        => $obItens->remanejo_fibra,
            'usou_cabo'             => $obItens->usou_cabo,
            'lote_cabo'             => $obItens->lote_cabo,
            'metro_cabo'            => $obItens->metro_cabo,
            'cod_sap_cabo'          => $obItens->cod_sap_cabo,
            'coordenadas_cabo'      => $obItens->coordenadas_cabo,
            'quantidade_cx'         => $obItens->quantidade_cx,
            'numero_emenda'         => $obItens->numero_emenda,
            'coordenadas_enpe'      => $obItens->coordenadas_enpe,
            'endereco_enpe'         => $obItens->endereco_enpe,
            'add_croqui'            => $obItens->add_croqui,
            'supervisor'            => $obItens->supervisor,
        ]);

        return parent::getPrint('PDF BA > Icomon', $content, 'ba');
    }

    private static function getBaItems($request,&$obPagination){
        $itens = '';
        $quantidadetotal = BoletimAnalises::getBAs(null,null,null,'COUNT(*) as qtd')->fetchObject()->qtd;
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;
        $obPagination = new Pagination($quantidadetotal, $paginaAtual);
        $results = BoletimAnalises::getBAs(null, 'ba DESC', $obPagination->getLimit());
        
        while($obItens = $results->fetchObject(BoletimAnalises::class)){
            $itens .= View::render('cadastros/boletimAnalise/item', [
                'ba'                    => $obItens->ba,
                'backbone'              => $obItens->backbone,
                'mes'                   => $obItens->mes,   
                'estacao'               => $obItens->estacao,
                'mnemonico'             => $obItens->mnemonico,
                'indicador_fibra'       => $obItens->indicador_fibra,
                'abertura'              => $obItens->abertura,   
                'promessa'              => $obItens->promessa,         
                'proximo_acionamento'   => $obItens->proximo_acionamento,
                'baixa'                 => $obItens->baixa,
                'sla'                   => $obItens->sla,   
                'cod_atividade'         => $obItens->cod_atividade,  
                'obsoi'                 => $obItens->obsoi,
                'ga'                    => $obItens->ga,
                'nomecabo'              => $obItens->nomecabo,
                'entre_local'           => $obItens->entre_local,
                'numero_cis'            => $obItens->numero_cis,
                'descricao_trecho'      => $obItens->descricao_trecho,
                'tipo_utilizacao'       => $obItens->tipo_utilizacao,
                'rede_metalica'         => $obItens->rede_metalica,
                'causa_rompimento'      => $obItens->causa_rompimento,
                'sub_causa'             => $obItens->sub_causa,
                'desdobramento'         => $obItens->desdobramento,
                'ba_comum'              => $obItens->ba_comum,
                'ha_pendencia35d'       => $obItens->ha_pendencia35d,
                'necessario_jm'         => $obItens->necessario_jm,
                'numero_jm'             => $obItens->numero_jm,
                'data_abertura'         => $obItens->data_abertura,
                'prev_regularizacao'    => $obItens->prev_regularizacao,
                'informe_pendencia'     => $obItens->informe_pendencia,
                'material_pendencia'    => $obItens->material_pendencia,
                'resp_pendencia'        => $obItens->resp_pendencia,
                'prazo'                 => $obItens->prazo,
                'justificar_prazo'      => $obItens->justificar_prazo,
                'cirq_cli_envol'        => $obItens->cirq_cli_envol,
                'descricao_ocorrido'    => $obItens->descricao_ocorrido,
                'tempo_cgr'             => $obItens->tempo_cgr,
                'numero_bo'             => $obItens->numero_bo,
                'nao_abertura_bo'       => $obItens->nao_abertura_bo,
                'remanejo_fibra'        => $obItens->remanejo_fibra,
                'usou_cabo'             => $obItens->usou_cabo,
                'lote_cabo'             => $obItens->lote_cabo,
                'metro_cabo'            => $obItens->metro_cabo,
                'cod_sap_cabo'          => $obItens->cod_sap_cabo,
                'coordenadas_cabo'      => $obItens->coordenadas_cabo,
                'quantidade_cx'         => $obItens->quantidade_cx,
                'numero_emenda'         => $obItens->numero_emenda,
                'coordenadas_enpe'      => $obItens->coordenadas_enpe,
                'endereco_enpe'         => $obItens->endereco_enpe,
                'add_croqui'            => $obItens->add_croqui,
                'supervisor'            => $obItens->supervisor,
            ]);
        }
        return $itens;
    }
    
    private static function getStatus($request){
        $queryParams = $request->getQueryParams();
        
        if(!isset($queryParams['status'])) return '';
        
        switch ($queryParams['status']) {
            case 'created':
                return Alert::getSuccess('BA cadastrado com sucesso!');
                break;
            case 'updated':
                return Alert::getSuccess('BA atualizado com sucesso!');
                break;
            case 'duplicated':
                return Alert::getError('O BA inserido já está em uso.');
                break;
        }
    }
}