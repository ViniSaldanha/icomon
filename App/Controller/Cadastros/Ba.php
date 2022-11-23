<?php

namespace App\Controller\Cadastros;

use App\Controller\Alert;
use \App\Model\Entity\Cadastro;
use \App\Controller\Page;
use \App\Utils\View;
use \App\Utils\CSV;
use \WilliamCosta\DatabaseManager\Pagination;

class Ba extends Page{
    const SCRIPT_SRC = "/resources/views/cadastros/boletimAnalise/dados-csv.js";
    

    public static function getBAs($request){
        $content = View::render('cadastros/boletimAnalise/index',[
            'itens' => self::getBaItems($request,$obPagination),
            'pagination' => parent::getPagination($request,$obPagination),
            'status'   => self::getStatus($request)
            
        ]);

        return parent::getPage('Ba > Icomon', $content, 'ba');
    }

    public static function getBA($request){
        $content = View::render('cadastros/boletimAnalise/new', [

        ]);

        return parent::getPage('Preencher BA', $content, 'cadastro-ba', Ba::SCRIPT_SRC);
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
        $Cirq_cli_envol      = $postVars['Cirq_cli_envol'] ?? '';      
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


        $obUser                      = new Cadastro;
        $obUser->ba                  = $ba;
        $obUser->backbone            = $backbone;
        $obUser->mes                 = $mes;
        $obUser->estacao             = $estacao;
        $obUser->mnemonico           = $mnemonico;
        $obUser->indicador_fibra     = $indicador_fibra;
        $obUser->abertura            = $abertura;
        $obUser->promessa            = $promessa;
        $obUser->proximo_acionamento = $proximo_acionamento;
        $obUser->baixa               = $baixa;
        $obUser->sla                 = $sla;
        $obUser->cod_atividade       = $cod_atividade;
        $obUser->obsoi               = $obsoi;
        $obUser->ga                  = $ga;
        $obUser->nomecabo            = $nomecabo;
        $obUser->entre_local         = $entre_local;
        $obUser->numero_cis          = $numero_cis;
        $obUser->descricao_trecho    = $descricao_trecho;
        $obUser->tipo_utilizacao     = $tipo_utilizacao;
        $obUser->rede_metalica       = $rede_metalica;
        $obUser->causa_rompimento    = $causa_rompimento;
        $obUser->sub_causa           = $sub_causa;
        $obUser->desdobramento       = $desdobramento;
        $obUser->ba_comum            = $ba_comum;
        $obUser->ha_pendencia35d     = $ha_pendencia35d;
        $obUser->necessario_jm       = $necessario_jm;
        $obUser->numero_jm           = $numero_jm;
        $obUser->data_abertura       = $data_abertura;
        $obUser->prev_regularizacao  = $prev_regularizacao;
        $obUser->informe_pendencia   = $informe_pendencia;
        $obUser->material_pendencia  = $material_pendencia;
        $obUser->resp_pendencia      = $resp_pendencia;
        $obUser->prazo               = $prazo;
        $obUser->justificar_prazo    = $justificar_prazo;
        $obUser->Cirq_cli_envol      = $Cirq_cli_envol;
        $obUser->descricao_ocorrido  = $descricao_ocorrido;
        $obUser->tempo_cgr           = $tempo_cgr;
        $obUser->numero_bo           = $numero_bo;
        $obUser->nao_abertura_bo     = $nao_abertura_bo;
        $obUser->remanejo_fibra      = $remanejo_fibra;
        $obUser->usou_cabo           = $usou_cabo;
        $obUser->lote_cabo           = $lote_cabo;
        $obUser->metro_cabo          = $metro_cabo;
        $obUser->cod_sap_cabo        = $cod_sap_cabo;
        $obUser->coordenadas_cabo    = $coordenadas_cabo;
        $obUser->quantidade_cx       = $quantidade_cx;
        $obUser->numero_emenda       = $numero_emenda;
        $obUser->coordenadas_enpe    = $coordenadas_enpe;
        $obUser->endereco_enpe       = $endereco_enpe;
        $obUser->add_croqui          = $add_croqui;
        $obUser->supervisor          = $supervisor;

        $obUser->cadastrar();

        

        $request->getRouter()->redirect('/cadastros/boletimAnalise');
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
        $resultAsJson = json_encode($result);

        return $resultAsJson;
    }

