<?php

namespace App\Controller\Mascara;

use App\Controller\Alert;
use App\Controller\Page;
use \App\Utils\View;
use \App\Model\Entity\MascarasEncerramento;
use \WilliamCosta\DatabaseManager\Pagination;

class MascaraEncerramento extends Page{
    const SCRIPT_SRC = "/resources/views/mascara/mascaraEncerramento/exibir-campos.js";
    public static function getMask($request){
        $content = View::render('mascara/mascaraEncerramento/index',[
            'itens' => self::getMaskItems($request,$obPagination),
            'pagination' => parent::getPagination($request,$obPagination),
            'status'    => self::getStatus($request)
        ]);

        return parent::getPage('Mascara de Encerramento > Icomon', $content, 'mascaraEncerramento');
    }

    public static function getNewMask($request){
        $content = View::render('mascara/mascaraEncerramento/new',[
            'title'     => 'Registrar máscara de encerramento',
            'status'    => self::getStatus($request)
        ]);

        return parent::getPage('Registrar mascara de encerramento > Icomon', $content, 'mascaraEncerramento');
    }

    public static function setNewMask($request){
        $postVars                   = $request->getPostVars();
        $ba                         = $postVars['ba'] ?? '';
        $enpe_e_emf_repasse         = $postVars['enpe_e_emf_repasse'] ?? '';
        $localidade                 = $postVars['localidade'] ?? '';
        $estacao_central            = $postVars['estacao_central'] ?? '';
        $ramificacao                = $postVars['ramificacao'] ?? '';
        $trecho                     = $postVars['trecho'] ?? '';
        $quantidade_de_emendas      = $postVars['quantidade_de_emendas'] ?? '';
        $tipo_de_emenda             = $postVars['tipo_de_emenda'] ?? '';
        $codigo_numero_cabo         = $postVars['codigo_numero_cabo'] ?? '';
        $modelo_emenda              = $postVars['modelo_emenda'] ?? '';
        $fabricante                 = $postVars['fabricante'] ?? '';
        $quantidade_fibra_cabo      = $postVars['quantidade_fibra_cabo'] ?? '';
        $quantidade_fusao_realizada = $postVars['quantidade_fusao_realizada'] ?? '';
        $sistema_afetado            = $postVars['sistema_afetado'] ?? '';
        $acaoCorretiva              = $postVars['acaoCorretiva'] ?? '';
        $codigo_caixa_emenda01      = $postVars['codigo_caixa_emenda01'] ?? '';
        $numero_emenda01            = $postVars['numero_emenda01'] ?? '';
        $endereço_emenda01          = $postVars['endereço_emenda01'] ?? '';
        $referencia_emenda01        = $postVars['referencia_emenda01'] ?? '';
        $distancia_emenda01         = $postVars['distancia_emenda01'] ?? '';
        $coordenada_emenda01        = $postVars['coordenada_emenda01'] ?? '';
        $aplicou_segunda_emenda     = $postVars['aplicou_segunda_emenda'] ?? '';
        $codigo_caixa_emenda02      = $postVars['codigo_caixa_emenda02'] ?? '';
        $numero_emenda02            = $postVars['numero_emenda02'] ?? '';
        $endereço_emenda02          = $postVars['endereço_emenda02'] ?? '';
        $referencia_emenda02        = $postVars['referencia_emenda02'] ?? '';
        $distancia_emenda02         = $postVars['distancia_emenda02'] ?? '';
        $coordenada_emenda02        = $postVars['coordenada_emenda02'] ?? '';
        $nome_completo              = $postVars['nome_completo'] ?? '';
        $re                         = $postVars['re'] ?? '';
        $observacoes                = $postVars['observacoes'] ?? '';
        $problema_encontrado        = $postVars['problema_encontrado'] ?? '';
        $causa_raiz                 = $postVars['causa_raiz'] ?? '';
        $ro_cis	                    = $postVars['ro_cis'] ?? '';
        $causador_dano              = $postVars['causador_dano'] ?? '';
        $miscelaneas                = $postVars['miscelaneas'] ?? '';
        $foto_antes                 = $postVars['foto_antes'] ?? '';
        $foto_depois                = $postVars['foto_depois'] ?? '';

        $obMask                             = new MascarasEncerramento;
        $obMask->ba                         = $ba;
        $obMask->enpe_e_emf_repasse         = $enpe_e_emf_repasse;
        $obMask->localidade                 = $localidade;
        $obMask->estacao_central            = $estacao_central;
        $obMask->ramificacao                = $ramificacao;
        $obMask->trecho                     = $trecho;
        $obMask->quantidade_de_emendas      = $quantidade_de_emendas;
        $obMask->tipo_de_emenda             = $tipo_de_emenda;
        $obMask->codigo_numero_cabo         = $codigo_numero_cabo;
        $obMask->modelo_emenda              = $modelo_emenda;
        $obMask->fabricante                 = $fabricante;
        $obMask->quantidade_fibra_cabo      = $quantidade_fibra_cabo;
        $obMask->quantidade_fusao_realizada = $quantidade_fusao_realizada;
        $obMask->sistema_afetado            = $sistema_afetado;
        $obMask->acaoCorretiva              = $acaoCorretiva;
        $obMask->codigo_caixa_emenda01      = $codigo_caixa_emenda01;
        $obMask->numero_emenda01            = $numero_emenda01;
        $obMask->endereço_emenda01          = $endereço_emenda01;
        $obMask->referencia_emenda01        = $referencia_emenda01;
        $obMask->distancia_emenda01         = $distancia_emenda01;
        $obMask->coordenada_emenda01        = $coordenada_emenda01;
        $obMask->aplicou_segunda_emenda     = $aplicou_segunda_emenda;
        $obMask->codigo_caixa_emenda02      = $codigo_caixa_emenda02;
        $obMask->numero_emenda02            = $numero_emenda02;
        $obMask->endereço_emenda02          = $endereço_emenda02;
        $obMask->referencia_emenda02        = $referencia_emenda02;
        $obMask->distancia_emenda02         = $distancia_emenda02;
        $obMask->coordenada_emenda02        = $coordenada_emenda02;
        $obMask->nome_completo              = $nome_completo;
        $obMask->re                         = $re;
        $obMask->observacoes                = $observacoes;
        $obMask->problema_encontrado        = $problema_encontrado;
        $obMask->causa_raiz                 = $causa_raiz;
        $obMask->ro_cis                     = $ro_cis;
        $obMask->causador_dano              = $causador_dano;
        $obMask->miscelaneas                = $miscelaneas;
        $obMask->foto_antes                 = $foto_antes;
        $obMask->foto_depois                = $foto_depois;
        $obMask->insert();

        //$request->getRouter()->redirect('/mascara/mascaraEncerramento/' .$obMask->id.'/edit?status=created');
        $request->getRouter()->redirect('/mascara/mascaraEncerramento?status=created');
    }

