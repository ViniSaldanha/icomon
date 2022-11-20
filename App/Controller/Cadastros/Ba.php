<?php

namespace App\Controller\Cadastros;

use \App\Model\Entity\Cadastro;
use \App\Controller\Page;
use \App\Utils\View;
use \App\Utils\CSV;
use \WilliamCosta\DatabaseManager\Pagination;

class Ba extends Page{
    const SCRIPT_SRC = "/resources/views/cadastros/ba/dados-csv.js";
    

    public static function getBAs($request){
        $content = View::render('cadastros/ba/index',[
            'itens' => self::getBaItems($request,$obPagination),
            'pagination' => parent::getPagination($request,$obPagination),
            'status' => ''
            
        ]);

        return parent::getPage('Ba > Icomon', $content, 'ba');
    }

    public static function getBA($request){
        $content = View::render('cadastros/ba/new', [

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
        $causa_rompimento    = $postVars['causa_rompimento'] ?? '';
        $sub_causa           = $postVars['sub_causa'] ?? '';
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
        $obUser->causa_rompimento    = $causa_rompimento;
        $obUser->sub_causa           = $sub_causa;
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

        

        $request->getRouter()->redirect('/cadastros/ba');
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
            $itens .= View::render('cadastros/ba/dados-csv-item', [
                'ba'            => $row['BA'],
                'backbone'      => $row['BACKBONE'],
                'estacao'       => $row['ESTACAO'],
                'central'       => $row['CENTRAL'],
                'ga'            => $row['GA']
            ]);
        }
        
        $content = View::render('cadastros/ba/dados-csv', [
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

    private static function getBaItems($request,&$obPagination){
        $itens = '';

        $quantidadetotal = Cadastro::getBAs(null,null,null,'COUNT(*) as qtd')->fetchObject()->qtd;

        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;
        $obPagination = new Pagination($quantidadetotal, $paginaAtual, 7);
        $results = Cadastro::getBAs(null, 'ba DESC',$obPagination->getLimit());

        while($obUser = $results->fetchObject(Cadastro::class)){
            $itens .= View::render('cadastros/ba/item', [
                'ba'        => $obUser->ba,
                'backbone'  => $obUser->backbone,
                'ga'        => $obUser->ga,   
                'baixa'     => $obUser->baixa       
            ]);
        }
        return $itens;
    
    }
}