    public static function getEditBa($request,$ba){
        $obUser = Cadastro::getBaByBa($ba);

        if(!$obUser instanceof Cadastro){
            $request->getRouter()->redirect('/cadastros/boletimAnalise');
        }

        $content = View::render('cadastros/boletimAnalise/form',[
            'title'                 => 'Editar BA',
            'ba'                    => $obUser->ba,
            'backbone'              => $obUser->backbone,
            'mes'                   => $obUser->mes,
            'estacao'               => $obUser->estacao,
            'mnemonico'             => $obUser->mnemonico,
            'indicador_fibra'       => $obUser->indicador_fibra,
            'abertura'              => $obUser->abertura,
            'promessa'              => $obUser->promessa,
            'proximo_acionamento'   => $obUser->proximo_acionamento,
            'baixa'                 => $obUser->baixa,
            'sla'                   => $obUser->sla,
            'cod_atividade'         => $obUser->cod_atividade,
            'obsoi'                 => $obUser->obsoi,
            'ga'                    => $obUser->ga,
            'nomecabo'              => $obUser->nomecabo,
            'entre_local'           => $obUser->entre_local,
            'numero_cis'            => $obUser->numero_cis,
            'descricao_trecho'      => $obUser->descricao_trecho,
            'tipo_utilizacao'       => $obUser->tipo_utilizacao,
            'rede_metalica'         => $obUser->rede_metalica,
            'causa_rompimento'      => $obUser->causa_rompimento,
            'sub_causa'             => $obUser->sub_causa,
            'desdobramento'         => $obUser->desdobramento,
            'ba_comum'              => $obUser->ba_comum,
            'ha_pendencia35d'       => $obUser->ha_pendencia35d,
            'necessario_jm'         => $obUser->necessario_jm,
            'numero_jm'             => $obUser->numero_jm,
            'data_abertura'         => $obUser->data_abertura,
            'prev_regularizacao'    => $obUser->prev_regularizacao,
            'informe_pendencia'     => $obUser->informe_pendencia,
            'material_pendencia'    => $obUser->material_pendencia,
            'resp_pendencia'        => $obUser->resp_pendencia,
            'prazo'                 => $obUser->prazo,
            'justificar_prazo'      => $obUser->justificar_prazo,
            'Cirq_cli_envol'        => $obUser->Cirq_cli_envol,
            'descricao_ocorrido'    => $obUser->descricao_ocorrido,
            'tempo_cgr'             => $obUser->tempo_cgr,
            'numero_bo'             => $obUser->numero_bo,
            'nao_abertura_bo'       => $obUser->nao_abertura_bo,
            'remanejo_fibra'        => $obUser->remanejo_fibra,
            'usou_cabo'             => $obUser->usou_cabo,
            'lote_cabo'             => $obUser->lote_cabo,
            'metro_cabo'            => $obUser->metro_cabo,
            'cod_sap_cabo'          => $obUser->cod_sap_cabo,
            'coordenadas_cabo'      => $obUser->coordenadas_cabo,
            'quantidade_cx'         => $obUser->quantidade_cx,
            'numero_emenda'         => $obUser->numero_emenda,
            'coordenadas_enpe'      => $obUser->coordenadas_enpe,
            'endereco_enpe'         => $obUser->endereco_enpe,
            'add_croqui'            => $obUser->add_croqui,
            'supervisor'            => $obUser->supervisor,


            'status'                => self::getStatus($request)
        ]);

        return parent::getPage('Editar BA > Icomon', $content, 'ba');
    }