    public static function getEditMask($request,$ba){
        $obMask = MascarasEncerramento::getMaskById($ba);
        if(!$obMask instanceof MascarasEncerramento){
            $request->getRouter()->redirect('/mascara/mascaraEncerramento');
        }

        $content = View::render('mascara/mascaraEncerramento/form',[
            'title'                         => 'Editar Máscara de encerramento',
            'ba'                            => $obMask->ba,
            'enpe_e_emf_repasse'            => $obMask->enpe_e_emf_repasse,
            'localidade'                    => $obMask->localidade,
            'estacao_central'               => $obMask->estacao_central,
            'ramificacao'                   => $obMask->ramificacao,
            'trecho'                        => $obMask->trecho,
            'quantidade_de_emendas'         => $obMask->quantidade_de_emendas,
            'tipo_de_emenda'                => $obMask->tipo_de_emenda,
            'codigo_numero_cabo'            => $obMask->codigo_numero_cabo,
            'modelo_emenda'                 => $obMask->modelo_emenda,
            'fabricante'                    => $obMask->fabricante,
            'quantidade_fibra_cabo'         => $obMask->quantidade_fibra_cabo,
            'quantidade_fusao_realizada'    => $obMask->quantidade_fusao_realizada,
            'sistema_afetado'               => $obMask->sistema_afetado,
            'acaoCorretiva'                 => $obMask->acaoCorretiva,
            'codigo_caixa_emenda01'         => $obMask->codigo_caixa_emenda01,
            'numero_emenda01'               => $obMask->numero_emenda01,
            'endereço_emenda01'             => $obMask->endereço_emenda01,
            'referencia_emenda01'           => $obMask->referencia_emenda01,
            'distancia_emenda01'            => $obMask->distancia_emenda01,
            'coordenada_emenda01'           => $obMask->coordenada_emenda01,
            'aplicou_segunda_emenda'        => $obMask->aplicou_segunda_emenda,
            'codigo_caixa_emenda02'         => $obMask->codigo_caixa_emenda02,
            'numero_emenda02'               => $obMask->numero_emenda02,
            'endereço_emenda02'             => $obMask->endereço_emenda02,
            'referencia_emenda02'           => $obMask->referencia_emenda02,
            'distancia_emenda02'            => $obMask->distancia_emenda02,
            'coordenada_emenda02'           => $obMask->coordenada_emenda02,
            'nome_completo'                 => $obMask->nome_completo,
            're'                            => $obMask->re,
            'observacoes'                   => $obMask->observacoes ,
            'problema_encontrado'           => $obMask->problema_encontrado,
            'causa_raiz'                    => $obMask->causa_raiz,
            'ro_cis'                        => $obMask->ro_cis,
            'causador_dano'                 => $obMask->causador_dano,
            'miscelaneas'                   => $obMask->miscelaneas,
            'foto_antes'                    => $obMask->foto_antes,
            'foto_depois'                   => $obMask->foto_depois,
            'status'   => self::getStatus($request)
        ]);
        return parent::getPage('Editar Máscara de encerramento > Icomon', $content, 'users');
    }

    public static function setEditMask($request,$ba){
        $obMask = MascarasEncerramento::getMaskById($ba);
        if(!$obMask instanceof MascarasEncerramento){
            $request->getRouter()->redirect('/mascara/mascaraEncerramento');
        }
        $postVars                   = $request->getPostVars();
        $ba                         = $postVars['ba'] ?? '';
        $enpe_e_emf_repasse         = $postVars['enpe_e_emf_repasse'] ?? '';
        $localidade                 = $postVars['localidade'] ?? '';
        $estacao_central            = $postVars['estacao_central'] ?? '';
        $ramificacao                = $postVars['ramificacao'] ?? '';
        $trecho                     = $postVars['trecho'] ?? '';
        $quantidade_de_emendas      = $postVars['quantidade_de_emendas'] ?? '';
        $tipo_de_emenda             = $postVars['tipo_de_emenda'] ?? '';
        $codigo_numero_cabo         = $postVars['codigo_numero_cabo'] ?? '';
        $modelo_emenda              = $postVars['modelo_emenda'] ?? '';
        $fabricante                 = $postVars['fabricante'] ?? '';
        $quantidade_fibra_cabo      = $postVars['quantidade_fibra_cabo'] ?? '';
        $quantidade_fusao_realizada = $postVars['quantidade_fusao_realizada'] ?? '';
        $sistema_afetado            = $postVars['sistema_afetado'] ?? '';
        $acaoCorretiva              = $postVars['acaoCorretiva'] ?? '';
        $codigo_caixa_emenda01      = $postVars['codigo_caixa_emenda01'] ?? '';
        $numero_emenda01            = $postVars['numero_emenda01'] ?? '';
        $endereço_emenda01          = $postVars['endereço_emenda01'] ?? '';
        $referencia_emenda01        = $postVars['referencia_emenda01'] ?? '';
        $distancia_emenda01         = $postVars['distancia_emenda01'] ?? '';
        $coordenada_emenda01        = $postVars['coordenada_emenda01'] ?? '';
        $aplicou_segunda_emenda     = $postVars['aplicou_segunda_emenda'] ?? '';
        $codigo_caixa_emenda02      = $postVars['codigo_caixa_emenda02'] ?? '';
        $numero_emenda02            = $postVars['numero_emenda02'] ?? '';
        $endereço_emenda02          = $postVars['endereço_emenda02'] ?? '';
        $referencia_emenda02        = $postVars['referencia_emenda02'] ?? '';
        $distancia_emenda02         = $postVars['distancia_emenda02'] ?? '';
        $coordenada_emenda02        = $postVars['coordenada_emenda02'] ?? '';
        $nome_completo              = $postVars['nome_completo'] ?? '';
        $re                         = $postVars['re'] ?? '';
        $observacoes                = $postVars['observacoes '] ?? '';
        $problema_encontrado        = $postVars['problema_encontrado '] ?? '';
        $causa_raiz                 = $postVars['causa_raiz'] ?? '';
        $ro_cis	                    = $postVars['ro_cis	'] ?? '';
        $causador_dano              = $postVars['causador_dano'] ?? '';
        $miscelaneas                = $postVars['miscelaneas '] ?? '';
        $foto_antes                 = $postVars['foto_antes'] ?? '';
        $foto_depois                = $postVars['foto_depois'] ?? '';

        $obMask->ba                         = $ba;
        $obMask->enpe_e_emf_repasse         = $enpe_e_emf_repasse;
        $obMask->localidade                 = $localidade;
        $obMask->estacao_central            = $estacao_central;
        $obMask->ramificacao                = $ramificacao;
        $obMask->trecho                     = $trecho;
        $obMask->quantidade_de_emendas      = $quantidade_de_emendas;
        $obMask->tipo_de_emenda             = $tipo_de_emenda;
        $obMask->codigo_numero_cabo         = $codigo_numero_cabo;
        $obMask->modelo_emenda              = $modelo_emenda;
        $obMask->fabricante                 = $fabricante;
        $obMask->quantidade_fibra_cabo      = $quantidade_fibra_cabo;
        $obMask->quantidade_fusao_realizada = $quantidade_fusao_realizada;
        $obMask->sistema_afetado            = $sistema_afetado;
        $obMask->acaoCorretiva              = $acaoCorretiva;
        $obMask->codigo_caixa_emenda01      = $codigo_caixa_emenda01;
        $obMask->numero_emenda01            = $numero_emenda01;
        $obMask->endereço_emenda01          = $endereço_emenda01;
        $obMask->referencia_emenda01        = $referencia_emenda01;
        $obMask->distancia_emenda01         = $distancia_emenda01;
        $obMask->coordenada_emenda01        = $coordenada_emenda01;
        $obMask->aplicou_segunda_emenda     = $aplicou_segunda_emenda;
        $obMask->codigo_caixa_emenda02      = $codigo_caixa_emenda02;
        $obMask->numero_emenda02            = $numero_emenda02;
        $obMask->endereço_emenda02          = $endereço_emenda02;
        $obMask->referencia_emenda02        = $referencia_emenda02;
        $obMask->distancia_emenda02         = $distancia_emenda02;
        $obMask->coordenada_emenda02        = $coordenada_emenda02;
        $obMask->nome_completo              = $nome_completo;
        $obMask->re                         = $re;
        $obMask->observacoes                = $observacoes;
        $obMask->problema_encontrado        = $problema_encontrado;
        $obMask->causa_raiz                 = $causa_raiz;
        $obMask->ro_cis                     = $ro_cis;
        $obMask->causador_dano              = $causador_dano;
        $obMask->miscelaneas                = $miscelaneas ;
        $obMask->foto_antes                 = $foto_antes;
        $obMask->foto_depois                = $foto_depois;
        $obMask->update();       
        $request->getRouter()->redirect('/mascara/mascaraEncerramento/' .$obMask->ba.'/edit?status=updated');
    }