    public static function setEditBa($request,$ba){
        $obUser = Cadastro::getBaByBa($ba);

        if(!$obUser instanceof Cadastro){
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
        $Cirq_cli_envol      = $postVars['Cirq_cli_envol'] ?? '';      
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


        $obUser->ba                  = $ba;
        $obUser->backbone            = $backbone;
        $obUser->mes                 = $mes;
        $obUser->estacao             = $estacao;
        $obUser->mnemonico           = $mnemonico;
        $obUser->indicador_fibra     = $indicador_fibra;
        $obUser->abertura            = $abertura;
        $obUser->promessa            = $promessa;
        $obUser->proximo_acionamento = $proximo_acionamento;
        $obUser->baixa               = $baixa;
        $obUser->sla                 = $sla;
        $obUser->cod_atividade       = $cod_atividade;
        $obUser->obsoi               = $obsoi;
        $obUser->ga                  = $ga;
        $obUser->nomecabo            = $nomecabo;
        $obUser->entre_local         = $entre_local;
        $obUser->numero_cis          = $numero_cis;
        $obUser->descricao_trecho    = $descricao_trecho;
        $obUser->tipo_utilizacao     = $tipo_utilizacao;
        $obUser->rede_metalica       = $rede_metalica;
        $obUser->causa_rompimento    = $causa_rompimento;
        $obUser->sub_causa           = $sub_causa;
        $obUser->desdobramento       = $desdobramento;
        $obUser->ba_comum            = $ba_comum;
        $obUser->ha_pendencia35d     = $ha_pendencia35d;
        $obUser->necessario_jm       = $necessario_jm;
        $obUser->numero_jm           = $numero_jm;
        $obUser->data_abertura       = $data_abertura;
        $obUser->prev_regularizacao  = $prev_regularizacao;
        $obUser->informe_pendencia   = $informe_pendencia;
        $obUser->material_pendencia  = $material_pendencia;
        $obUser->resp_pendencia      = $resp_pendencia;
        $obUser->prazo               = $prazo;
        $obUser->justificar_prazo    = $justificar_prazo;
        $obUser->Cirq_cli_envol      = $Cirq_cli_envol;
        $obUser->descricao_ocorrido  = $descricao_ocorrido;
        $obUser->tempo_cgr           = $tempo_cgr;
        $obUser->numero_bo           = $numero_bo;
        $obUser->nao_abertura_bo     = $nao_abertura_bo;
        $obUser->remanejo_fibra      = $remanejo_fibra;
        $obUser->usou_cabo           = $usou_cabo;
        $obUser->lote_cabo           = $lote_cabo;
        $obUser->metro_cabo          = $metro_cabo;
        $obUser->cod_sap_cabo        = $cod_sap_cabo;
        $obUser->coordenadas_cabo    = $coordenadas_cabo;
        $obUser->quantidade_cx       = $quantidade_cx;
        $obUser->numero_emenda       = $numero_emenda;
        $obUser->coordenadas_enpe    = $coordenadas_enpe;
        $obUser->endereco_enpe       = $endereco_enpe;
        $obUser->add_croqui          = $add_croqui;
        $obUser->supervisor          = $supervisor;

        $obUser->atualizar();
        
        $request->getRouter()->redirect('/cadastros/boletimAnalise/' .$obUser->ba.'/edit?status=updated');
    }

    public static function getImprimirBa($request,$ba){
        $obUser = Cadastro::getBaByBa($ba);

        if(!$obUser instanceof Cadastro){
            $request->getRouter()->redirect('/cadastros/boletimAnalise');
        }

        $content = View::render('cadastros/boletimAnalise/gerar_pdf',[
            'title'                 => 'Boletim de Análise',
            'ba'                    => $obUser->ba,
            'backbone'              => $obUser->backbone,
            'mes'                   => $obUser->mes,
            'estacao'               => $obUser->estacao,
            'mnemonico'             => $obUser->mnemonico,
            'indicador_fibra'       => $obUser->indicador_fibra,
            'abertura'              => $obUser->abertura,
            'promessa'              => $obUser->promessa,
            'proximo_acionamento'   => $obUser->proximo_acionamento,
            'baixa'                 => $obUser->baixa,
            'sla'                   => $obUser->sla,
            'cod_atividade'         => $obUser->cod_atividade,
            'obsoi'                 => $obUser->obsoi,
            'ga'                    => $obUser->ga,
            'nomecabo'              => $obUser->nomecabo,
            'entre_local'           => $obUser->entre_local,
            'numero_cis'            => $obUser->numero_cis,
            'descricao_trecho'      => $obUser->descricao_trecho,
            'tipo_utilizacao'       => $obUser->tipo_utilizacao,
            'rede_metalica'         => $obUser->rede_metalica,
            'causa_rompimento'      => $obUser->causa_rompimento,
            'sub_causa'             => $obUser->sub_causa,
            'desdobramento'         => $obUser->desdobramento,
            'ba_comum'              => $obUser->ba_comum,
            'ha_pendencia35d'       => $obUser->ha_pendencia35d,
            'necessario_jm'         => $obUser->necessario_jm,
            'numero_jm'             => $obUser->numero_jm,
            'data_abertura'         => $obUser->data_abertura,
            'prev_regularizacao'    => $obUser->prev_regularizacao,
            'informe_pendencia'     => $obUser->informe_pendencia,
            'material_pendencia'    => $obUser->material_pendencia,
            'resp_pendencia'        => $obUser->resp_pendencia,
            'prazo'                 => $obUser->prazo,
            'justificar_prazo'      => $obUser->justificar_prazo,
            'Cirq_cli_envol'        => $obUser->Cirq_cli_envol,
            'descricao_ocorrido'    => $obUser->descricao_ocorrido,
            'tempo_cgr'             => $obUser->tempo_cgr,
            'numero_bo'             => $obUser->numero_bo,
            'nao_abertura_bo'       => $obUser->nao_abertura_bo,
            'remanejo_fibra'        => $obUser->remanejo_fibra,
            'usou_cabo'             => $obUser->usou_cabo,
            'lote_cabo'             => $obUser->lote_cabo,
            'metro_cabo'            => $obUser->metro_cabo,
            'cod_sap_cabo'          => $obUser->cod_sap_cabo,
            'coordenadas_cabo'      => $obUser->coordenadas_cabo,
            'quantidade_cx'         => $obUser->quantidade_cx,
            'numero_emenda'         => $obUser->numero_emenda,
            'coordenadas_enpe'      => $obUser->coordenadas_enpe,
            'endereco_enpe'         => $obUser->endereco_enpe,
            'add_croqui'            => $obUser->add_croqui,
            'supervisor'            => $obUser->supervisor,

        ]);

        return parent::getImpressao('PDF BA > Icomon', $content, 'ba');
    }

    


    private static function getBaItems($request,&$obPagination){
        $itens = '';

        $quantidadetotal = Cadastro::getBAs(null,null,null,'COUNT(*) as qtd')->fetchObject()->qtd;

        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;
        $obPagination = new Pagination($quantidadetotal, $paginaAtual, 7);
        $results = Cadastro::getBAs(null, 'ba DESC',$obPagination->getLimit());

        while($obUser = $results->fetchObject(Cadastro::class)){
            $itens .= View::render('cadastros/boletimAnalise/item', [
                'ba'                    => $obUser->ba,
                'backbone'              => $obUser->backbone,
                'mes'                   => $obUser->mes,   
                'estacao'               => $obUser->estacao,
                'mnemonico'             => $obUser->mnemonico,
                'indicador_fibra'       => $obUser->indicador_fibra,
                'abertura'              => $obUser->abertura,   
                'promessa'              => $obUser->promessa,         
                'proximo_acionamento'   => $obUser->proximo_acionamento,
                'baixa'                 => $obUser->baixa,
                'sla'                   => $obUser->sla,   
                'cod_atividade'         => $obUser->cod_atividade,  
                'obsoi'                 => $obUser->obsoi,
                'ga'                    => $obUser->ga,
                'nomecabo'              => $obUser->nomecabo,
                'entre_local'           => $obUser->entre_local,
                'numero_cis'            => $obUser->numero_cis,
                'descricao_trecho'      => $obUser->descricao_trecho,
                'tipo_utilizacao'       => $obUser->tipo_utilizacao,
                'rede_metalica'         => $obUser->rede_metalica,
                'causa_rompimento'      => $obUser->causa_rompimento,
                'sub_causa'             => $obUser->sub_causa,
                'desdobramento'         => $obUser->desdobramento,
                'ba_comum'              => $obUser->ba_comum,
                'ha_pendencia35d'       => $obUser->ha_pendencia35d,
                'necessario_jm'         => $obUser->necessario_jm,
                'numero_jm'             => $obUser->numero_jm,
                'data_abertura'         => $obUser->data_abertura,
                'prev_regularizacao'    => $obUser->prev_regularizacao,
                'informe_pendencia'     => $obUser->informe_pendencia,
                'material_pendencia'    => $obUser->material_pendencia,
                'resp_pendencia'        => $obUser->resp_pendencia,
                'prazo'                 => $obUser->prazo,
                'justificar_prazo'      => $obUser->justificar_prazo,
                'Cirq_cli_envol'        => $obUser->Cirq_cli_envol,
                'descricao_ocorrido'    => $obUser->descricao_ocorrido,
                'tempo_cgr'             => $obUser->tempo_cgr,
                'numero_bo'             => $obUser->numero_bo,
                'nao_abertura_bo'       => $obUser->nao_abertura_bo,
                'remanejo_fibra'        => $obUser->remanejo_fibra,
                'usou_cabo'             => $obUser->usou_cabo,
                'lote_cabo'             => $obUser->lote_cabo,
                'metro_cabo'            => $obUser->metro_cabo,
                'cod_sap_cabo'          => $obUser->cod_sap_cabo,
                'coordenadas_cabo'      => $obUser->coordenadas_cabo,
                'quantidade_cx'         => $obUser->quantidade_cx,
                'numero_emenda'         => $obUser->numero_emenda,
                'coordenadas_enpe'      => $obUser->coordenadas_enpe,
                'endereco_enpe'         => $obUser->endereco_enpe,
                'add_croqui'            => $obUser->add_croqui,
                'supervisor'            => $obUser->supervisor,
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