    public static function getDeleteMask($request,$ba){
        $obMask = MascarasEncerramento::getMaskById($ba);
        if(!$obMask instanceof MascarasEncerramento){
            $request->getRouter()->redirect('/mascara/mascaraEncerramento');
        }
        $content = View::render('mascara/mascaraEncerramento/delete',[
            'ba'  => $obMask->ba,

        ]);

        return parent::getPage('Excluir Mascara > Icomon',$content,'users');
    }

    public static function setDeleteMask($request,$ba){
        $obMask = MascarasEncerramento::getMaskById($ba);

        if(!$obMask instanceof MascarasEncerramento){
            $request->getRouter()->redirect('/mascara/mascaraEncerramento');
        }
        $obMask->delete();
        $request->getRouter()->redirect('/mascara/mascaraEncerramento?status=deleted');
    }


    private static function getMaskItems($request,&$obPagination){
        $itens = '';
        $quantidadetotal = MascarasEncerramento::getMasks(null,null,null,'COUNT(*) as qtd')->fetchObject()->qtd;
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;
        $obPagination = new Pagination($quantidadetotal, $paginaAtual, 5);
        $results = MascarasEncerramento::getMasks(null, 'ba DESC',$obPagination->getLimit());
        while($obMask = $results->fetchObject(MascarasEncerramento::class)){
            $itens .= View::render('mascara/mascaraEncerramento/item', [
                'ba'                            => $obMask->ba,
                'enpe_e_emf_repasse'            => $obMask->enpe_e_emf_repasse,
                'localidade'                    => $obMask->localidade,
                'estacao_central'               => $obMask->estacao_central,
                'ramificacao'                   => $obMask->ramificacao,
                'trecho'                        => $obMask->trecho,
                'quantidade_de_emendas'         => $obMask->quantidade_de_emendas,
                'tipo_de_emenda'                => $obMask->tipo_de_emenda,
                'codigo_numero_cabo'            => $obMask->codigo_numero_cabo,
                'modelo_emenda'                 => $obMask->modelo_emenda,
                'fabricante'                    => $obMask->fabricante,
                'quantidade_fibra_cabo'         => $obMask->quantidade_fibra_cabo,
                'quantidade_fusao_realizada'    => $obMask->quantidade_fusao_realizada,
                'sistema_afetado'               => $obMask->sistema_afetado,
                'acaoCorretiva'                 => $obMask->acaoCorretiva,
                'codigo_caixa_emenda01'         => $obMask->codigo_caixa_emenda01,
                'numero_emenda01'               => $obMask->numero_emenda01,
                'endereço_emenda01'             => $obMask->endereço_emenda01,
                'referencia_emenda01'           => $obMask->referencia_emenda01,
                'distancia_emenda01'            => $obMask->distancia_emenda01,
                'coordenada_emenda01'           => $obMask->coordenada_emenda01,
                'aplicou_segunda_emenda'        => $obMask->aplicou_segunda_emenda,
                'codigo_caixa_emenda02'         => $obMask->codigo_caixa_emenda02,
                'numero_emenda02'               => $obMask->numero_emenda02,
                'endereço_emenda02'             => $obMask->endereço_emenda02,
                'referencia_emenda02'           => $obMask->referencia_emenda02,
                'distancia_emenda02'            => $obMask->distancia_emenda02,
                'coordenada_emenda02'           => $obMask->coordenada_emenda02,
                'nome_completo'                 => $obMask->nome_completo,
                're'                            => $obMask->re,
                'observacoes'                   => $obMask->observacoes,
                'problema_encontrado'           => $obMask->problema_encontrado,
                'causa_raiz'                    => $obMask->causa_raiz,
                'ro_cis'                        => $obMask->ro_cis,
                'causador_dano'                 => $obMask->causador_dano,
                'miscelaneas'                   => $obMask->miscelaneas,
                'foto_antes'                    => $obMask->foto_antes,
                'foto_depois'                   => $obMask->foto_depois,         
            ]);
        }

        return $itens;
    }

    private static function getStatus($request){
        $queryParams = $request->getQueryParams();

        if(!isset($queryParams['status'])) return '';

        switch ($queryParams['status']) {
            case 'created':
                return Alert::getSuccess('Mascara de encerramento cadastrado com sucesso!');
                break;
            case 'updated':
                return Alert::getSuccess('Mascara de encerramento atualizado com sucesso!');
                break;
            case 'deleted':
                return Alert::getSuccess('Mascara de encerramento apagada com sucesso!');
                break;
            case 'duplicated':
                return Alert::getError(' A Mascara de encerramento digitada já está em uso.');
                break;
        }

    }
}